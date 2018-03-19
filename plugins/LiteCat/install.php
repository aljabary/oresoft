<?php
/**
Lite Message Installer v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
class LiteCat_Installer extends Manager_Plug_handler{
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
	$this->termUrl = 'http://sellupbooster.com';
	$this->privacyUrl = 'http://sellupbooster.com';
}
/**
* @param string $agree :yes/no
*/
function onLicenseAgreement($agree){
	echo $agree;
}
/**
* @param string $agree :yes/no
*/
function onPermissionAgreement($agree){
	if($agree=='yes'){
	//$this->addHook('inbox','backend_12');
	}
}
/**
* @param bool $agree :true/false
*/
function onActivation($status){

}
/*
CREATE TABLE `prox`.`category_article` ( `category` VARCHAR(255) NOT NULL , `article` VARCHAR(255) NOT NULL ) ENGINE = InnoDB;
CREATE TABLE `prox`.`tags` ( `name` VARCHAR(255) NOT NULL , `article` VARCHAR(255) NOT NULL ) ENGINE = InnoDB;
*/
}
?>