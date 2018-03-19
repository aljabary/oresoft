<?php
/**
@Setting Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling Setting plugins 
**/
namespace Prox\Plugins;
class Setting {
	protected $Plugin_Handler;
	protected $bc;
	public function __construct($ph, $bc){
		
		$this->Plugin_Handler = $ph;
		$this->bc = $bc;
		//$this->Plugin_Handler->Base_Class.'/';
	}	
	public function setVal($xclass, $param, $val){
		$db = Xcon();
		$bc = $this->Plugin_Handler->Base_Class;
		$q 	=	mysqli_query($db,"select * from setting where plugins='$bc' and xclass='$xclass' and param='$param'");
		if(mysqli_num_rows($q)>0){
		$qq =mysqli_query($db,"update setting set val ='$val' where plugins='$bc' and xclass='$xclass' and param='$param'");	
		}else{
		$qq =mysqli_query($db,"insert into setting (plugins,xclass,param,val) values ('$bc','$xclass','$param','$val')");		
		}
		return $qq;
	}
	public function getVal($xclass, $param){
		$db = Xcon();
		$bc = $this->Plugin_Handler->Base_Class;
		$q 	=	mysqli_query($db,"select * from setting where plugins='$bc' and xclass='$xclass' and param='$param'");
		while($g=mysqli_fetch_array($q)){
			$data = $g['val'];
		}
		return $data;
	}
}

?>