<?php
/**
@Admin Core Class
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling admin page (backend)
**/
namespace Prox\Engine\Admin;
use MD5Crypt;
use Prox\System\Permission;
use Prox\Engine\User;
class Core{
	function __construct($bc){
		$this->permission 	= new Permission($bc);
	}
/**
Authentification admin login,
call from ajax
result JSON
**/
function auth(){	
  header("Content-Type: application/json;charset=utf-8");
  $email 		= $_POST['email'];
  $password 	= $_POST['password'];  
  $cr			= new MD5Crypt();
  $con 			= Xcon(PERMISSION);
  $q = mysqli_query($con,"select * from users where email='$email'");
  if($q){
	  while($g = mysqli_fetch_array($q)){
		  $pas = $cr->decrypt($g['password'],'PROX'); //descrypt hash password
		  if($pas == $password){ //password match	
			  http_response_code(200);
			  $data = array('code'=>200, 'message'=>'Login success');
			  $_SESSION['user'] =$g['id'];
			  if($g['admin'] > 0){
				  $_SESSION['admin'] = $g['admin'];
			  }
			  
		  }else{
			  http_response_code(401);
			  $data = array('code'=>401, 'message'=>'password missmatch');
		  } 
	  }
  }else{
	    http_response_code(404);
		$data = array('code'=>404, 'message'=>'User not found');
  }
  echo json_encode($data);
}
/**
Get All Admin
@return: Array User;
@param int $adl : Admin Level
*/
function getAllAdmin($adl='all'){
	$this->permission->validate('ADMINISTRATOR', '', 28); //required permission
	$con 	= Xcon(PERMISSION);$data=array();
	$i 		=	0;
	$whr = "where admin > 0";
	if($adl =='ADMIN SUPER'){
		$whr = "where admin > 1";	
	}
	else if($adl !='all'){
	$whr = "where admin = '$adl'";	
	}
	$q 		= mysqli_query($con,"select * from users $whr");
	while($g=mysqli_fetch_array($q)){
		$data[$i++]	=	new User($g['id']);
	}
	return $data;
}
	
}

?>