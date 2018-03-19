<?php
/**
LiteMedia  v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
namespace LiteMedia;
use Prox\System\Site;
use Prox\Plugins\Manager_Plug_handler;
use Prox\Engine\Media_Core;
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
		case 'Backend': $this->pagetitle	= array('title'=>'liteMedia','subtitle'=>BCL('LiteMedia','title')); //(required)
		break;
	}
}
/**
* Main kernel,
* manage controller and hook parameters
*/
public function main($arg,$param,$hook){
	$this->create_menu($hook);		//create menu by hook and ignore arguments
	switch($arg){
		case 'Backend': $this->backend($param,$hook); 	//do action by arguments (Backend)
		break;
		case 'Dashboard': $this->backend($param,$hook); 	//do action by arguments (Dashboard)
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
        	<span class="menu-icon"><i class="fa fa-play-circle"> </i></span> 
            <span class="menu-text">'.BCL('LiteMedia','menu1').'</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LiteMedia/photo/1">
                        <span class="menu-text">'.BCL('LiteMedia','photo').'</span>  
                    </a>
                </li>
<li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LiteMedia/auvi/1">
                        <span class="menu-text">'.BCL('LiteMedia','auvi').'</span>  
                    </a>
                </li><li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LiteMedia/document/1">
                        <span class="menu-text">'.BCL('LiteMedia','docs').'</span>  
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
	$mc = new Media_Core($this);
	try {	
	} catch (PxException $e) {      // Permission Exception
    echo $e;
	}
	$route	=	strtolower($param[2]);
	$num = 1;$curpage=1;
	if(!empty($param[3])){
		$num = $param[3];$curpage= $param[3];
	}	
	$curpg[$num] = 'class="active"';
	if($route == 'photo') {	
		$pg = $mc->getPageCount("photo",12);
		
		$this->View->Show("gallery", array("url"=>PROX_URL_ADMIN.'/plugins/LiteMedia/photo/1',
		'photos'=>$mc->getPhoto($num-1,12), 
		'pg'=>$pg, 'curpg'=>$curpg, 'curpage'=>$curpage));
		}
	else if($route == 'auvi') {	
	$pa = $mc->getPageCount("audio",12);
	$pv = $mc->getPageCount("video",12);
	$pg = $pa+$pv;
	$this->View->Show("auvi", array("url"=>PROX_URL_ADMIN.'/plugins/LiteMedia/auvi/1',
	'photos'=>$mc->getAuvi($num-1,12), 
	'pg'=>$pg, 'curpg'=>$curpg, 'curpage'=>$curpage,
	'ptitle'=>'Audio & Video', 'picon'=>'fa-music',
	));
	}
else if($route == 'document') {	
	$pg = $mc->getPageCount("document",12);
	$this->View->Show("auvi", array("url"=>PROX_URL_ADMIN.'/plugins/LiteMedia/document/1',
	'photos'=>$mc->getDocument($num-1,12), 
	'pg'=>$pg, 'curpg'=>$curpg, 'curpage'=>$curpage,
	'ptitle'=>'Documents', 'picon'=>'fa-file-word-o'));
	}	
	}
}


function upload(){
	$url = $_POST['url'];
	if($_FILES){
		
   foreach ($_FILES as $key => $value)
   {
	   $fn = strtolower($value["name"]);
	   $xt = pathinfo($fn, PATHINFO_EXTENSION);
		switch($xt){
				case "jpeg"	: 	$tp = "photo"; break;
				case "png"	: 	$tp = "photo"; break;
				case "jpg"	: 	$tp = "photo"; break;
				case "gif"	: 	$tp = "photo"; break;
				case "bmp"	: 	$tp = "photo"; break;
				case "mp3"	: 	$tp = "sound"; break;
				case "mp4"	: 	$tp = "video"; break;
				case "mov"	: 	$tp = "video"; break;
				case "wmv"	: 	$tp = "video"; break;
				case "3gp"	: 	$tp = "video"; break;
				case "ogg"	: 	$tp = "sound"; break;
				case "ogp"	: 	$tp = "video"; break;
				default		: 	$tp = "document"; break;
		}
		
   }
	$mc = new Media_Core($this);
	$up	= $mc->PhotoUpload($_POST['lmtitle']);
	if($tp !="photo"){		
	$id = $up[0]['id'];
	}else{
	$id = $up[75]['id'];
	}
	}header("location:".$url.'/'.$id.'/'.$tp);
}
function backend($param,$hook){
	if(strtolower($param[1])==strtolower($this->Base_Class)){ //Perfom only in own backennd page
	$temp = $param['template'];
	if($hook=='Header_Meta'){echo '<link rel="stylesheet" href="'.$this->Url.'css/magnific-popup.css" />';}
	switch($temp){
		case 'galery':$this->view($param,$hook);
		break;
	}
	
	if($hook=='Footer_Script'){echo $this->getScript();}
	}
}
public function getScript(){
	$temp ='<script type="text/javascript" language="javascript" src="'.$this->Url.'/js/jquery.magnific-popup.js"></script>';
	//$temp .= '<script type="text/javascript" src="'.PROX_URL.'temp/plugins/tagsInput/jquery.tagsinput.min.js"></script>';
	$temp .="<script>/*
	Gallery
	*/
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href=\'%url%\">The image #%curr%</a> could not be loaded.'
		}
	});
	function LMremove(id, mtp){
		$.ajax({
		url:base_url+'ajax.php',
		data:'class=LiteMedia&plugins=1&function=LMremove&mid='+id+'&mtp='+mtp,
		success:function(){			
		$('#lml'+id).remove();
		}
	});
	}
</script>";
	return $temp;
}
/**
* we provide API Local for other plugins
* this method for embed uploader
* @param string $url : redirect URL
*/
public function getUploader($url){
	$this->View->Show("uploader",array("url"=>$url));
}
public function LMremove(){
	$mc = new Media_Core($this);
	$mtp = ucfirst($_GET['mtp']);
	$media = new $mtp($_GET['mid']);
	$mc->Remove($media);
}
}
?>