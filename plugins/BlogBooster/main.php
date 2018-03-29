<?php
/**
Blog Booster v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asaduddin Shakir Al-Jabary
**/
namespace BlogBooster;
use Prox\System\Site;
use Prox\Plugins\Manager_Plug_handler;
use Prox\Engine\Article;
use Prox\Engine\Photo;
use Prox\Engine\User;
use Prox\Engine\Category;

class MainClass extends Manager_Plug_handler{
public $arguments;	
public $Manager;  				//(reuqired)
public $pagetitle = array(); 	//(reuqired)
public $article;
public function __construct($arg,$param){
	$this->arguments = $arg;
	/**
	* initialize (required)
	*/
//	print_r($param);
	parent::__construct($this,$param);
	$this->Manager = $this->PManager;
	/**
	* Kernel 
	*/
	$this->pagetitle	= array('title'=>'Artikel','subtitle'=>'Tulis dan edit artikel');
		
}
public function main($arg,$param,$hook){
	$this->create_menu($hook);
	switch($arg){
		case 'Backend': $this->backend($param,$hook); 
		break;
	}
	
}
function create_menu($hook){
	if($hook=='Admin_Menu'){
		$this->create_menu_admin();
	}else if($hook=='Admin_Headericon'){
		$this->create_headericon_admin();
	}
}
function submit(){
	$content	= $_POST['bc_editor'];
	$title		= $_POST['bc_title'];
	$headline	= $_POST['bc_headline'];
	$keyword	= $_POST['bc_keyword'];
	$photoid	= $_POST['bc_photo'];
	$tag		= $_POST['bc_tag'];
	$cat		= $_POST['bc_cat'];
	$isedit		= $_POST['editid'];
	$photo		= new Photo($photoid);
	$ac 		= new Article($this);
	$tags 		=	explode(',',$tag);
	$cats 		=	explode(',',$cat);
	$article 	=	array(
	'title'=>$title,		'content'=>$content,
	'headline'=>$headline, 	'keyword'=>$keyword,
	'tags'=>$tags, 			'categories'=>$cats,
	'photo'=>$photoid,		'status'=>'on'
	);
	header("Content-Type: application/json;charset=utf-8");
	
	if($isedit < 1){
	$id 	=	$ac->Create($article, new User());
	$ac->gen($id);
	$article = $ac->Obj[0];
	$obj = array("id"=>$article->id, "url"=>$article->url); 
	http_response_code(200);
	$res = array("response"=>200, "article"=>$obj);
	
	}else if($isedit > 0){
	$ac->gen($isedit);
	$article = $ac->Obj[0];
	$article->title 	= $title;
	$article->content 	= $content;
	$article->headline 	= $headline;
	$article->keyword 	= $keyword;
	$article->Photo 	= $photo;
	$cc					=	new Category($this);
	for($i=0;$i<count($cats);$i++){
		$cc->gen($cats[$i]);
	}
	$article->Category	=	$cc->Obj;
	$article->tags = $tags;
	$obj = array("id"=>$article->id, "url"=>$article->url); 
	$ac->Update($article, new User(), true);	
	http_response_code(200);
	$res = array("response"=>200, "article"=>$obj, "url"=>"");
	}
	
	echo json_encode($res);
}
public function create_menu_admin(){
	$temp =' <li>
    	<a href="javascript:void(0);" data-action="click-trigger">
        	<span class="menu-icon"><i class="fa fa-pencil-square-o"> </i></span> 
            <span class="menu-text">'.BCL('Blog_Booster','article').'</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/BlogBooster/editor">
                        <span class="menu-text">'.BCL('Blog_Booster','art_write').'</span>  
                    </a>
                </li>  
                <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/BlogBooster/list/1">
                        <span class="menu-text">'.BCL('Blog_Booster','list').'</span>  
                    </a>
                </li> 
				</ul></div></li>';
	echo $temp;			
}
public function create_headericon_admin(){
	$temp='<li id="top-menu-1" class="one-big-icon mega-li"> 
      <a href="index-2.html" class="mega-link" data-action="click-trigger">
    	<span class="mega-icon"><i class="fa fa-pencil-square-o"></i></span> 
		<span class="badge vd_bg-red">12</span>        
      </a></li>';
	  echo $temp;
}
function editor($param,$hook, $Lc){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){
		/**
		* we use LiteCat API for our plugins
		*/
		$data 	= array("lc"=>$Lc,"args"=>$this->arguments,"param"=>$param, 'article'=>$this->article->Obj[0]);
		$this->View->Show("editor",$data);
	}
}
function listpage($param,$hook){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){	
		$ac 	= new Article($this);
		$pi		= 0;//page index
		if($param[3] > 0){
			$pi = $param[3]-1;
		}
		$al 		= $ac->getList('all',$pi, 10);
		$curpg[$pi] = 'class="active"';
		$data 		= array('article_list'	=>$al,
							'pg'			=>$pi, 
							'curpg'			=>$curpg);
		$this->View->Show("list",$data);
	}
}
function scriptController($param){
	$rout = strtolower($param[2]);
	$bc = strtolower($param[1]);
	if($rout=='editor' && $bc == 'blogbooster'){
		echo $this->loadscriptEditor();
	}
	if($rout=='list' && $bc == 'blogbooster'){
		echo $this->scriptListView();
	}
}
function removeArt(){	
	$art = new Article($this,addslashes($_GET['article']));
	$art->Remove($art->Obj[0],new User(), true);
}
function setStatus(){
	$art = new Article($this,addslashes($_GET['article']));
	$stat = addslashes($_GET['status']);
	$art->Obj[0]->status = $stat;
	$art->Update($art->Obj[0],new User(), true);	
}
function scriptListView(){
$temp ='
<script>
function setStatus(id){
	var st = $("#art"+id).attr("stat");
	var nst = "on";
	if(st=="on"){
		nst="off";
	}
	$.ajax({
		url:base_url+"ajax.php",
		data:"class=BlogBooster.MainClass&plugins=1&function=setStatus&article="+id+"&status="+nst,
		success:function(){
			if(st=="on"){
		$("#art"+id).html("Off");$("#art"+id).attr("stat","off");$("#art"+id).removeClass("btn-success");$("#art"+id).addClass("btn-warning");
			}else{
		$("#art"+id).html("Active");$("#art"+id).attr("stat","on");$("#art"+id).addClass("btn-success");$("#art"+id).removeClass("btn-warning");
			}
		}
	});
}
function deleteArt(id){
	$.ajax({
		url:base_url+"ajax.php",
		data:"class=BlogBooster.MainClass&plugins=1&function=removeArt&article="+id,
		success:function(){			
		$("#al"+id).remove();
		}
	});
}
</script>';
return $temp;
}
function backend($param,$hook){
	if(strtolower($param[1])==strtolower($this->Base_Class)){ //Perfom only in own backennd page
		$rout = strtolower($param[2]);
		$a_id = 0;
		if($param[3] >0){
			$a_id = $param[3];
		}
		$this->article = new Article($this,$a_id); 
		$temp = $param['template'];
		$this->Need("LiteCat","Kategori Lite");		//we require LiteCat Plugins App Installed and active
		$param = array_merge($param,array("this"=>$this));
		$Lc 	= new \LiteCat\MainClass($this->arguments,$param);	
		switch($hook){
			case 'Footer_Script': $this->scriptController($param); break;
			case 'Header_Meta':		if($rout=='editor'){echo $Lc->getCss(); echo $this->getCss();}break;
		}
	
		/**
		*	we handling logic with router controlling and ignore hook
		*   we show template on where determined by user
		*   we have registered hook Backend_12 by default with template name is Editor,
		*	but user can determine with drag and drop hook position
		*	so we must get current template name in hook, if is Editor so Show our edito template
		*/
		switch($rout){ //router controlling
			case 'editor':if($temp=='Editor'){$this->editor($param,$hook, $Lc);}
			break;
			case 'list':if($temp=='Editor'){$this->listpage($param,$hook);}
			break;
		}
	}
}
function getCss(){
	$temp ='<link href="'.PROX_URL.'temp/plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">';
	return $temp;
}
function getTagsInputJS(){
		$temp = '<script type="text/javascript" src="'.PROX_URL.'temp/plugins/tagsInput/jquery.tagsinput.min.js"></script>';
		return $temp;
}
function loadscriptEditor(){
	$temp = '<script src="'.$this->Url.'temp/tinymce/tinymce.min.js"></script>';
	$temp .= '<script type="text/javascript" src="'.PROX_URL.'temp/plugins/tagsInput/jquery.tagsinput.min.js"></script>';
				
	$temp .="<script>tinymce.init({
  selector: '#aeditor',
  height: 250,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
    imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],

  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ]
 });
 //tinymce.activeEditor.getContent();tinymce.activeEditor.insertContent();
 
	$('#atags').tagsInput({
		width: 'auto',
		autocomplete_url:'".PROX_URL."ajax.php?class=BlogBooster.MainClass&function=data&plugins=1',
	});
	$('#akeyword').tagsInput({
		width: 'auto',
		
	});
	
	$(document).ready(function(){jstree();
       
        $('#aform').validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: '',
            rules: {
                name: {
                    minlength: 3,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                website: {
                    required: true,
                    url: true
                },
                title: {
                    minlength: 5,					
                    required: true
                },
                member: {
                    required: true
                },				
                password: {
                    required: true
                },
                confirmpass: {
                    required: true
                },				
            },
			
			errorPlacement: function(error, element) {
				if (element.parent().hasClass('vd_checkbox') || element.parent().hasClass('vd_radio')){
					element.parent().append(error);
				} else if (element.parent().hasClass('vd_input-wrapper')){
					error.insertAfter(element.parent());
				}else {
					error.insertAfter(element);
				}
			}, 
			
            invalidHandler: function (event, validator) { //display error alert on form submit              
					success_register.fadeOut(500);
					error_register.fadeIn(500);
					scrollTo(aform,-100);

            },

            highlight: function (element) { // hightlight error inputs
		
				$(element).addClass('vd_bd-red');
				$(element).siblings('.help-inline').removeClass('help-inline fa fa-check vd_green mgl-10');

            },

            unhighlight: function (element) { // revert the change dony by hightlight
                $(element)
                    .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label, element) {
                label
                    .addClass('valid').addClass('help-inline fa fa-check vd_green mgl-10') // mark the current input as valid and display OK icon
                	.closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
				$(element).removeClass('vd_bd-red');
            },

            submitHandler: function (form) {
					
					//scrollTo(form_register,-100);	
		$(form).find('#bc_btn').addClass('disabled').prepend('<i class=\'fa fa-spinner fa-spin mgr-10\'></i>')
		/*.addClass('disabled').attr('disabled')*/;					
			
					if(isub > 0){
					$('#aeditor').val(tinymce.activeEditor.getContent());
					isub =0;
					tau.selcat();		
					}
					
            }
        });

});
 </script>";
 return $temp;
}

function data(){
	$q 	= $_GET['term'];
	$list = '[';
	$ac = new Article($this);
	$res = $ac->searchTags('%'.$q.'%');
	for($i=0;$i<count($res);$i++){
		$data = $res[$i];
		if($i>0){
			$list .=',';
		}
		$list .='"'.$data['name'].'"';
	}
	echo $list.']';
}

/**
* show the editor for other plugins
* @param string $content	: content for editor
* @param string $selector	: id selector of textarea
* @param int $height		: height the editor
*/
public function getEditor($content="",$selector="bbeditor",$height=250){
	$data = array("content"=>$content,"selector"=>$selector,"height"=>$height);
	$this->View->Show("editorapi",$data);
}
/**
* Load Tinymce Javascript Library
* must put before the Editor (getEditor) hook
*/
public function TinymceLib(){
	echo '<script src="'.$this->Url.'temp/tinymce/tinymce.min.js"></script>';
}

/*
CREATE TABLE `prox`.`category_article` ( `category` VARCHAR(255) NOT NULL , `article` VARCHAR(255) NOT NULL ) ENGINE = InnoDB;
CREATE TABLE `prox`.`tags` ( `name` VARCHAR(255) NOT NULL , `article` VARCHAR(255) NOT NULL ) ENGINE = InnoDB;
*/
}
?>