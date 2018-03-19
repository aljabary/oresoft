<?php
/**
@Site Class
@Proxtrasoft v.2.1.1
@license: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author: Abu Zidane Asadudin Shakir Al-Jabary
this class is represent of site data and contain informastion website data
**/
namespace Prox\Engine;
use Prox\System\Date_Time;
class User{
	public $name;
	public $id;
	public $photo;
	public $email; 
	static $con;
	public $password;
	public $date;
	/**
	Admin status:
	0 = user is not admin
	1 = user is admin as editor
	2 = user is admin as administrator
	3 = user is admin as master can add or remove new member, plugins access, theme changing, etc 	
	**/
	public $isadmin;
	/** Constructor 
	@param User id if this object contain other user data,
	if this object contain user data have login, this object param with session
	**/
function __construct($uid=0){
	if($uid > 0){
		$id = $uid;
	}else{
		$id = $_SESSION['user'];
	}
	$this->password = false;   
	$this->con = Xcon(PERMISSION);
	$sql = mysqli_query($this->con,"SELECT * FROM users where id='$id'");
    while($row = mysqli_fetch_array($sql)) {
       $this->name 		= $row['name'];
	   $this->email 	= $row['email'];
	   $this->photo 	= $row['photo'];
	   $this->id 		= $row['id'];
	   $this->isadmin 	= $row['admin'];
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
	   if($row['password']){
		$this->password = true;   
	   }
    }
}

function getByEmail($email){
	$this->con = Xcon(PERMISSION);
	$sql = mysqli_query($this->con,"SELECT * FROM users where email='$email'");
    while($row = mysqli_fetch_array($sql)) {
       $this->name 		= $row['name'];
	   $this->email 	= $row['email'];
	   $this->photo 	= $row['photo'];
	   $this->id 		= $row['id'];
	   $this->isadmin 	= $row['admin'];
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
	    if($row['password']){
		$this->password = true;   
	   }
    }
}
function getdata($id){
		$this->name 		= "";
	   $this->email 	=  "";
	   $this->photo 	=  "";
	   $this->id 		=  0;
	   $this->isadmin 	=  "";
	   $this->password = false; 
		$this->date 		= ""; 
	$sql = mysqli_query($this->con,"SELECT * FROM users where id='$id'");
    while($row = mysqli_fetch_array($sql)) {
       $this->name 		= $row['name'];
	   $this->email 	= $row['email'];
	   $this->photo 	= $row['photo'];
	   $this->id 		= $row['id'];
	   $this->isadmin 	= $row['admin'];
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
	    if($row['password']){
		$this->password = true;   
	   }
    }
}
/**
Update Method,
user data will be update into database, 
**/
function update(){
	$sql = mysqli_query(Xcon(PERMISSION),"update users where set name='$this->name',photo='$this->photo',email='$this->email'  id='$this->id'");
}	
}
?>
