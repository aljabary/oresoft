<?php
/**
LiteTheme  v.2.1.1
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
namespace LiteTheme;
use Prox\System\Site;
use Prox\Engine\Article\Core;
use Prox\Plugins\Theme;
class MainClass extends Theme{
private $lvl=1;
public $LThome;
public $pagetitle;
public function __construct($arg,$param){
	/**
	* initialize (required)
	*/
	parent::__construct($this,$param);
	$this->pagetitle	= array('title'=>'LiteTheme','subtitle'=>BCL('LiteTheme','subtitle')); //(required)
	$this->param 		= $param;	
	
}
/**
* Main kernel,
* manage controller and hook parameters
*/
public function main($arg,$param,$hook){
	$this->create_menu($hook);		//create menu by hook and ignore arguments
/**
* Instantiate LThome Object
*/	
	$this->LThome 	= new LThome($arg,$param,$this);
	switch($arg){
		case 'Homepage': 	$this->LThome->Home(); 	//do action by arguments (Home)
		break;
		case 'Backend': $this->backend($param,$hook);	//do action by arguments (Dashboard)
		break;
		case 'Read': 	$this->LThome->Read(); 	//do action read article 
		break;
		case 'Page': 	$this->LThome->Page(); 	//do action show page 
		break;
		case 'NotFound': $this->LThome->CustomRouting(); 	//do action show page 
		break;
		case 'Category': $this->LThome->Category(); 	//do action show page 
		break;
		case 'Tag': $this->LThome->Tag(); 	//do action show page 
		break;
		case 'Contact': $this->LThome->Contact(); 	//do action show page 
		break;
	}
}

function create_menu($hook){
	if($hook=='Admin_Menu'){
		$this->create_menu_admin();
	}	
}

public function create_menu_admin(){
	$temp ='<li><a href="javascript:void(0);" data-action="click-trigger">
        	<span class="menu-icon"><i class="icon-palette"> </i></span> 
            <span class="menu-text">Pengaturan Tema</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LiteTheme/">
                        <span class="menu-text">Sesuiakan</span>  
                    </a>
                </li> 
				</ul></div></li>';
	echo $temp;			
}
function view_($param,$hook){
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

function view($param,$hook){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){ 
	
	$data=array("url"=>PROX_URL_ADMIN.'/plugins/LiteMedia/auvi/1',
		);
	
	$this->View->Show("setting",$data);
	}
}
public function sendComment(){
	$name 	= addslashes($_POST['name']);
	$email 	= addslashes($_POST['email']);
	$comment= addslashes($_POST['comment']);
	$article= addslashes($_POST['article']);	
	$user 	=	new User();
	$cc 	=	new Comment_Core($this);
	$not 	=	new Notification_Core($this);
	$art = new Article($article);
	if($user->id > 0){		//if session user
		$comments	=	array('content'=>$comment,
		'object'=>$article,	'otype'=>'article'	
		);
		$com_id = $cc->Create($comments, $user);
	}else{ // if user not login
		$site 	= new Site();
		$uc 	= new User_Core($this);
		$data 	= array('name'=>$name,'email'=>$email,'photo'=>$site->logo
		);
		$uid = $uc->CreateUnAuthorize($data); //get or create new user
		$user->getdata($uid);
		$comments	=	array('content'=>$comment,
		'object'=>$article,	'otype'=>'article'	
		);
		$com_id = $cc->Create($comments, $user);
	}
	$ac = new Admin_Core($this);
	$adm	= 	$ac->getAllAdmin(ADM_SUPER); //get admin list
	$notData = array(
	'title'=>$user->name.' '.BCL('LiteTheme','not_title'). ' '.BCL('LiteTheme','ur_article'),
	'content'=>$user->name.' '.BCL('LiteTheme','not_title'). ' '.BCL('LiteTheme','ur_article').' \"'.$art->title.'\"',
	'urlresult'=>$art->url
	);
	
	foreach($adm as $key=>$val){
	$not->Create($notData,$user,$val); //send notification for each admin level super (admin and master)
	}
	header("location:".$art->url);
}

public function UpdateSetting(){
	$colh = $_POST['col_header'];
	$colb = $_POST['col_button'];
	$colf = $_POST['col_footer'];
	$coll = $_POST['col_label'];
	$colln = $_POST['col_linknav'];
	$this->Setting->setVal("color", "header", $colh);
	$this->Setting->setVal("color", "button", $colb);
	$this->Setting->setVal("color", "footer", $colf);
	$this->Setting->setVal("color", "label", $coll);
	$this->Setting->setVal("color", "linknav", $colln);
	header("location:".PROX_URL_ADMIN.'/plugins/LiteTheme');
}


public function UpdateSettingCom(){
	$icom = $_POST['icom'];
	$this->Setting->setVal("comment", "mod", $icom);
	header("location:".PROX_URL_ADMIN.'/plugins/LiteTheme');
}
public function UpdateSettingSosial(){
	$fb = $_POST['fb'];
	$tw = $_POST['tw'];
	$gp = $_POST['gp'];
	$h = $_POST['l_h'];
	$m = $_POST['l_m'];
	$w = $_POST['l_w'];
	$this->Setting->setVal("social", "facebook", $fb);
	$this->Setting->setVal("social", "twitter", $tw);
	$this->Setting->setVal("social", "googlplus", $gp);
	
	$this->Setting->setVal("logo", "_h", $h);
	$this->Setting->setVal("logo", "_m", $m);
	$this->Setting->setVal("logo", "_w", $w);
	header("location:".PROX_URL_ADMIN.'/plugins/LiteTheme');
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
	if(strtolower($param[1])==strtolower($this->Base_Class)){
	$temp = $param['template'];
	$rout = strtolower($param[1]);
	switch($temp){
		case 'setting':$this->view($param,$hook);
		break;
	}
	}
}
/**
* we provide API Local for other plugins
* this method for embed uploader
* @param string $url : redirect URL
*/
public function getUploader($url){
	$this->View->Show("uploader",array("url"=>$url));
}
public function LTremove(){
	$mc = new Media_Core($this);
	$mtp = ucfirst($_GET['mtp']);
	$media = new $mtp($_GET['mid']);
	$mc->Remove($media);
}
}
?>