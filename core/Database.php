<?php
/**
@Core Database Class
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class is database engine interface for plugins
**/
namespace Prox\Plugins;
class Database{
	private $BC;
	public $log;
function __construct($bc){
		$this->BC = $bc;
}

function connect(){
	global $XCON;
	$per = new Permission($this->BC);
	$per->validate('DATABASE', '', 3);
	return Xcon(PERMISSION);
}
function query($sql){
	if($log){
		XLog($sql);
	}
	$q = mysqli_query($this->connect(),$sql);
	return $q;
}	
}	
?>