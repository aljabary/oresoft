<?php
/**
@Plugins Core Class
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class load and handling plugins
**/
namespace Prox\Plugins;
use Prox\System\Site;
use Prox\System\PxException;
use Prox\Plugins\Database;
use Prox\Engine\View;
class Core{
	public $plugins = array();
	private $pn;
	private $fol;
	public $DB;
	function __construct(){
		
	}
	/**
	Load source of plugins, load all class where includes from plugins
	this method always call when controller proccessing
	**/
function init($p_type){//Xlog("select * from plugins where status='1'");
		$this->site = new Site();
		$db 	= Xcon(PERMISSION);		
		$q	= mysqli_query($db,"select * from plugins where status='1' ");
		while($g = mysqli_fetch_array($q)){
			if(!class_exists($g['base_class'])){
				$pn = str_replace(' ','-',$g['base_class']);
				$this->pn = $pn;
				$this->fol = 'plugins';
				if($g['p_type']=='theme'){
					$this->fol ='theme_perfthm';
				}
				$file = PROX_Domain.'/'.$this->fol.'/'.$g['base_class'].'/init.php';
				if(is_file($file)){
					include(PROX_Domain.'/'.$this->fol.'/'.$g['base_class'].'/init.php');
				}
			}
			
		}
		
}
	/**
	* Load class file plugins
	*/
function loadclass($data){
		for($i=0;$i<count($data);$i++){
			$file =$data[$i];
			include(PROX_Domain.'/'.$this->fol.'/'.$this->pn.'/'.$file.'.php');
		}
}
function setFolPn($fol,$pn){
		$this->fol = $fol; $this->pn = $pn;
}
	/**
	*	Load active plugins by type (Deprecated)
	*/
public function trigger($p_type,$arg,$param){
		/*
		*	Deprecated
		*
		$db 	= new DB('pxpermission');
		$data 	= array();$i=0;
		$q	= mysqli_query($db->connect(),"select * from plugins where status='1' and p_type='$p_type'");
		while($g = mysqli_fetch_array($q)){
			$base_class 	= $g['base_class'];
			$param 			= array_merge($param,array("this"=>"PERMISSION"));
			$bc 			= new $base_class($arg,$param);
			//$bc->index	 	=	$g["ix"];
		//	$bc->manager	=	new Manager_Plug_handler($bc);
			$data[$base_class]	= $bc; $i++;
		}
		$this->plugins[$p_type]	=	$data;
		//print_r($this->plugins[$p_type]);*/
}
	/**
	* load for use library
	* @param string $libname : library name or class name
	*/
public function UseLib($libname,$namespace=''){
		$cls = '\\'.$libname;
		if($namespace !=''){
			$cls = '\\'.$namespace.$libname;
		}
		if(!class_exists($cls)){
		$dir =PROX_Domain.'/lib/'.$libname.'/';
			if(is_dir($dir)){
				return $this->loadDir($dir);
			}else{
				return false;
			}
		}
}

function loadDir($dire){
		$dir = scandir($dire);
		foreach ( $dir as $key => $value ) {         
           if ( !in_array( $value, array( '.', '..' ) ) ) { 
            if(is_dir($dire.'/'.$value.'/')){
				$this->loadDir($dire.'/'.$value.'/');
				}else if(pathinfo($dire.'/'.$value, PATHINFO_EXTENSION)=='php'){
				include($dire.'/'.$value);return true;
				}
		   }
		}
}	
	
/**
* Call main method plugins, plugins do action, do action for all active plugins
* @param string $p_type : 	type of plugins
* @param string $arg 	:	Arguments for Plugins
* @param array $param 	:	Parameter
* @param string $hook 	:	hook name
* @param int 			:	index | optional
*/	
public function call_action($p_type,$arg,$param, $hook, $i=0){
		$plugs 	= $this->plugins[$p_type];
		$pc		= count($plugs);
				$iparam="";
		if($i > 0){
			$iparam= "and ix='$i'"; 
		}
		$db 	=Xcon(PERMISSION);
		$q	= mysqli_query($db,"SELECT * FROM plugins_hook inner JOIN plugins on plugins_hook.base_class=plugins.base_class 
		where plugins.status='1' and plugins_hook.hook='$hook' $iparam order by ix desc");
		while($g = mysqli_fetch_array($q)){
			$base_class 	= $g['base_class'];
			$param 			= array_merge($param,array("this"=>PERMISSION));
			$namespace 		=	$base_class.'\MainClass';
			$plug 			= new $namespace($arg,$param);
			$rtm 			= array_merge($param,array('template'=>$g['template']));
			$plug->main($arg,$rtm,$hook);	
		}	
		
}
public function hook($arg,$param,$hook,$plug, $i=0){
		if(!$plug->install){
		$db 	= Xcon(PERMISSION);
		$bc		= $plug->Manager->Base_Class;
		$iparam="";
		if($i > 0){
			$iparam= "and ix='$i'"; 
		}
		$q	= mysqli_query($db,"select * from plugins_hook where hook='$hook' and base_class='$bc' $iparam order by ix desc");
		while($g = mysqli_fetch_array($q)){
			$rtm = array_merge($param,array('template'=>$g['template']));
			$plug->main($arg,$rtm,$hook);				//call kernel main do actions
			
		}
		}
}
	
	
public function update_hook(){
		$hook	  = $_GET['hook'];
		$datatemp = explode('-',$_GET['template']);
		$template = $datatemp[1];
		$base_class = $datatemp[0];
		$db = Xcon(PERMISSION);
		mysqli_query($db,"update plugins_hook set hook ='$hook' where template='$template' and base_class='$base_class'");
}
}

class Manager_Plug_handler {
	private $Base_Class;
	protected $PManager='';
	private $signature;
	private $keyproduct;
	private $View;
	private $Url;	
	private $Meta;	
	private $App;
	private $Database;
	private $Setting;
	private	$type;	//(reuqired)
	public $Manager;  				//(reuqired)
	public $pagetitle = array(); 	//(reuqired)
	private $arguments; //(reuqired)
	public $param;//(reuqired)
	private $Base_Dir;
	public $Permissions = array(); 	
	public function DB($bc){
		$b = new DB($bc);
		return Xcon($bc);
	}
	
	public function __construct($bc,$param){
		//$mm = new Media_Core();
		
		$nmspc				=	str_replace('_Installer','',get_class($bc));
		$this->Base_Class	=	str_replace('\MainClass','',$nmspc);
		//$bcc				=	str_replace('_Installer','',get_class($bc));
		$this->Database		=	new Database($bc);
		$q = mysqli_query(Xcon(PERMISSION),"select * from permission where plugins='$this->Base_Class'");
		while($g=mysqli_fetch_array($q)){
		$this->Permissions[$g['permission']] = $g['val'];
		}
		//XLog($this->Permissions);
		//print_r($param);
		$this->PManager 	= 	$this;$this->fol = 'plugins';
		$this->Url			=	PROX_URL.'plugins/'.$this->Base_Class.'/';
		$fn 				=	PROX_Domain.'/plugins/'.$this->Base_Class.'/meta.json';
		$this->Base_Dir		=	PROX_Domain.'/plugins/'.$this->Base_Class.'/';
		if(is_file($fn)){
		$meta 				=	file_get_contents(PROX_Domain.'/plugins/'.$this->Base_Class.'/meta.json');
		$this->Meta			=	json_decode($meta);
		//$this->Meta->info	=	str_replace('{$this->url}',PROX_Domain.'/plugins/'.$this->Base_Class.'/',$this->Meta->info);
		//$this->Meta->license	=	str_replace('{$this->url}',PROX_Domain.'/plugins/'.$this->Base_Class.'/',$this->Meta->license);			
		}else{			
			$this->Url			=	PROX_URL.'theme_perfthm/'.$this->Base_Class.'/';
			$fn 				=	PROX_Domain.'/theme_perfthm/'.$this->Base_Class.'/meta.json';
			$this->Base_Dir		=	PROX_Domain.'/theme_perfthm/'.$this->Base_Class.'/'; 
			if(is_file($fn)){
				$meta 			=	file_get_contents(PROX_Domain.'/theme_perfthm/'.$this->Base_Class.'/meta.json');
				$this->Meta		=	json_decode($meta);	
			}else
			{
				throw new PxException(BCL('px','ex_meta'), 11);		
			}		
		}//Xlog($bc);
		if($param['this'] !=PERMISSION && $this->Meta->local_api=="open"){
			$this->App 		=	$param['this'];
		}else if($param['this'] !=PERMISSION && $this->Meta->local_api !="open"){
		Xlog($param['this']);	throw new PxException(BCL('px','ex_app_local_api'), 12);
		}
		
		$q	= mysqli_query(Xcon(PERMISSION),"select * from plugins where base_class = '$this->Base_Class'");
		while($g = mysqli_fetch_array($q)){
			$this->signature	=	$g['signature'];
			$this->keyproduct	=	$g['key_product'];
			$this->type 		=	$g['p_type'];
		}
	$this->View 		=	new View\Core($this, $bc);			
	$this->Manager 		= 	$this->PManager;
	$this->Setting		=	new Setting($this, $bc);
	$ftk = $this->View->getTrialKey();
	$kes = $this->View->getKeystore();
	if($kes->price > 0 && $ftk !=null){
		$md 	= new MD5Crypt();		
		$tk 	= $md->deccrypt($ftk,$_SERVER["SERVER_NAME"]);
		if($tk !=$this->signature){
			throw new PxException(BCL('px','ex_trialkey_msg'), 20);
		}
	}
}
public function  isLicensed(){
		$md 	= new MD5Crypt();
		$d 		= $md->decrypt($this->signature,$_SERVER["SERVER_NAME"]); //dt
		//$this->UseLib('RijndaelCore');
		$dec 	= str_replace('-','',$d);
		//$kp = explode('||',$this->keyproduct);//20170314110911
		$param 	= $dec.'proxtrasofttechnologyinc';
		//$param 	= substr($param,0,24);
		//$rij 	= new RijndaelCore($param,$_SERVER["SERVER_NAME"]);
		$key 	= $md->decrypt($this->keyproduct,$param);
		//$dkey 	= $md->decrypt($key,$_SERVER["SERVER_NAME"]);
		if($dec	==	$key){
			return true;
		}else{
			return false;
		}		
} 
public function UseLib($libname,$ns=''){
		$pc = new Core();
		$pc->UseLib($libname,$ns);
}
function addHook($temp,$hook,$i=0){
	mysqli_query(Xcon(PERMISSION),"insert into plugins_hook (base_class,template,hook,ix) values ('$this->Base_Class','$temp','$hook','$i')");
}	
private function pxcurl($params,$method = 'GET') {
	/*
	$par = array('scope'=>'developer','action'=>'cekclient',
		'client'=>'DT8BLwdhUGJWdVNnVjhQPVAmUmFTJgdtUzdVbwBoVz9XIA');
			$js= $this->pxcurl($par,'GET');
			echo $js;
			$j = json_decode($js);
			echo $j->code;
	*/
	
	$url =	GRAPH;
     $contents = false;
     if (!in_array($method, array('GET', 'POST'))) {
         error_log(__FUNCTION__ . ": Unknown method '$method'");
         return 'OOOOOO5';
     }
     if ($method == 'GET') {
         if (is_array($params) && count($params) > 0) {
             if ($params === array_values($params)) {
                 error_log(__FUNCTION__ . ": Numerical array recieved for argument '\$params' (assoc array expected)");
                
             }
             else {
                 $url .= '?' . http_build_query($params);
             }
         }
         elseif (!is_null($params)) {
             error_log(__FUNCTION__ . ": If you're making a GET request, argument \$params must be null or assoc array.");
             
         }
     }
     $ch = curl_init($url);
     if ($ch !== false) {
         curl_setopt_array($ch, array(
             CURLOPT_HEADER => false,
             CURLOPT_RETURNTRANSFER => true,
         ));
         if ($method == 'POST') {
             curl_setopt($ch, CURLOPT_POST, true);
             if (is_string($params) || is_array($params)) {
                 curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
             }
             else {
                 error_log(__FUNCTION__ . ": Argument \$params should be an array of parameters or (if you want to send raw data) a string");
                 return 'OOOOOO2';
             }
         }
         $contents = curl_exec($ch);
         curl_close($ch);
     }
     return $contents;
 }
/**
* Requirement other plugins
* @param string $bc : other plugins Base Class
* @param string $v 	: minimum version other plugins | optional
* @param string $name : other plugins name | optional
*/
function Need($bc, $name="",$v=""){	 
	 $db 	=	Xcon(PERMISSION);
	 $sbc 	='';
		$q	= mysqli_query($db,"select * from plugins where base_class = '$bc'");
		while($g = mysqli_fetch_array($q)){
			$tp = $g['p_type'];$fol ='plugins';
			$sbc 	=	$g['base_class'];
			if($tp =='theme'){
				$fol 	='theme_perfthm';				
			}
			$fn 	=	PROX_Domain.'/'.$fol.'/'.$this->Base_Class.'/meta.json';
		if($v != "" ){
			 $meta 		=	file_get_contents($fn);
			 $meta		=	json_decode($meta);
			 if($meta->version >=$v){
				 return true;
			 }else{
				   throw new PxException(BCL('px','ex_need').' '.$bc.' ('.$name.') minimum version '.$v.' current version '.$meta->version, 6);
			 }
		}else{
			
		 return true;
		}
		}
		if($sbc ==''){
			 throw new PxException(BCL('px','ex_need').' '.$bc.' ('.$name.')', 6);
		}
 }
/**
* Installer own Packages
* @param Array $pacs : Array packges name
*/ 
function InstallPack(){
	$pi= 0;
	if($_GET['package']>0){
		$pi =$_GET['package'];
	}
		$pacs 		=	$this->Meta->packages;
		if($pi<count($pacs)){
		$apps 		= 	new Apps();
		$packname 	= 	$this->Base_Dir.'/package/'.$pacs[$pi].".zip";
		$apps->InstallPack($packname,$this->Base_Class,$pi);
		}else{
			header("location:".PROX_URL_ADMIN."/plugins/?bc=".$this->Base_Class."&metatype=".$this->type."&status=success_install&"."&package=".$_GET['package']."&space=".$_GET['space']);
		}
}
public function __get($name){
	  return $this->$name;    
	  
  }
public function __set($name, $value)
  {
	  $name = strtolower($name);
	  switch($name){
		case 'base_class':
                throw new PxException('Plugins Manager Base_Class '.BCL('px','ex_readonly'), 4);
                break;
		case 'keyproduct':
                throw new PxException('Plugins Manager keyproduct '.BCL('px','ex_readonly'), 4);
                break;
		case 'signature':
                throw new PxException('Plugins Manager signature '.BCL('px','ex_readonly'), 4);
                break;				
	  }
  }
}

?>