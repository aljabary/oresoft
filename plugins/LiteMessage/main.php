<?php
/**
Lite Message v.2.1.1
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Openproject License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
namespace LiteMessage;
use Prox\Plugins\Manager_Plug_handler;
use Prox\Engine\Message;
use Prox\Engine\Article;
use Prox\Engine\Photo;
use Prox\System\Site;
use Prox\Engine\User;
class MainClass extends Manager_Plug_handler{
public $arguments;	
public $Manager;  				//(reuqired)
public $pagetitle = array(); 	//(reuqired)
public $article;
public $MC;
public $Inbox;
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
	$this->pagetitle	= array('title'=>'LiteMessage','subtitle'=>'Perpesanan');
	$this->MC = new Message\Core($this);	
	$this->Inbox =  new LMinbox($arg,$param, $this);
	//$this->addHook('menuicon','Admin_Headericon');
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
	$ac 		= new Article\Core($this);
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
	$article = new Article($id);
	$obj = array("id"=>$article->id, "url"=>$article->url); 
	http_response_code(200);
	$res = array("response"=>200, "article"=>$obj);
	
	}else if($isedit > 0){
	$article = new Article($isedit);
	$article->title 	= $title;
	$article->content 	= $content;
	$article->headline 	= $headline;
	$article->keyword 	= $keyword;
	$article->Photo 	= $photo;
	for($i=0;$i<count($cats);$i++){
		$article->Category[$i] = new Category($cats[$i]);
	}
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
        	<span class="menu-icon"><i class="fa fa-envelope"> </i></span> 
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
	$site = new Site();
	$ib = $this->MC->getInbox(new User(),1, 0, 10);
	$ctr = '<span class="badge vd_bg-red">'.count($ib).'</span>';
	if(count($ib)<1){
		$ctr='';
	}
	$temp='<li id="top-menu-1" class="one-big-icon mega-li"> 
      <a href="index-2.html" class="mega-link" data-action="click-trigger">
    	<span class="mega-icon"><i class="fa fa-envelope"></i></span>'.$ctr.' 
		       
      </a>
	  <div class="vd_mega-menu-content width-xs-3 width-sm-4 width-md-5 width-lg-4 right-xs left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> 
           	   Messages
               <div class="vd_panel-menu">
                     <span data-original-title="Message Setting" data-toggle="tooltip" data-placement="bottom" class="menu">
                        <i class="fa fa-cog"></i>
                    </span>                                                                              
                </div>
           </div>                 
		   <div class="content-list content-image">
           	   <div  data-rel="scroll">	
               <ul class="list-wrapper pd-lr-10">';
 for($i=0;$i<count($ib);$i++){ 
$msg = $ib[$i];
        $photo = $site->logo;
		if($msg->User->photo !=''){
			$photo = $msg->User->photo;
		}
		$tl = explode('|',$msg->title);		
	$title = 	$tl[0];
	if($tl[1] !=''){
		$title = $tl[1];
	}
$temp .='		 <li> 	<a href="'.PROX_URL_ADMIN.'/plugins/LiteMessage/read?msg='.$msg->messenger.'"><div class="menu-icon"><img src="'.$photo.'"></div> 
                            <div class="menu-text"> '.$msg->title.'
                            	<div class="menu-info">
                                    <span class="menu-date">'.$msg->date.'</span>                                                                         
                                    <span class="menu-action">
                                                                                                                 
                                    </span>                                
                            	</div>
                            </div> </a>
                    </li>';
}                                                            
                    
              $temp .=' </ul>
               </div>
               <div class="closing text-center" style="">
               		<a href="'.PROX_URL_ADMIN.'/plugins/LiteMessage/inbox">See All Message <i class="fa fa-angle-double-right"></i></a>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content --> 
   </li>';
	  echo $temp;
}
function editor($param,$hook, $Lc){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){
		/**
		* we use LiteCat API for our plugins
		*/
	$data 	= array("lc"=>$Lc,"args"=>$this->arguments,"param"=>$param, 'article'=>$this->article);
	$this->View->Show("editor",$data);
	}
}
function listpage($param,$hook){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){	
	$ac = new Article_Core($this);
	$pi=0;
	if($param[3] > 0){
	$pi = $param[3]-1;
	}
	$curpg[$pi] = 'class="active"';
	$data 	= array('article_list'=>$ac->getList('all',$pi, 10),
	'pg'=>$pi, 'curpg'=>$curpg);
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
	$art = new Article($_GET['article']);
	$ac = new Article_Core($this);
	$ac->Remove($art,new User(), true);
}
function setStatus(){
	$art = new Article($_GET['article']);
	$stat = $_GET['status'];
	$art->status = $stat;
	$ac = new Article_Core($this);
	$ac->Update($art,new User(), true);	
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
		data:"class=BlogBooster&plugins=1&function=setStatus&article="+id+"&status="+nst,
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
		data:"class=BlogBooster&plugins=1&function=removeArt&article="+id,
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
		$a_id 	= $param[3];
	}
	$this->article = new Article($a_id,$this);
	$temp 		= $param['template'];
	$this->Need("LiteCat","Kategori Lite");		//we require LiteCat Plugins App Installed and active
	$param 		= array_merge($param,array("this"=>$this));
	$Lc 		= new LiteCat($this->arguments,$param);	
	switch($hook){
		case 'Footer_Script': $this->scriptController($param); break;
		case 'Header_Meta':		if($rout=='editor'){echo $Lc->getCss(); echo $this->getCss();}break;		
	}
	//echo $hook;
	/**
	*	we handling logic with router controlling and ignore hook
	*   we show template on where determined by user
	*   we have registered hook Backend_12 by default with template name is Editor,
	*	but user can determine with drag and drop hook position
	*	so we must get current template name in hook, if is Editor so Show our edito template
	*/
	switch($rout){ //router controlling
		case 'inbox':if($temp=='inbox'){$this->Inbox->viewInbox();}
		break;
		case 'read':if($temp=='inbox'){$this->Inbox->readmessage();}
		break;
		case 'action':$this->doaction();
		break;
		
	}
}	
}
function doaction(){
	$inbox 	=	$_POST['icheck'];
	
	if($_POST['act']=='delete'){
		for($i=0;$i<count($inbox);$i++){
		
		$message	=	new Message($inbox[$i]);
		$this->MC->Remove($message, new User(), true);
		}
	}else if($_POST['act']=='read'){
		
	}
	header('location:'.PROX_URL_ADMIN.'/plugins/LiteMessage/inbox/');
}
function send(){
	$mid = addslashes($_POST['messenger']);
	$data = array(
			'title'=>'',
			'content'=>addslashes($_POST['msg']),
			'email'=>'',
			'type'=>'contact'
			);
	$id	=	$this->MC->Create($data, new User(),$mid);
	$msg = new Message($id);
	header("Content-Type: application/json;charset=utf-8");
	$data = array("content"=>$msg->content,"photo"=>$msg->User->photo,
	"email"=>$msg->email, "name"=>$msg->User->name,
	"user_id"=>$msg->User->id,"date"=>$msg->date);
	echo json_encode($data);
	
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
		autocomplete_url:'".PROX_URL."ajax.php?class=BlogBooster&function=data&plugins=1',
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
	$ac = new Article_Core($this);
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

}
?>