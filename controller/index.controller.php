<?php

Class Index_Controller extends baseController {

public function index() {
	$rt 	=	explode('/',ROUTING);  	//routing
	
	$pc 	=	new Prox\Plugins\Core(PERMISSION);
	$pc->init('theme'); 		
	//$pc->init('feature'); 					//load class source of plugins's type feature
	$routepage = $rt[0];
	$home = new Prox\Engine\HomePage($rt, $pc);
	$pageargs = '';
	if(empty($routepage)){
		$pageargs = 'Homepage';
	$home->showView('Homepage');
	}
	if($routepage !=""){
	$pageargs = 'Page';
	$home->showView($pageargs);
	}
	
}



}

?>
