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
		$app 	=	new Plugins_Manager($rt,$pc,'Apps');
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
	$pc->init('tools'); 					//load class source of plugins's type tools
	$bc		= $rt[2];
	$app 	=	new Plugins_Manager($rt,$pc,$bc);
	$app->showPluginsInfo();
	
}
function setting(){
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	$pc 	=	new Core(new DB(PERMISSION));
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
	$pcore = new Core(new Prox\System\DB(PERMISSION));
					$pcore->UseLib('RijndaelCore');
					$rij = new RijndaelCore('proxtrasofttechnologyinc','sellupbooster');
					$js ='{"name":"Lite Message",
"base_class":"LiteMessage",
"version":"1.0.0",
"type":"tools",
"developer":{
"name":"RockBurst Digital 5419",
"url":"http://sellupbooster.com",
"email":"official@sellupbooster.com"
},"price":0}';
					$ecr= $rij->encrypt($js);
					echo $ecr;//.'<br><br>';
					//$ecrs = nl2br($ecr);//echo $ecrs;
					
					$json= $rij->decrypt($ecr);
					
					$meta = json_decode($json);
					
}
}//

?>
