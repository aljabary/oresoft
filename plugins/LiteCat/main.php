<?php
/**
LiteCat  v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
namespace LiteCat;
use Prox\Plugins\Manager_Plug_handler;
use Prox\Engine\Category;
use Prox\System\PxException;
class MainClass extends Manager_Plug_handler{
public $arguments;
public $Manager;  				//(reuqired)
public $pagetitle = array(); 	//(reuqired)
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
	switch($arg){
		case 'Backend': $this->pagetitle	= array('title'=>BCL('LiteCat','menu1'),'subtitle'=>BCL('LiteCat','title')); //(required)
		break;
	}
}
public function main($arg,$param,$hook){
	$this->create_menu($hook);		//create menu by hook and ignore arguments
	
	switch($arg){
		case 'Backend': $this->backend($param,$hook); 	//do action by arguments (Backend)
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
public function create_menu_admin(){
	$temp =' <li>
    	<a href="javascript:void(0);" data-action="click-trigger">
        	<span class="menu-icon"><i class="fa fa-tags"> </i></span> 
            <span class="menu-text">'.BCL('LiteCat','menu1').'</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LiteCat/">
                        <span class="menu-text">'.BCL('LiteCat','menu2').'</span>  
                    </a>
                </li> 
				</ul></div></li>';
	echo $temp;			
}
public function create_headericon_admin(){
	$temp='  <li id="top-menu-1" class="one-big-icon mega-li"> 
      <a href="index-2.html" class="mega-link" data-action="click-trigger">
    	<span class="mega-icon"><i class="fa fa-pencil-square-o"></i></span> 
		<span class="badge vd_bg-red">12</span>        
      </a></li>';
	  echo $temp;
}
function view($param,$hook){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){	
	$cc = new Category_Core($this);
	try {
	$cat_list	=	$cc->getlist("0",0,10, 'desc');
	$tree		=	$cc->getlist("all",0,10, 'desc');
	} catch (PxException $e) {      // Permission Exception
    echo $e;
	} 	
	$this->View->Show("index", array("tree"=>$tree));
	}
}
function backend($param,$hook){
	if(strtolower($param[1])==strtolower($this->Base_Class)){
	$temp = $param['template'];
		if($hook=='Header_Meta'){echo '<link rel="stylesheet" href="'.$this->Url.'js/themes/default/style.css" />';}
		switch($temp){
			case 'Editor':$this->view($param,$hook);
			break;
		}
	}
}

function addnew(){
	$name 		= $_POST['name'];
	$desc 		= $_POST['desc'];
	$edit_id 	= $_POST['editid'];
	$kw			= $_POST['keywords'];
	$parent		= $_POST['parent'];
	$cc = new Category_Core($this);	
	try {
		if($edit_id <1){
			$cc->create($name,$desc, $kw,$parent);
		}else{
		$cat = new Category($edit_id);
		$cat->name = $name;
		$cat->description = $desc;
		$cat->keyword = $kw;
		$cc->update($cat);
		
		}
	header("location:".PROX_URL."px-admin/plugins/LiteCat");
	} catch (PxException $e) {      // Permission Exception
    echo $e;
	} 
}

function updateparent(){
	$cc 	= new Category_Core($this);
	$id 	= $_GET['child'];
	$pid	= $_GET['parent'];	
	$cat 	= new Category($id);
	$parent 	= new Category($pid);
	$cat->parent = $parent;
	$co = $cc->update($cat);
}
/**
* We provide API for other plugins
* other plugin can call this method
*/
public function CatOption($article, $idElemetn){
	$cc = new Category($this);
	try {
	$tree		=	$cc->getlist("all",0,100, 'desc');
	} catch (PxException $e) {      // Permission Exception
    echo $e;
	} 	
	$this->View->Show("option", array("tree"=>$tree, 'article'=>$article, 'idel'=>$idElemetn));	
}
public function getCss(){
	return '<link rel="stylesheet" href="'.$this->Url.'js/themes/default/style.css" />';
}
function isSelected($id,$article){
	$sel 	= "false";
	$ck 	= is_array($article->Category);
	if($article !=null && $ck){
		$cat = $article->Category;
		for($i=0;$i<count($cat);$i++){
			$ct = $cat[$i];
			if($ct->id == $id){
				$sel = "true";
			}
		}
	}else{
			if($article->Category->id == $id){$sel = "true";}
	}
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

}
?>