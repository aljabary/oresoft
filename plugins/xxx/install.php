<?php
/**
User Management Installer v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
class User_Management_Installer extends Manager_Plug_handler{
public $termUrl;
public $privacyUrl;
public $intall = true;
public function __construct($arg,$param){
	$this->arguments = $arg;
	/**
	* initialize (required)
	*/
//	print_r($param);
	parent::__construct($this,$param);
	$this->Manager = $this->PManager;
	$this->termUrl = 'http://oreple.com';
	$this->privacyUrl = 'http://oreple.com';
}
public function main($arg,$param,$hook){
	
}
/**
* Event when license Agreement result
* @param string $agree :yes/no
*/
function onLicenseAgreement($agree){
	//echo $agree;
}
/**
* Event when permission Agreement result
* @param string $agree :yes/no
*/
function onPermissionAgreement($agree){
	if($agree=='yes'){
	$this->addHook('user_list','backend_12');
	$this->addHook('user_add','backend_12');
	}
}
/** 
* Event when activation
* @param bool $agree :true/false
*/
function onActivation($status){
$this->InstallPack();
return true;
}
}
?>