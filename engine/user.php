<?php
/**
@User Core Class
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling user processing data, insert, update, delete
**/
class User_Core{
	private $permission;
	/**
	initialize permission for plugins
	*/
function __construct(/*Plugins Base_Class*/ $bc){	
		$this->permission 	= new Permission($bc);
		}	
/**
* Create new instance an User
* @param Array data : [name(string),email(string),password(string),repassword(string),photo(string),role(int), bio(string)]
* @param User user 
* return int $lid : Id User
*/
function Create($data,  $user){
	$this->permission->validate('USER', 'WRITE', 24); //required permission
	$con 		=	 Xcon();	
	$name 		=	addslashes($data['name']);
	$email		=	addslashes($data['email']);
	$today 		= 	date('Y-m-d H:i:s');
	$pass		=	addslashes($data['password']);
	$repass		=	addslashes($data['repassword']);
	$role		=	addslashes($data['role']);
	$bio		=	addslashes($data['bio']);
	$photo		=	addslashes($data['photo']);
	if($pass 	!= $repass){
		$ar = array("respons"=>0);
	}else{
	$cr			= 	new MD5Crypt();
	$epass 		=	$cr->encrypt($pass,'PROX');
	$q 			= 	mysqli_query($con,"select * from users where email ='$email'");
	$qid 		= 	mysqli_num_rows($q);
	if($qid){
		$ar = array("response"=>1);
	}else{
		$lid		=	0;
		mysqli_query($con,"insert into users (name,email,admin,photo,dt,password) values ('$name','$email','$role','$photo','$today','$epass')");
		$lid 		= mysqli_insert_id($con);	
		$ar = array("response"=>2,"lid"=>$lid);
	}
	}
	return $ar;
}

/**
* Create new instance an User un authorize, user is not admin
* @param Array data
* return int $lid : Id User
*/
function CreateUnAuthorize($data){
	$this->permission->validate('USER', 'WRITE', 24); //required permission
	$con 		=	 Xcon();
	$email 		=	addslashes($data['email']);
	$name		=	addslashes($data['name']);
	$today 		= 	date('Y-m-d H:i:s');
	$photo		=	addslashes($data['photo']);
	$lid		=	0;
	$user 		=	new User();
	$user->getByEmail($email);
	if($user->id > 0){
		$lid = $user->id;
	}else{
	mysqli_query($con,"insert into users (name,email,admin,photo,dt) values ('$name','$email','0','$photo','$today')");
	$lid 	= mysqli_insert_id($con);
	}	
	return $lid;
}
/**
* Update Method
* @param User 		$user_data : User who will updated 
* @param User 		$user 
* @param bool 		$byother : enable other user update this article
*/
function Update($user_data, $user, $byother = false){
	$this->permission->validate('USER', 'WRITE', 7); //required permission
	$con		=	Xcon();
	if($user_data->id == $user->id || $byother){	//must be enable by other or owner of article is same with the user
	mysqli_query($con,"update users set 
	name='$user_data->name',email=$user_data->email',
	admin='$user_data->isadmin',photo='$user_data->photo' where id='$user_data->id'	");
	}
}
/**
* remove Method
* @param Article 	$article
* @param User 		$user 
* @param bool 		$byother : enable other user update this article
*/
function Remove($article, $user, $byother = false){
	$this->permission->validate('ARTICLE', 'WRITE', 7); //required permission
	$con		=Xcon();
	if($article->User->id == $user->id || $byother){	//must be enable by other or owner of article is same with the user
	$q = mysqli_query($con,"delete from article where id='$article->id'");
	/**
	* delete from category and tags article
	*/
	mysqli_query($con,"delete from category_article where  article='$article->id'");	
	mysqli_query($con,"delete from tags where  article='$article->id'");	
	return $q;
	}else{
		return false;
	}
}
/**
* get list article by type
* @param string $status : on or off or all status srticle
* @param int $st 	: index page
* @param int $nd 	: number article count perpage
*/	
function getList($status, $st, $nd){
	$this->permission->validate('ARTICLE', 'READ', 13); //required permission
	$status = addslashes($status);
	$db 	= Xcon();
	$data 	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	if($status !='all'){
		$stat = " where status='$status'";
	}
	$q = mysqli_query($db,"select * from article $stat order by id desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		$article = new Article($g['id']);		
		$data[$i] = $article;
		$i++;
	}	
	return $data;
}

/**
* Method searchTags
* use this method for searching article or tags
* @param 	string 	$tags 	: ex = '%tag name%'
* @param 	string 	$opt 	: option search 'like' or '='
* @return 	array 	$data 	: [string $name (tagname), int $article (article ID)]
*/
function searchTags($tag, $opt= 'like'){
	$this->permission->validate('ARTICLE', 'READ', 8); //required permission
	$db 	= Xcon();
	$data = array(); $i=0;
	$q = mysqli_query($db,"select * from tags where name $opt '$tag' group by name order by name desc");
	while($g = mysqli_fetch_array($q)){
		$data[$i] = array("name"=>$g['name'],"article"=>$g['article']);
		$i++;
	}
	return $data;
}

/**
* get list article by type
* @param string $status : on or off or all status srticle
* @param int $st 	: index page
* @param int $nd 	: number article count perpage
*/	
function getListByTag($tag,$st,$nd){
	$this->permission->validate('ARTICLE', 'READ', 8); //required permission
	$db 	=Xcon();
	$data = array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	$q = mysqli_query($db,"select * from tags where name ='$tag'  order by article desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		$data[$i] = new Article($g['article']);
		$i++;
	}
	return $data;
}
/**
*	Update article viewer 
*	this methode is not Open 
* 	@param Article $article
*	@param string $key	: user prefix secret
*/
function View($article,$key){
	if($key ==PERMISSION){ //locked method
	$db 	= Xcon();
	$view 	= $article->view + 1;
	$q 		= mysqli_query($db,"update article set view ='$view' where id='$article->id'");
	return $q;
	}
}
/**
*	get list article by date range
*	@param string $range 	: date format start range ex : 2017-02-12 (YYYY-mm-dd)
*	@param string $to 		: date format end range
*	@param string $status 	: status article | Optional
*/
function getListByDate($range,$to, $status='on'){
	$this->permission->validate('ARTICLE', 'READ', 13); //required permission
	$db 	=	Xcon();
	$status = addslashes($status);
	$data 	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	if($status !='all'){
		$stat = " and status='$status'";
	}
	$q = mysqli_query($db,"select * from article where dt >'$range' and dt < '$to' $stat order by id desc");
	while($g = mysqli_fetch_array($q)){
		$article = new Article($g['id']);		
		$data[$i] = $article;
		$i++;
	}	
	return $data;
	
}
}//
?>