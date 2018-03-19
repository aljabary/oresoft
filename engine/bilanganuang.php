<?php
class Bilangan_Uang{
function value($val){
	$str	=	strlen($val);
	switch($str){

	case 1: $uang= $val;
	break;
	case 2: $uang= $val;
	break;
	case 3: $uang= $val;
	break;
	case 4: $uang= $this->ribuan($val);;
	break;
	case 5: $uang= $this->ribuan($val);;
	break;
	case 6: $uang= $this->ribuan($val);;
	break;
	case 7: $uang= $this->jutaan($val);  
	break;	
	case 8: $uang= $this->jutaan($val);  
	break;
	case 9: $uang= $this->jutaan($val);  
	break;	
	}	
return $uang;	
}
function dicount($val, $percent){
		if($percent < 101){
		return $val*($percent/100);
		}
	}
function jutaan($val){
	$str	=	strlen($val);
	switch($str){
	case 7: $akhir=substr($val, 1,$str); $awal= substr($val, 0,1).'.'; 
	break;	
	case 8:	$akhir=substr($val, 2,$str);   $awal= substr($val, 0,2).'.'; 
	break;
	case 9:	$akhir=substr($val, 3,$str);   $awal= substr($val, 0,3).'.'; 
	break;
	}
	$ops	=	substr($val,0,1).'.'; //jutaan
	$opsi 	=	substr($akhir,0,3).'.';  
	$ops2	=	substr($akhir,3,$str); 
	$jutaan	=	$awal.$opsi.$ops2;
	return $jutaan;	
}
function ribuan($val){
	$str	=	strlen($val);
	switch($str){
	case 4: $akhir=substr($val, 1,$str); $awal= substr($val, 0,1).'.'; 
	break;	
	case 5:	$akhir=substr($val, 2,$str);   $awal= substr($val, 0,2).'.'; 
	break;
	case 6:	$akhir=substr($val, 3,$str);   $awal= substr($val, 0,3).'.'; 
	break;
	}
	
	$opsi 	=	substr($akhir,0,3);
	$jutaan	=	$awal.$opsi;
	return $jutaan;	
}
	
	
	
}