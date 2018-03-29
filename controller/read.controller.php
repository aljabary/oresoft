<?php
use Prox\Plugins\Core;
use Prox\Engine\HomePage;
Class Read_Controller extends baseController {

public function index() {
	$rt 	=	explode('/',ROUTING);  	//routing
	$pc 	=	new Core(PERMISSION);
	$pc->init('theme'); 		
	//$pc->init('feature'); 					//load class source of plugins's type feature
	$home = new HomePage($rt, $pc);
	$home->showView('Read');
}



}

?>
