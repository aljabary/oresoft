<?php
/**
LitePageManager  v.2.1.1
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
namespace LitePageManager;
use Prox\Engine\Site;
use Prox\Plugins\Manager_Plug_handler;
use Prox\Engine\Page;
use Prox\Engine\Category;
use Prox\Engine\User;
class MainClass extends Manager_Plug_handler{
public $arguments;
public $lcparam;
private $lvl=1;
public function __construct($arg,$param){
	/**
	* initialize (required)
	*/
//	print_r($param);
	parent::__construct($this,$param);
	$this->Manager = $this->PManager;
	/**
	* Kernel 
	*/
	$this->lcparam = array_merge($param, array('this'=>$this));
	$this->pagetitle	= array('title'=>BCL('LitePageManager','menu1'),'subtitle'=>BCL('LitePageManager','title'));
	$rout = strtolower($param[2]);
	if($rout =='listview'){
	$this->pagetitle	= array('title'=>BCL('LitePageManager','menu1'),'subtitle'=>BCL('LitePageManager','lv')); //(required)
	}
}
public function main($arg,$param,$hook){
	$this->create_menu($arg,$param,$hook);		//create menu by hook and ignore arguments
	
	switch($arg){
		case 'Backend': $this->backend($param,$hook); 	//do action by arguments (Backend)
		break;
		case 'Dashboard': $this->backend($param,$hook); 	//do action by arguments (Dashboard)
		break;
	}
}
function create_menu($arg,$param,$hook){
	if($hook=='Admin_Menu'){
		$this->create_menu_admin();
	}else if($hook=='Admin_Headericon'){
	
	}
	/**
	* do action on Hook Header Meta
	* when argument is Backend
	* on LitePageManager route
	*/
	if($hook =='Header_Meta' && $arg=='Backend' && $param[1]=='LitePageManager'){
		$bb 	= new \BlogBooster\MainClass($this->arguments, $this->lcparam);
		$bb->TinymceLib();
		echo $bb->getCss();
		//$this->scriptListView()
	}
	if($hook =='Footer_Script' && $arg=='Backend' && $param[1]=='LitePageManager' && strtolower($param[2])=='listview'){
	echo $this->scriptListView();
	}
	if($hook =='Footer_Script' && $arg=='Backend' && $param[1]=='LitePageManager'){
		echo $this->loadscriptEditor();
	}		
}
function submit(){
	$pc				=	new Page($this,$_POST['editid']);
	$page				=	$pc->Obj[0];
	$page->content		=	$_POST['bc_editor_lpm_editor'];
	$page->description	=	$_POST['lpm_desc'];
	$page->keyword		=	$_POST['lpm_keyword'];
	
	$pc->Update($page, new User(), true);
	$obj = array("id"=>$page->id,"url"=>$page->url);
	$data = array("response"=>200, "page"=>$obj);
	header("Content-Type: application/json;charset=utf-8");
	http_response_code(200);
	echo json_encode($data);
}
public function create_menu_admin(){
	$temp =' <li><a href="javascript:void(0);" data-action="click-trigger">
        	<span class="menu-icon"><i class="icon-newspaper"> </i></span> 
            <span class="menu-text">'.BCL('LitePageManager','menu1').'</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LitePageManager/create">
                        <span class="menu-text">'.BCL('LitePageManager','menu3').'</span>  
                    </a>
                </li><li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LitePageManager/listview/1">
                        <span class="menu-text">'.BCL('LitePageManager','menu2').'</span>  
                    </a>
                </li>
				
				</ul></div></li>';
	echo $temp;			
}
function view($param,$hook){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){	
	$pc 	= new Page($this);
	$pc->gen($param[3]);
	$page 	= $pc->Obj[0];
	$cc 	= new Category($this);
	$catlist=	$cc->getlist("all",0,100, 'desc');
	$this->Need("LiteCat","Lite Category", "1.0.0");
	$lcparam= array_merge($param, array('this'=>$this));
	$lc = new \LiteCat\MainClass($this->arguments, $lcparam);
	try {
	$tree	= $pc->getlist("all",0,10);
	} catch (PxException $e) {      // Permission Exception
    echo $e;
	} 
	$showerror='style="display:none"';
	if($param[3]=='error'){
		$showerror='';
	}
	
	$this->View->Show("creator", array("tree"=>$tree, 'page'=>$page,
	'lc'=>$lc, 'catlist'=>$catlist, 'showerror'=>$showerror
	));
	}
}
function editor($param,$hook){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){	
	$pc 	= new Page($this);
	$pc->gen($param[3]);
	$page 	= $pc->Obj[0];
	$cc 	= new Category($this);
	$catlist=	$cc->getlist("all",0,100, 'desc');
	$this->Need("BlogBooster","Blog Booster", "1.0.0");
	$lc 	= new \BlogBooster\MainClass($this->arguments, $this->lcparam);
	try {
	$tree	= $pc->getlist("all",0,100);
	} catch (PxException $e) {      // Permission Exception
    echo $e;
	} 	
	$this->View->Show("editor", array("tree"=>$tree, 'page'=>$page,
	'bb'=>$lc, 'catlist'=>$catlist
	));
	}
}
function listview($param,$hook){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){	
		$ac = new Page($this);
		$pi=0;
		if($param[3] > 0){
		$pi = $param[3]-1;
		}
		$curpg[$pi] = 'class="active"';
		$data 	= array('page_list'=>$ac->getList('all',$pi, 20),
		'pg'=>$pi, 'curpg'=>$curpg);
		$this->View->Show("list",$data);
	}
}
	
function backend($param,$hook){
	if(strtolower($param[1])==strtolower($this->Base_Class)){ //Perfom only in own backennd page
	$temp = $param['template'];
	$rout = strtolower($param[2]);
	
	switch($rout){
		case 'create':if($temp=='Editor'){$this->view($param,$hook);}
		break;
		case 'editor':if($temp=='Editor'){$this->editor($param,$hook);}
		break;
		case 'listview':;if($temp=='Editor'){$this->listview($param,$hook);}
		break;
	}
	}
}

function removeArt(){
	$art 	= new Page($this,addslashes($_GET['page']));
	$art->Remove($art->Obj[0],new User(), true);
}
function setStatus(){
	$ac 	= new Page($this,addslashes($_GET['page']));
	$art 	= $ac->Obj[0];
	$stat 	= $_GET['status'];
	$art->status = $stat;
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
		data:"class=LitePageManager.MainClass&plugins=1&function=setStatus&page="+id+"&status="+nst,
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
		data:"class=LitePageManager.MainClass&plugins=1&function=removeArt&page="+id,
		success:function(){			
		$("#al"+id).remove();
		}
	});
}
</script>';
return $temp;
}
function loadscriptEditor(){
	$temp = '<script type="text/javascript" src="'.PROX_URL.'temp/plugins/tagsInput/jquery.tagsinput.min.js"></script>';	
	$temp .="<script>	
	$(document).ready(function(){       
        $('#lpm_form').validate({
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
		if(isub > 0){ $('#lpm_editor').val(tinymce.activeEditor.getContent());isub =0;subm(); }					
            }
        });
		
	$('#lpm_kw').tagsInput({		width: 'auto' });

});
 </script>";
 return $temp;
}

function addnew(){
	$name 		= $_POST['lpm_name'];
	$edit_id 	= $_POST['editid'];
	$parent		= $_POST['parent'];
	$slug		= $_POST['lpm_slug'];
	$catid		= $_POST['lpm_category'];
	$type		= $_POST['lpm_tp'];
	$pc = new Page($this);	
	try {
		
		if($edit_id <1){
			$page = array(
			'name'=>$name, 'slug'=>$slug, 'type'=>$type, 'status'=>"on",
			"category"=>$catid 
			);
			$res = $pc->Create($page,  new User());
		}else{ 
		$pc->gen($edit_id);
		$page 			= $pc->Obj[0];
		$page->name 	= $name;
		$page->slug 	= $slug;
		$page->type 	= $type;
		$cat 			=	new Category($this,$catid);
		$page->Category = $cat->Obj[0];
		$res 			= $pc->Update($page, new User(), true);
		}
		$mres='error';
	if($res['id'] > 0){
		$mres='';		
	}	
	header("location:".PROX_URL."px-admin/plugins/LitePageManager/create/".$mres);
	} catch (PxException $e) {      // Permission Exception
    echo $e;
	} 
}

function updateparent(){
	$pc 	= new Page($this);
	$id 	= $_GET['child'];
	$pid	= $_GET['parent'];
	$pc->gen($id);
	$pc->gen($pid);
	$pg 	= $pc->Obj[0];
	$parent 	= $pc->Obj[1];
	$pg->parent = $parent;
	$co = $pc->update($pg, new User, true);
	//print_r($co);
}

function isSelected($id,$article){
	$sel = "false";
	if($article->Category->id == $id){$sel = "true";}
	return $sel;
}
function createTree($array, $currentParent,$article=null, $currLevel = 0, $prevLevel = -1) {
	$data ='';
foreach ($array as $key => $val) {
$category = $array[$key];
if ($currentParent == $category->parent->id) { 
    if ($currLevel > $prevLevel) $data .= " <ul> ";
    if ($currLevel == $prevLevel) $data .= " </li> ";
    //echo '<li> <label for="subfolder2">'.$category->name.'-'.$currLevel.'</label> <input type="checkbox" id="subfolder2"/>';
    $data .='<li class="lc'.$this->lvl.'" id="'.$this->lvl.'" catid="'.$category->id.'" data-jstree=\'{ "selected" : '.$this->isSelected($category->id,$article).' }\'>'.$category->name;
	$this->lvl++;
	if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }
    $currLevel++; 
	$data .= $this->createTree ($array, $category->id, $currLevel, $prevLevel);	
    $currLevel--;               
    }  
	}
if ($currLevel == $prevLevel) $data .= " </li></ul> ";

return $data;
} 
/*
CREATE TABLE `prox`.`page` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `type` VARCHAR(20) NOT NULL , `view` INT NOT NULL , `date` VARCHAR(20) NOT NULL , `category` VARCHAR(255) NOT NULL , `status` VARCHAR(255) NOT NULL , `keyword` VARCHAR(255) NOT NULL , `description` VARCHAR(255) NOT NULL , `user` VARCHAR(255) NOT NULL , `content` LONGTEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
*/
}
?>