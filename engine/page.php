<?php
/**
@Article Core Class
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling article processing data, insert, update, delete
**/
class Page_Core{
	private $permission;
	/**
	initialize permission for plugins
	*/
function __construct(/*Plugins Base_Class*/ $bc){	
		$this->permission 	= new Permission($bc);
		}		
/**
* Create new instance an Page
* @param Array $Page
* @param User $user 
*/
function Create($Page,  $user){
	$this->permission->validate('PAGE', 'WRITE', 15); //required permission
	$this->permission->validate('CATEGORY', 'READ', 3); //required permission
	$con 	= Xcon();
	$name 	=	addslashes($Page['name']);
	$content=	addslashes($Page['content']);
	$today 	= 	date('Y-m-d H:i:s');
	$category=	$Page['category'];
	$desc	=	$Page['description'];
	$keyword	=	$Page['keyword'];
	$status	=	$Page['status'];
	$slug	=	$Page['slug'];
	$type	=	$Page['type'];
	$lid	=	0;
	$q = mysqli_query($con,"select * from page where slug='$slug'");
	$qc = mysqli_num_rows($q);
	if($qc < 1){
	mysqli_query($con,"insert into page (name,content,dt,user,description,keyword,slug,status,type,category) values ('$name','$content','$today','$user->id','$desc','$keyword','$slug','$status','$type','$category')");
	$lid 	= mysqli_insert_id($con);
	/* Insert Page category  and tags*/
	$code = 2;
	}else{
	$code = 1; // slug is already, slug must unique	
	}
	return array("code"=>$code, "id"=>$lid);
}
/**
* Update Method
* @param Page 	$Page
* @param User 		$user 
* @param bool 		$byother : enable other user update this Page
*/
function Update($Page, $user, $byother = false){
	$this->permission->validate('PAGE', 'WRITE', 15); //required permission
	$this->permission->validate('CATEGORY', 'READ', 3); //required permission
	$con		=	Xcon();
	if($Page->User->id == $user->id || $byother){	//must be enable by other or owner of Page is same with the user
	$pid = $Page->parent->id;
	$cat= $Page->Category->id;
	$qc = mysqli_query($con,"select * from page where slug='$Page->slug' and id !='$Page->id'");
	$ii = mysqli_num_rows($qc);
	if($ii < 1){
	$q = mysqli_query($con,"update page set name ='$Page->name', content='$Page->content',
	description='$Page->description', keyword='$Page->keyword',user='$user->id', parent='$pid', category='$cat',
	slug='$Page->slug', type='$Page->type',	status='$Page->status'
	where id='$Page->id'");		
	$code = 2;
	}else{
		$code = 1;
	}
	}else{
		$code =0;
	}
	return array("code"=>$code, 'id'=>$Page->id);
}
/**
* remove Method
* @param Page 		$Page
* @param User 		$user 
* @param bool 		$byother : enable other user update this Page
*/
function Remove($Page, $user, $byother = false){
	$this->permission->validate('PAGE', 'WRITE', 15); //required permission
	$con		=	Xcon();
	if($Page->User->id == $user->id || $byother){	//must be enable by other or owner of Page is same with the user
	$q = mysqli_query($con,"delete from Page where id='$Page->id'");
	return $q;
	}else{
		return false;
	}
}
/**
* get list Page name by type
* @param string $status : on or off or all status srticle
* @param string $parent_id 	: id of parent page
* @param string $st : index page view
* @param int $nd 	: number Page count perpage view
*/	
function getlist($parent_id,$st,$nd, $status='all' ){
	$this->permission->validate('PAGE', 'READ', 16); //required permission
	$db 	= Xcon();
	$data	=	array(); $i=0;	
	switch($parent_id){
		case "all":$prt ="parent !='999999'" ;
		break;
		default:$prt ="parent='".$parent_id."'";
		break;
	}
	if($status !='all'){
		$stat = " and status='$status'";
	}
	$q 		=	mysqli_query($db,"select * from page where $prt order by id desc limit $st,$nd");
	while($g =	mysqli_fetch_array($q)){
		$pg	 	=	new Page($g['id']);
		$data[$i]	=	$pg; $i++;
	}
	return $data;
}
/**
* get child Page 
* @param Page $parent 
*/	
function getChild($parent){
	$this->permission->validate('PAGE', 'READ', 16); //required permission
	$db 	= Xcon();
	$data	=	array(); $i=0;	
	$q 		=	mysqli_query($db,"select * from page where parent='$parent->id' order by id desc");
	while($g =	mysqli_fetch_array($q)){
		$pg	 	=	new Page($g['id']);
		$data[$i]	=	$pg; $i++;
	}
	return $data;
}

/**
*	Update page viewer 
*	this methode is not Open 
* 	@param Page $page
*	@param string $key	: user prefix secret
*/

function View($page,$key){
	if($key ==PERMISSION){ //locked method
	$con		=	Xcon();
	$view = $page->view + 1;
	$q = mysqli_query($con,"update page set view ='$view' where id='$page->id'");
	return $q;
	}
}

}
?>