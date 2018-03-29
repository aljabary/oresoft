<?php
function curPageURL() {
 $pageURL = 'http'; $protocol='http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s"; $protocol.='s';}
 $pageURL .= "://"; $protocol .='://'; define('HTTP', $protocol);
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

$current_url = curPageURL();
//echo $current_url;

 define ('PROX_URL', 'http://localhost/oresoft/');
 define('PROX_URL_ADMIN','http://localhost/oresoft/px-admin');
 define('GRAPH','http://localhost/sellupbooster/graph/');
 define('TEMP','http://localhost/oresoft/temp/');
 define('ADM_EDITOR',1);
 define('ADM_ADMIN',2);
 define('ADM_MASTER',3);
 define('ADM_SUPER','ADMIN SUPER');
 //define('PROX_URL',$current_url);
function BCL($plugins, $key){ 
	global $lang;	
	$l =$lang[$plugins];
	$l = $l[$key];
	return $l;
	}
?>