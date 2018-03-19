<?php

Class Index_Controller extends baseController {

public function index() {
	$rt 	=	explode('/',ROUTING);  	//routing
	
	$pc 	=	new Plugins_Core();
	$pc->init('theme'); 		
	$pc->init('feature'); 					//load class source of plugins's type feature
	$routepage = $rt[0];
	$home = new HomePage($rt, $pc);
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
