<?php
/**
@Admin Controller Class
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This controller for backend
**/
use Prox\Plugins\Core;
use Prox\Plugins\Plugins_Manager;
use Prox\DB;
use Prox\Plugins\Apps;
class Plugins_Controller extends baseController {

public function index() 
{
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core(PERMISSION);
	$pc->init('tools'); 					//load class source of plugins's type tools
	$bc				= $rt[1];
	if($rt[1] !=''){
	$pm		=	new Plugins_Manager($rt,$pc,$bc);
	$pm->show();
	}else{
		//$app	=	new Apps();
		$app 	=	new Plugins_Manager($rt,$pc,'');
		$app->showPluginsList();
	}

//do something what you want to measure

}
public function login(){	
$site = new Site();
$view_title= lang('login_title').$site->name;
include(PROX_Domain.'/temp/login.php');
}
public function checklogin(){
	if(!isset($_SESSION['admin'])){
		header('location:'.PROX_URL.'px-admin/admin/login');
	}
}
function info(){
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core();
	//$pc->init('tools'); 					//load class source of plugins's type tools
	$bc		= $rt[2];
	$app 	=	new Plugins_Manager($rt,$pc,$bc);
	$app->showPluginsInfo();
	
}
function setting(){
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core();
	$pc->init('tools'); 					//load class source of plugins's type tools
	$bc		= $rt[2];
	$app 	=	new Plugins_Manager($rt,$pc,$bc);
	$app->showPluginsSetting();
}
function savehook(){
	$bc = $_POST['bc'];
	$app = new Apps();
	$app->saveHook($bc);
}
function install_license(){
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core(new DB(PERMISSION));
	$pc->init('tools'); 					//load class source of plugins's type tools
	$bc		= $rt[2];
	$app 	=	new Plugins_Manager($rt,$pc,$bc);
	$app->install_license();
}
function install_permission(){
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core();
	$pc->init('tools'); 					//load class source of plugins's type tools
	$bc		= $rt[2];
	$app 	=	new Plugins_Manager($rt,$pc,$bc);
	$app->install_permission();
}

function license_cb(){
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core();
	$pc->init('tools'); 					//load class source of plugins's type tools
	$bc		= $rt[2];
	$app 	=	new Plugins_Manager($rt,$pc,$bc);
	$app->license_cb($_GET['cb'],'License');
}
function permission_cb(){
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core(new DB(PERMISSION));
	$pc->init('tools'); 					//load class source of plugins's type tools
	$bc		= $rt[2];
	$app 	=	new Plugins_Manager($rt,$pc,$bc);
	$app->license_cb($_GET['cb'],'Permission');
}
function install_activation(){
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core();
	$pc->init('tools'); 					//load class source of plugins's type tools
	$bc		= $rt[2];
	$app 	=	new Plugins_Manager($rt,$pc,$bc);
	$app->activation($_GET['cb'],'Permission');
}
function uninstall(){
	$this->checklogin();
	$meta 			=	strtolower($_GET['metatype']);
	$base_class		=	$_GET['bc'];
	$fol = 'plugins';
	if($meta=='theme'){
			$fol ='theme_perfthm';
	}
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core();
	$pc->init('tools'); 					//load class source of plugins's type tools
	$bc		= $rt[2];
	$app 	=	new Plugins_Manager($rt,$pc,$bc);
	$app->uninstall($base_class,$fol);
}
function tes(){
	//membuat keystore
	$pcore = new Core(); 
					$pcore->UseLib('RijndaelCore');
					$rij = new RijndaelCore('proxtrasofttechnologyinc','sellupbooster');
					$js ='{
"name":"Lite Theme",
"base_class":"LiteTheme",
"version":"1.0.0",
"permission":["MEDIA","ARTICLE.READ","CATEGORY.READ","MESSAGE","COMMENT","USER"],
"logo":"ab.png",

"type":"theme",
"info":"{$this->url}temp/about.txt",
"description":"Create and Read message",
"target_version":"0.1.0",
"developer":{
"name":"RockBurst Digital 5419",
"url":"http://sellupbooster.com",
"email":"official@sellupbooster.com",
"email":"official@sellupbooster.com",
"address":"Jl Cileungsi - Jonggol KM 11",
"contact":"+62 857 8196 5049"
},
"license":"../license.txt",
"price":0
}';
					$md = new MD5crypt();
					$keystore= $md->encrypt($js,'proxtrasofttechnologyinc');
					Xlog($keystore);
					$dt 	= date('Y-m-d-H-i-s');
					$sign 	= $md->encrypt($dt.'_User Management',$_SERVER["SERVER_NAME"]);
					
					//Xlog($sign);
					/*$signt = 'UGRUNABpUj9Vf1g3B2YCKwBmV24EewgxB2dcJAppU2sMJwhoUTBWXFEDAS1QZ1YgUCQHR1JhDWoENgY0VWYCYVAzVGoALA==';
					//echo $dt;
					echo $md->decrypt($signt,'proxtrasofttechnologyinc').'<br>';
					
					$kp = $this->createkeyproduct($signt,$_SERVER["SERVER_NAME"]);
					Xlog($kp);*/
					
					
}
function createkeyproduct($signature='',$servername){
	$md = new MD5crypt();
	$d 		= $md->decrypt($signature,$servername); //dt
	$dec 	= str_replace('-','',$d);Xlog($dec);	
	$param 	= $dec.'proxtrasofttechnologyinc';	
	$dt= $md->encrypt($dec,$param);
	return $dt;
}
}//

?>
