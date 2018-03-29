<?php
/**
@Notification  Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling Notification processing data, insert, update, delete
**/
namespace Prox\Engine;
use Prox\Engine\Notification\Core;
use Prox\System\Permission;
class Notification extends Core{
	private $permission;
	private $BC;
	/**
	initialize permission for plugins
	*/
function __construct(/*Plugins Base_Class*/ $bc,$id=0){
	parent::__construct($bc,$id);
	$this->BC = $bc;	
	$this->permission 	= new Permission($bc);
}	
/**
* Create new instance a Notification
* @param Array data
* @param User user 
* @param User $touser : receiver this notification 
* return int $lid : Id Notification
*/
function Create($data,  $user,$touser){
	$this->permission->validate('NOTIFICATION', 'WRITE', 26); //required permission
	$con 		=	 Xcon(PERMISSION);
	//print_r($data);
	$title 		=	addslashes($data['title']);
	$content	=	addslashes($data['content']);
	$url		=	addslashes($data['urlresult']);
	$icon		=	addslashes($data['icon']);
	$today 		= 	date('Y-m-d H:i:s');
	$lid		=	0;
	mysqli_query($con,"insert into Notification (fromuser,user_id,title,content,urlresult,status,dt,icon) values 
	('$user->id','$touser->id','$title','$content','$url','1','$today','$icon')");
	$lid 	= mysqli_insert_id($con);	
	return $lid;
}
/**
* Update Method
* @param Article 	$article
* @param User 		$user 
* @param bool 		$byother : enable other user update this article
*/
function Update($article, $user, $byother = false){
	$this->permission->validate('ARTICLE', 'WRITE', 7); //required permission
	$this->permission->validate('CATEGORY', 'READ', 3); //required permission
	$con		=	Xcon(PERMISSION);
	if($article->User->id == $user->id || $byother){	//must be enable by other or owner of article is same with the user
	$photo = $article->Photo->id;
	$q = mysqli_query($con,"update article set title ='$article->title', content='$article->content',
	headline='$article->headline', keyword='$article->keyword', photo='$photo', user='$user->id',
	status='$article->status'
	where id='$article->id'");
	/**
	* replace category and tags article
	*/
	$cc = count($article->Category);
	$lid = $article->id;
	$cat= $article->Category;
	mysqli_query($con,"delete from category_article where article='$lid'");
		for($i=0;$i<$cc;$i++){
			$cid = $cat[$i];
			if($cid->id > 0){
				
			mysqli_query($con,"insert into category_article (category,article) values ('$cid->id','$lid')");
			}
		}
		$tc = count($article->tags);
		$tg = $article->tags;
		mysqli_query($con,"delete from tags where article='$lid'");	
		for($it=0;$it<$tc;$it++){
			$tid = $tg[$it];
			if(!empty($tid)){
			mysqli_query($con,"insert into tags (name,article) values ('$tid','$lid')");
			}
		}
	return $q;
	}else{
		return false;
	}
}
/**
* remove Method
* @param Notification 	$notif
* @param User 		$user 
*/
function Remove($notif, $user){
	$this->permission->validate('NOTIFICATION', 'WRITE', 7); //required permission
	$con		=Xcon(PERMISSION);
	if($notif->User->id == $user->id ){	
	$q = mysqli_query($con,"delete from notification where notification_id='$notif->id'");
	
	return $q;
	}else{
		return false;
	}
}
/**
* get list Notification by type
* @param string $status :  1 or 2
* @param User $user 	: for User own notif
* @param int $st 	: index page
* @param int $nd 	: number article count perpage
*/	
function getList($status,$user=null, $st, $nd){
	$this->permission->validate('NOTIFICATION', 'READ', 23); //required permission
	$status = addslashes($status);
	$db 	= Xcon(PERMISSION);
	$this->Obj 	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	$whr='';
	if($status !='all'){
		
		$stat = " where status='$status'";
	}
	if($user !=null){
		$quser = " where user_id='$user->id'";
		if($stat){
			$quser = " and user_id='$user->id'";
		}
	}
	$q = mysqli_query($db,"select * from notification $stat  $quser order by notification_id desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		$this->gen($g);
	}	
	return $this->Obj;
}
/**
* Set status notification read or unread
* @param Notification $notif
* @param int $status
*/
function setStatus($notif, $status){
	$this->permission->validate('NOTIFICATION', 'WRITE', 23); //required permission
	mysqli_query(Xcon(PERMISSION),"update notification set status='$status' where notification_id='$notif->id'");	
}


/**
*	get list article by date range
*	@param string $range 	: date format start range ex : 2017-02-12 (YYYY-mm-dd)
*	@param string $to 		: date format end range
*	@param string $status 	: status article | Optional
*/
function getListByDate($range,$to, $status='on'){
	$this->permission->validate('ARTICLE', 'READ', 13); //required permission
	$db 	=	Xcon(PERMISSION);
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