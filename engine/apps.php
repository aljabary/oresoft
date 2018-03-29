<?php
/**
@Plugins Manager Class
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class load, handling plugins and routing
**/
namespace Prox\Plugins;
use Prox\User;
use Prox\System\Site;
use Prox\System\DB;
class Apps extends Core{
	
function showPluginsList(){
	$site 	= new Site();
	$user	= new User();
	$plugins_arg = 'Plugins';$PXargs='Plugins';
	$view_title= BCL('px','apps');
	include(PROX_Domain.'/temp/plugins.list.php');
}
function setStatus(){
		$pid 	= $_GET['plugins'];
		$stat 	= $_GET['status'];
		$db 	= Xcon(PERMISSION);
		$q = mysqli_query($db,"select * from plugins where id ='$pid'");
		while($g = mysqli_fetch_array($q)){
			$pn = str_replace(' ','-',$g['base_class']);
			$pn = $pn;
			$fol = 'plugins';	
			if($g['p_type']=='theme'){
				$fol ='theme_perfthm';
			}
			parent::setFolPn($fol,$pn);
			$file = PROX_Domain.'/'.$fol.'/'.$g['base_class'].'/init.php';
			if(is_file($file) && !class_exists('\\'.$g['base_class'].'\MainClass')){include(PROX_Domain.'/'.$fol.'/'.$g['base_class'].'/init.php');
			}
		$param 			= array("this"=>"PERMISSION");
		$pn = '\\'.$pn.'\MainClass';
		$plug 			= new $pn(null,$param);
		}
		$mv = $plug->View->getKeystore();
		if($mv->price > 0 && $plug->isLicensed()){
			if($fol	!='theme_perfthm'){
			mysqli_query($db,"update plugins set status='$stat' where id ='$pid'");
			}else if($stat > 0){
				mysqli_query($db,"update plugins set status='$stat' where id ='$pid'");
					mysqli_query($db,"update site set theme='$pn'");
			}
		}
		if($mv->price ==0){
			if($fol!='theme_perfthm'){
		mysqli_query($db,"update plugins set status='$stat' where id ='$pid'");
			}else if($stat > 0){
				
				mysqli_query($db,"update plugins set status='$stat' where id ='$pid'");
				mysqli_query($db,"update site set theme='$pn'");
			}
		}
}
/**
* get hook registered of plugins
* @param string $bc : Base_Class name
*/
function getHook($bc){
		$db 	= new DB(PERMISSION);
		$data 	=	array(); $i=0;
		$q  = mysqli_query($db->connect(),"select * from plugins_hook where base_class='$bc'");
		while($g = mysqli_fetch_array($q)){
			$data[$i]	=	$g;$i++;
		}
		return $data;
}
function saveHook($bc){
		$db 	= new DB(PERMISSION);
		$hk = $this->getHook($bc);
	foreach($hk as $k =>$v){
		//echo $k.'----'.$v[2].'<br>';
		$temp 	= $v[2];
		$hookp 	= 'hook_'.$k.'_'.$v[2];
		$hook 	= $_POST[$hookp];//echo 'hook_'.$hook.'<br>';
		$ixp 	= 'ix_'.$k.'_'.$v[2];
		$ix 	= $_POST[$ixp];
		mysqli_query($db->connect(),"update plugins_hook set hook='$hook', ix='$ix' where base_class='$bc' and template='$temp'");
		}
		header("location:".PROX_URL_ADMIN."/plugins/setting/".$bc."?suc=oke");
}
	
function cekupdate(){
		$data = array("isready"=>false,'version'=>'2.34.11');
		header("Content-Type: application/json;charset=utf-8");
		echo json_encode($data);
}
	
function installx(){
	$zip = new ZipArchive;
	$res = $zip->open(PROX_Domain.'/plugins/liteMessage/litemessage.zip');
	//print_r($zip);
	$zip = zip_open(PROX_Domain.'/plugins/liteMessage/litemessage.zip');
 while ($zip_entry = zip_read($zip)) {
        echo "Name:               " . zip_entry_name($zip_entry) . "\n";
       // echo "Actual Filesize:    " . zip_entry_filesize($zip_entry) . "\n";
        //echo "Compressed Size:    " . zip_entry_compressedsize($zip_entry) . "\n";
        //echo "Compression Method: " . zip_entry_compressionmethod($zip_entry) . "\n";

        if (zip_entry_open($zip, $zip_entry, "r")) {
            echo "File Contents:\n";
            $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
            echo "$buf\n";

            zip_entry_close($zip_entry);
        }
        echo "\n";

    }

}
function perName($per){
	$per = strtoupper($per);
	$data = BCL('px','pername_'.$per);
	return $data;
}

function cekApps($app){
	$apps = explode(' ',$app);
	$bc= $apps[0];
	$v= $apps[1];
	$v = str_replace('v.','',$v);
	 $db 	=	new DB(PERMISSION);
	 $sbc 	='';
		$q	= mysqli_query($db->connect(),"select * from plugins where base_class = '$bc'");
		while($g = mysqli_fetch_array($q)){
			$tp = $g['p_type'];$fol ='plugins';
			$sbc 	=	$g['base_class'];
			if($tp =='theme'){
				$fol 	='theme_perfthm';				
			}
			$fn 	=	PROX_Domain.'/'.$fol.'/'.$bc.'/meta.json';
		if($v != "" ){
			 $meta 		=	file_get_contents($fn);
			 $meta		=	json_decode($meta);
			 if($meta->version >=$v){
				 $res = BCL('px','apps_need_ok');$av=true;
			 }else{
				   $res = BCL('px','ex_need').' '.$bc.' ('.$name.') minimum version '.$v.' current version '.$meta->version;
				   $av=false;
			 }
		}else{
		 $res = BCL('px','apps_need_ok');$av=true;
		}
		}
		if($sbc ==''){
			    $res = BCL('px','ex_need').' '.$bc.' ('.$name.')';$av=false;
		}
		
		return array('msg'=>$res,'avaliable'=>$av);
}
function do_activated(){
	$cb 		= 	$_POST['base_class'];
	$metatype	=	$_POST['metatype'];
	$act		=	$_POST['act'];
	$key		=	$_POST['keyp'];
	$db 		= 	Xcon(PERMISSION);
	
		mysqli_query($db,"update plugins set key_product='$key' where base_class='$cb'");
		$q 			= mysqli_query($db,"select * from plugins where base_class ='$cb'");
		while($g = mysqli_fetch_array($q)){
			$pn = str_replace(' ','-',$g['base_class']);
			$pn = $pn;
			$fol = 'plugins';
			if($g['p_type']=='theme'){
				$fol ='theme_perfthm';
			}
			parent::setFolPn($fol,$pn);
			$file = PROX_Domain.'/'.$fol.'/'.$g['base_class'].'/init.php';
			if(is_file($file) && !class_exists($g['base_class'])){include(PROX_Domain.'/'.$fol.'/'.$g['base_class'].'/init.php');
			}
	include(PROX_Domain.'/'.$fol.'/'.$g['base_class'].'/install.php');
		$param 			= array("this"=>"PERMISSION");
		$installer 		=	$pn.'_Installer';
		$install 			= new $installer(null,$param);
		$plug 			= new $pn(null,$param);
	
		}
		if($act>0 && $plug->isLicensed()){
			//valid
			mysqli_query($db,"update plugins set status='1' where base_class='$cb'");
			$res = $install->onActivation(true);
			if(!$res){
				header("location:".PROX_URL_ADMIN."/plugins/?bc=".$cb."&metatype=".$metatype."&status=success_install"."&package=".$_GET['package']."&space=".$_GET['space']);
			}else if($_GET['space']){
				$prime_bc 	= $_GET['space'];
				$pplug 		= new $prime_bc(null,$param);
				$pplug->InstallPack();
		}
		}else if($act>0 && !$plug->isLicensed()){
			//not valid
			$res = $install->onActivation(true);
			
			if(!$res){
				header("location:".PROX_URL_ADMIN."/plugins/install_activation/?bc=".$cb."&metatype=".$metatype."&result=error"."&package=".$_GET['package']."&space=".$_GET['space']);
			}
		}
	else if($act==0 ){
		/**Free Activation**/
		mysqli_query($db,"update plugins set status='1' where base_class='$cb'");
		$res = $install->onActivation(true);
		
		if(!$res){
		header("location:".PROX_URL_ADMIN."/plugins/?bc=".$cb."&metatype=".$metatype."&status=success_install&atp=free&"."&package=".$_GET['package']."&space=".$_GET['space']);
		}else if($_GET['space'] ){
				$prime_bc 	= $_GET['space'];
				$pplug 		= new $prime_bc(null,$param);
				$pplug->InstallPack();
		}
	}	
}

function uploadpackage(){
	if ($_FILES)
  {
   foreach ($_FILES as $key => $value)
   {
		$ok =false;
	   $path 	= PROX_Domain.'/plugins/uptemp/';	
	   $fni 	= time().substr(str_replace(" ", "_", date('Y-m-d')), 5).str_replace(" ", "-",$value['name']);
		$xt 	= ".".pathinfo($fn, PATHINFO_EXTENSION);
		
		$newfile= $path."/" . $fni;
			if (move_uploaded_file($value["tmp_name"], $newfile))
			{
				$upfile	=	PROX_URL.'media_pref/'.str_replace(' ','-',$fn);				
				$today 	= date('Y-m-d H:i:s'); 
				
	$zip = zip_open($newfile);
	while ($zip_entry = zip_read($zip)) {
      $meta = strtolower(zip_entry_name($zip_entry));
		if($meta =='meta.json'){
			if (zip_entry_open($zip, $zip_entry, "r")) {
			$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			$json = json_decode($buf);
			$zipa = new ZipArchive;
		if ($zipa->open($newfile) === TRUE) {
			$fol = 'plugins';	
			$ptype = strtolower($json->type);
			if($ptype	==	'theme'){
				$fol 	=	'theme_perfthm';
			}
		$zipa->extractTo(PROX_Domain.'/'.$fol.'/'.$json->base_class);
		$zipa->close();
		}
          zip_entry_close($zip_entry);
		  $this->removeappdir($json->base_class,$fol);
		   //rmdir(PROX_Domain."/".$fol."/uptemp/".$json->base_class);
		   header("location:".PROX_URL_ADMIN."/plugins/install_license/?bc=".$json->base_class."&metatype=".$json->type);
        }
        
	}
 }
	}
		
   }
  }

}

function removeappdir($bc,$fol){
	 foreach(glob(PROX_Domain."/".$fol."/uptemp/*") as $file)
    {
        if(is_dir($file)) { 
            $this->removeappdir($file,$fol);
        } else {
            unlink($file);
        }
    }	
}
function removeappdirPack($bc,$fol,$pack){
	 foreach(glob(PROX_Domain."/".$fol."/".$bc."/package/*") as $file)
    {
		if($file==$pack){
            unlink($file);
        }
    }	
}
/**
* Auto Install Package
* @param string $pack : URI Package   
*/
function InstallPack($pack,$space,$p_i){
	echo $pack;
	$zip = zip_open($pack);
	while ($zip_entry = zip_read($zip)) {
      $meta = strtolower(zip_entry_name($zip_entry));
		if($meta =='meta.json'){
			if (zip_entry_open($zip, $zip_entry, "r")) {
			$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			$json = json_decode($buf);
			$zipa = new ZipArchive;
		if ($zipa->open($pack) === TRUE) {
			$fol = 'plugins';	
			$ptype = strtolower($json->type);
			if($ptype	==	'theme'){
				$fol 	=	'theme_perfthm';
			}
		$zipa->extractTo(PROX_Domain.'/'.$fol.'/'.$json->base_class);
		$zipa->close();
		}
          zip_entry_close($zip_entry);
		  $this->removeappdir($json->base_class,$fol);
		 
		   header("location:".PROX_URL_ADMIN."/plugins/install_license/?bc=".$json->base_class."&metatype=".$json->type."&package=".$p_i."&space=".$space);
        }
        
	}
 }
}	
	}//

?>