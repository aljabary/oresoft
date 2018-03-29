<?php
use Prox\Plugins\Core;
use Prox\Engine\HomePage;
Class Category_Controller extends baseController {

public function index() {
	$rt 	=	explode('/',ROUTING);  	//routing
	$pc 	=	new Core();
	$pc->init('theme'); 		
	//$pc->init('feature'); 					//load class source of plugins's type feature
	$home = new HomePage($rt, $pc);
	$home->showView('Category');
}



}

?>
