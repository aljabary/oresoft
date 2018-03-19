<?php

Class Contact_Controller extends baseController {

public function index() {
	$rt 	=	explode('/',ROUTING);  	//routing
	$pc 	=	new Plugins_Core();
	$pc->init('theme'); 		
	$pc->init('feature'); 					//load class source of plugins's type feature
	$routepage = $rt[0];
	$home = new HomePage($rt, $pc);
	$pageargs = '';
	$pageargs = 'Contact';
	$home->showView('Contact');
	
	
}



}

?>
