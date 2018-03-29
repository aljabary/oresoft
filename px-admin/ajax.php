<?php header('Access-Control-Allow-Origin: *');session_set_cookie_params(0,"/",".sellupbooster.com");session_start();
error_reporting(3);
set_time_limit(300);
 /*** define the site path **/

 include 'includes/baseurl.php';

 $site_path = realpath(dirname(__FILE__));
 define ('PROX_Domain', $site_path);


include('includes/init.php');
$class	= $_GET['class'];
$function = $_GET['function'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$class	= $_POST['class'];
$function = $_POST['function'];
}
/*
function loadplug(){
	$plug	=	new Plugins_Core();
		$adm 	=	new Admin_Core();
		$plug->classhandle = $adm;
		$plug->load('admin');
		$c = $adm->menusize;
		$menu_app = array();
		$menu_media = array();
		$menu_page = array();
		$menu_article = array();
		$menu_parent = array();
		$menu = array();

		for($i=0;$i<=$c;$i++){
			switch($adm->parent[$i]){
				case 'app':array_push($menu_app,array( //array
							'menu'=>$adm->menu[$i].$c,
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
				case 'media':array_push($menu_media,array( //array
							'menu'=>$adm->menu[$i],
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
				case 'page':array_push($menu_page,array( //array
							'menu'=>$adm->menu[$i],
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
				case 'article':array_push($menu_article,array( //array
							'menu'=>$adm->menu[$i],
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
				case 'parent':array_push($menu_parent,array( //array
							'menu'=>$adm->menu[$i],
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
			}





		}
	$menu =array( //data
		'adm_app'=>$menu_app, 'adm_media'=>$menu_media, 'adm_page'=>$menu_page,
		'adm_article'=>$menu_article, 'adm_parent'=>$menu_parent
				);
		return $menu ;//_app;	
}*/
//$lp = loadplug();
$cl = new $class();
//cl->menu_app = $lp;
$cl->$function();
?>