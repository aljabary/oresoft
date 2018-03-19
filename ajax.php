<?php session_start();header('Access-Control-Allow-Origin: *');
//ini_set('session.cookie_domain', '.sellupbooster.com');session_set_cookie_params(0,"/",".sellupbooster.com");
error_reporting(3);
set_time_limit(300);
 /*** define the site path **/
include 'includes/baseurl.php';
 $site_path = realpath(dirname(__FILE__));
define ('PROX_Domain', $site_path);
include('includes/init.php');
$pc 	=	new Prox\Plugins\Core();
$pc->init('tools');
/*$pc->init('tools');
$pc->init('feature');
$pc->init('theme');
$pc->init('page');*/
$class		= $_GET['class'];
$function 	= $_GET['function'];
$plug 		= $_GET['plugins'];
$subclass 	= $_GET['subclass'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$class		= $_POST['class'];
$function 	= $_POST['function'];
$plug 		= $_POST['plugins'];
$subclass 	= $_POST['subclass'];
}
if($plug){
$ns = str_replace('.','\\',$class);
$cl = new $ns('ajax',array('this'=>PERMISSION,'ocon'=>$pc->Database));
	if($subclass){	
		$ns = str_replace('.','\\',$subclass);
		$cl = new $ns('ajax',array('this'=>PERMISSION,'ocon'=>$pc->Database),$cl);
	}
}else{
$cl = new $class(PERMISSION);
}
//cl->menu_app = $lp;
$cl->$function();
?>