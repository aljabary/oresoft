<?php
/**
@Plugins Manager Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asaduddin Shakir Al-Jabary
This class load, handling plugins and routing
**/
namespace Prox\Plugins;
use Prox\Plugins\Core;
use Prox\System\Site;
use Prox\Engine\User;
class Plugins_Manager extends Core{
	public $plug;
	public $routing;
	public $status;
	public $Plugins_Manager;
	public $type;
	private $Database;
	/**
	Constructor initialize plugin and routing
	**/
function __construct($rt,$pc,$bc){
	parent::__construct();
		$this->routing 	= $rt;
		
		$this->Database=Xcon(PERMISSION);
		$db 			= Xcon(PERMISSION);
		$q = mysqli_query($db,"select * from plugins where base_class='$bc'");
		while($g = mysqli_fetch_array($q)){
			$this->status = $g['status'];
			$this->type = $g['p_type'];
		}
		//$this->trigger('tools','Backend',$rt);	
		if($this->type !='tools'){		
		$this->init($this->type); 
		}
		//$this->trigger($this->type,'Backend',$rt);
		$pl   		  = $this->plugins[$this->type];
		$this->Plugins_Manager = $pc;
		$this->Plugins_Manager->plugins['tools'] = $this->plugins['tools'];
		$bcl		= explode('_',$bc);
		$base_class =  UCfirst($bcl[0]);
		if(count($bcl)>1){
		$base_class = UCfirst($bcl[0]).'_'.UCfirst($bcl[1]);
		}
		if(!empty($bc)){
		$param 			= array_merge($this->routing,array("this"=>"PERMISSION"));
		$namespace 	=	$base_class.'\MainClass';
		$this->plug = new $namespace('Backend',$param);
		}
				
}
function show(){
	$site 	= new Site();
	$user	= new User();
	$plugins_arg = 'Backend';$PXargs='Backend';
	$view_title= $this->plug->pagetitle['title'].' - '.$this->plug->pagetitle['subtitle'];
	include(PROX_Domain.'/temp/plugins.backend.php');
}
function showPluginsList(){
	$site 	= new Site();
	$user	= new User();
	$plugins_arg = 'Plugins';$PXargs='Plugins';
	$view_title= BCL('px','apps').' - '.BCL('px','apps_sub');
	$pg 	=	$_GET['page'];
	/***pagination ***/
	$bef_	=	0;	
	if($pg <1){$st = 0;}else{$st = 2*$pg;$bef_ 	= $pg-1;}	
	$curpg[$bef_] = 'class="active"';
	include(PROX_Domain.'/temp/plugins.list.php');
}
function getAllplugins(){
		$con	=	Xcon();
		$data 	=	array();$i=0;
		$pg 	=	$_GET['page'];
		if($pg <2){
			$st = 0;
		}else{
			$st = 20*$pg;
		}
		$q =	mysqli_query($con,"select * from plugins order by id desc limit $st,20");
		while($g =  mysqli_fetch_array($q)){
			$data[$i] = $g;$i++;
		}
		return $data;
}
	
function showPluginsInfo(){
	$site 	= new Site();
	$user	= new User();
	$plugins_arg = 'Plugins_Info';$PXargs='Plugins_Info';
	$view_title= $this->plug->pagetitle['title'].' - '.$this->plug->pagetitle['subtitle'];
	include(PROX_Domain.'/temp/plugins.list.php');
}
function showPluginsSetting(){
	$site 	= new Site();
	$user	= new User();
	$plugins_arg = 'Plugins_Setting';$PXargs='Plugins_Setting';
	$view_title= $this->plug->pagetitle['title'].' - '.$this->plug->pagetitle['subtitle'];
	include(PROX_Domain.'/temp/plugins.list.php');
}
function install_license(){
	$site	 		= new Site();
	$user			= new User();
	$plugins_arg 	= 'Plugins_Install_License';$PXargs='Plugins_Install_License';
	$base_class		=	$_GET['bc'];
	$meta 			=	strtolower($_GET['metatype']);
	$fol = 'plugins';
	if($meta=='theme'){
			$fol ='theme_perfthm';
	}
	$fn 			=	file_get_contents(PROX_Domain.'/plugins/'.$base_class.'/meta.json');
	$pn				=	$base_class;
	parent::setFolPn($fol,$pn);
	if(!class_exists($base_class)){
	include(PROX_Domain.'/'.$fol.'/'.$base_class.'/init.php');
	}
	include(PROX_Domain.'/'.$fol.'/'.$base_class.'/install.php');
	$param 			= array_merge($this->routing,array("this"=>"PERMISSION"));
	$base_class	=	$base_class.'_Installer';
	$this->plug = new $base_class('Backend',$param);
	$view_title= BCL('px','license').' '.$this->plug->name;
	include(PROX_Domain.'/temp/plugins.list.php');
}
function install_permission(){
	$site	 		= new Site();
	$user			= new User();
	$plugins_arg 	= 'Plugins_Install_Permission';$PXargs='Plugins_Install_Permission';
	$base_class		=	$_GET['bc'];
	$meta 			=	strtolower($_GET['metatype']);
	$fol = 'plugins';
	if($meta=='theme'){
			$fol ='theme_perfthm';
	}
	$fn 			=	file_get_contents(PROX_Domain.'/plugins/'.$base_class.'/meta.json');
	$pn				=	$base_class;
	parent::setFolPn($fol,$pn);	
	if(!class_exists($base_class)){
	include(PROX_Domain.'/'.$fol.'/'.$base_class.'/init.php');
	}
	include(PROX_Domain.'/'.$fol.'/'.$base_class.'/install.php');
	$param 			= array_merge($this->routing,array("this"=>"PERMISSION","ocon"=> $this->Database));
	$base_class	=	$base_class.'_Installer';
	$this->plug = new $base_class('Backend',$param);
	$view_title= BCL('px','license').' '.$this->plug->name;
	include(PROX_Domain.'/temp/plugins.list.php');
}
	
function license_cb($result,$cbtp){
	$site	 		= new Site();
	$user			= new User();
	$plugins_arg 	= 'Plugins_Install_'.$cbtp;$PXargs='Plugins_Install_'.$cbtp;
	$base_class		=	$_GET['bc'];
	$meta 			=	strtolower($_GET['metatype']);
	$fol = 'plugins';
	if($meta=='theme'){
			$fol ='theme_perfthm';
	}
	$fn 			=	file_get_contents(PROX_Domain.'/plugins/'.$base_class.'/meta.json');
	$pn				=	$base_class;
	parent::setFolPn($fol,$pn);	
	if(!class_exists($base_class)){
	include(PROX_Domain.'/'.$fol.'/'.$base_class.'/init.php');
	}
	include(PROX_Domain.'/'.$fol.'/'.$base_class.'/install.php');
	$param 			= array_merge($this->routing,array("this"=>"PERMISSION","ocon"=> $this->Database));
	$base_class	=	$base_class.'_Installer';
	$this->plug = new $base_class('Backend',$param);
	if($cbtp=='License'){
		$view_title= BCL('px','license').' '.$this->plug->name;
		$this->plug->onLicenseAgreement($result);
		if($result == 'no' ){
			header("location:".PROX_URL_ADMIN.'/plugins/?status=cancel_install'."&package=".$_GET['package']."&space=".$_GET['space']);
		}else{
			header("location:".PROX_URL_ADMIN.'/plugins/install_permission/?bc='.$_GET['bc'].'&metatype='.$_GET['metatype']."&package=".$_GET['package']."&space=".$_GET['space']);
		}
	}else{
		$view_title= BCL('px','permission').' '.$this->plug->name;
	/**
	*	Install plugins
	*/	
	$con =$this->Database;
		$base_class = $this->plug->Base_Class;
		$q = mysqli_query($con,"select * from plugins where base_class='$base_class'");
		$iq =mysqli_num_rows($q);
		
	if($result=='yes' && $iq <1){
		$name 	= $this->plug->Meta->name;
		$ptype 	= $this->plug->Meta->type;
		$version= $this->plug->Meta->version;
		$dt 	= date('Y-m-d-H-i-s');		
		$md 	= new MD5Crypt();
		$sign 	= $md->encrypt($dt,$_SERVER["SERVER_NAME"]);
		  mysqli_query($con,"insert into plugins (name,p_type,base_class,version,signature) values ('$name','$ptype','$base_class','$version','$sign')");
		  $per 	= $this->plug->Meta->permission;
		   for($i=0;$i<count($per);$i++){
			   $permi = $per[$i];
			   mysqli_query($this->Database,"insert into permission (plugins,permission,val) values ('$base_class','$permi','true')");
		   }
		$fn 	= PROX_Domain.'/'.$fol.'/'.$base_class.'/temp/trial.key';
		$tk 	= $md->encrypt($sign,$_SERVER["SERVER_NAME"]);
		file_put_contents($fn,$tk);	
	}	
		
	$this->plug->onPermissionAgreement($result);
	if($result == 'no' && $cbtp=='Permission'){
		header("location:".PROX_URL_ADMIN.'/plugins/?status=cancel_install'."&package=".$_GET['package']."&space=".$_GET['space']);
	}else{
		header("location:".PROX_URL_ADMIN.'/plugins/install_activation/?bc='.$_GET['bc'].'&metatype='.$_GET['metatype']."&package=".$_GET['package']."&space=".$_GET['space']);
	}
	}
}
function uninstall($bc,$fol)
{
	$base_class		=	$_GET['bc'];
	$meta 			=	strtolower($_GET['metatype']);
	$fol = 'plugins';
	if($meta=='theme'){
			$fol ='theme_perfthm';
	}
	$fn 			=	file_get_contents(PROX_Domain.'/plugins/'.$base_class.'/meta.json');
	$pn				=	$base_class;
	parent::setFolPn($fol,$pn);
	if(!class_exists($base_class)){
	include(PROX_Domain.'/'.$fol.'/'.$base_class.'/init.php');
	}
	
	$fin = PROX_Domain.'/'.$fol.'/'.$base_class.'/install.php';
	if(is_file($fin)){
	include($fin);
	
	$param 			= array_merge($this->routing,array("this"=>"PERMISSION","ocon"=> $this->Database));
	$base_class_i	=	$base_class.'_Installer';
	$this->plug = new $base_class_i('Uninstall',$param);
	}
	if(is_callable(array($this->plug,onUninstall))){
	$this->plug->onUninstall();	
	}
	
	$con 	= Xcon(PERMISSION);
	mysqli_query($con,"delete from plugins_hook where base_class='$base_class'");
	mysqli_query($con,"delete from plugins where base_class='$base_class'");
	mysqli_query($con,"delete from permission where plugins='$base_class'");
	mysqli_query($con,"delete from setting where plugins='$base_class'");
    foreach(glob(PROX_Domain."/".$fol."/{$bc}/*") as $file)
    {
        if(is_dir($file)) { 
            $this->removeappdir($file,$fol);
        } else {
            unlink($file);
        }
    }
    rmdir(PROX_Domain."/".$fol."/".$bc);
	header("location:".PROX_URL_ADMIN.'/plugins/?status=uninstall');
}
function removeappdir($bc,$fol){
	 foreach(glob(PROX_Domain."/".$fol."/{$bc}/*") as $file)
    {
        if(is_dir($file)) { 
            $this->removeappdir($file,$fol);
        } else {
            unlink($file);
        }
    }
	rmdir($bc);
}
function activation(){
	$site	 		= new Site();
	$user			= new User();
	$plugins_arg 	= 'Plugins_Install_Activation';$PXargs='Plugins_Install_Activation';
	$base_class		=	$_GET['bc'];
	$meta 			=	strtolower($_GET['metatype']);
	$fol = 'plugins';
	if($meta=='theme'){
			$fol ='theme_perfthm';
	}
	$fn 			=	file_get_contents(PROX_Domain.'/plugins/'.$base_class.'/meta.json');
	$pn				=	$base_class;
	parent::setFolPn($fol,$pn);
	if(!class_exists($base_class)){
	include(PROX_Domain.'/'.$fol.'/'.$base_class.'/init.php');
	}
	include(PROX_Domain.'/'.$fol.'/'.$base_class.'/install.php');
	
	$param 			= array_merge($this->routing,array("this"=>"PERMISSION"));
	$base_class	=	$base_class.'_Installer';
	$this->plug = new $base_class('Backend',$param);
	$view_title= BCL('px','activation').' '.$this->plug->name;
	include(PROX_Domain.'/temp/plugins.list.php');
}
	
}//
?>