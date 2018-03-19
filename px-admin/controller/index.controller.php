<?php
/**
@Admin Index Controller Class
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This controller for backend
**/

class Index_Controller extends baseController {
public $ready =array();
public function index() 
{
	$this->checklogin();
	$rt 	=	explode('/',ROUTING); 	//routing
	
	$pc 	=	new Prox\Plugins\Core(PERMISSION);
	//$pc->init('tools'); 					//load class source of plugins's type tools
	$pm		=	new Prox\Engine\Dashboard($rt,$pc);
	$pm->show();
}
public function checklogin(){
	if(!isset($_SESSION['admin'])){
		header('location:'.PROX_URL.'px-admin/admin/login');
	}
}
}

?>
