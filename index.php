<?php session_start();//header("Set-Cookie: PHPSESSID=abc; path=/; domain=localhost");
header('Access-Control-Allow-Origin: *');
session_set_cookie_params(0,"/","http://localhost/proxtrasoft/");
 /*** error reporting on ***/
 //error_reporting(E_ALL);
error_reporting(3);
 /*** define the site path **/
 include 'includes/baseurl.php';
 define('SUB_FOLDER','');
	$xrout	=	explode('?',curPageURL());
	$routing = str_replace(PROX_URL,'',$xrout[0]);
	define("ROUTING",$routing);

 $site_path = realpath(dirname(__FILE__));
 define ('PROX_Domain', $site_path);
 /*** include the init.php file ***/
 include 'includes/init.php';
 /*** load the router ***/
 $registry->router = new router($registry);

 /*** set the controller path ***/
 $registry->router->setPath (PROX_Domain . '/controller');

 /*** load up the template ***/
 $registry->template = new template($registry);

 /*** load the controller ***/
// $registry->router->loader();

$registry->router->loader();	


?>
