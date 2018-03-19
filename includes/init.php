 <?php
/**Load Core for proccessing data to show data on view**/ 
 function loadDir($dire){
		$dir = scandir($dire);
		foreach ( $dir as $key => $value ) {         
           if ( !in_array( $value, array( '.', '..' ) ) ) { 
            if(is_dir($dire.'/'.$value.'/')){
				loadDir($dire.'/'.$value.'/');
				}else if(pathinfo($dire.'/'.$value, PATHINFO_EXTENSION)=='php'){
				include($dire.'/'.$value);
				//echo $dire.'/'.$value.'<br>';
				}
		   }
		}
	}
//include(PROX_Domain.'/core/plugins.php');		
loadDir(PROX_Domain.'/core');
loadDir(PROX_Domain.'/obj');
loadDir(PROX_Domain.'/engine');
function Zcon(){
	$con = new Prox\System\DB(PERMISSION);
	$xnect =	$con->connect();
	return $xnect;
}
$XCON = Zcon();
function Xcon($bc){
	global $XCON;
	
	$per = new Prox\System\Permission($bc);
	$per->validate('DATABASE', '', 3);
	return $XCON;
}
function XLog($v){
		echo '<pre>';
		print_r($v);
		echo '</pre>';
}
function seo_friendly($string){
   $clear = preg_replace('/[^a-zA-Z0-9\s]/', ' ', strip_tags(html_entity_decode($string)));   
  
   return $clear;
}

function seo_key($string){
   $clear = preg_replace('/[^a-zA-Z0-9\s]/', ' ', strip_tags(html_entity_decode($string)));   
   $clear = str_replace(' ', ', ', strip_tags($clear));
   return $clear;
}

function seo_link($string){
   $clear = preg_replace('/[^a-zA-Z0-9\s]/', '', strip_tags(html_entity_decode($string)));   
   $clear = str_replace(' ', '-', strip_tags($clear));
   return $clear;
}
 include PROX_Domain . '/application/' . 'controller_base.class.php';
 /*** include the registry class ***/
 include PROX_Domain . '/application/' . 'registry.class.php';
 /*** include the router class ***/
 include PROX_Domain . '/application/' . 'router.class.php';
 /*** include the template class ***/
 include PROX_Domain . '/application/' . 'template.class.php';
 /** Initialize Language **/
 includefile();
	/*** auto load model classes ***/
    function __autoload($class_name) {
    $filename = strtolower($class_name) . '.class.php';
    $file = PROX_Domain . '/model/' . $filename;

    if (file_exists($file) == false)
    {
        return false;
    }
  include(PROX_Domain.$file);
  $filename = strtolower($class_name) . '.php';
    $file = PROX_Domain . '/engine/core/' . $filename;

    if (file_exists($file) == false)
    {
        return false;
    }
  echo(PROX_Domain.$file);
}
 /*** a new registry object ***/
 $registry = new registry;
 /*** create the database registry object ***/
 //LOAD Theme
 
?>
