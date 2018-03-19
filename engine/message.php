<?php
/**
@Message Core Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling message processing data, insert, update, delete
**/
namespace Prox\Engine\Message;
use Prox\System\Permission;
class Core{
	private $permission;
	/**
	initialize permission for plugins
	*/
function __construct($bc){	
		$this->permission = new Permission($bc);
}
/**
* Create or get Conversation
* @param User user 
* @param Array int $to : User id | string all to all admin
*/	
function createConversation($user,$to,$email=''){
	$con 	= 	Xcon(PERMISSION);
	$myConv	=	array();
	$uid = $user->id;
	if($user->id<1 ){
		$uid = $email;
	}
	//get admin list, this to all admin
	if(strtolower($to[0]) =='all'){
		$ac = new Admin_Core();
		$admin = $ac->getAllAdmin();
		foreach($admin as $key=>$val){
			$to[$key]	=	$val->id;
		}
	}
	//print_r($to);
	/*
	Get list messenger id of user
	*/
	$i 		=	0;
	$q		=	mysqli_query($con,"select * from messenger_group where user='$uid'");
	while($g= mysqli_fetch_array($q)){
		$myConv[$i++] = $g['messenger_id'];
	}
	$ms_id	=	array();
	//get member group foreach messnger id
	for($ix=0;$ix<count($myConv);$ix++){
		$mid 		= 	$myConv[$ix];
		for($ix1=0;$ix1<count($to);$ix1++){
			$member 	=	$to[0];
			//default ms_id =0, if one of $to array there is null
			//so ms_id = -1, it will ignore all
			$ms_id[$ix]	=	0;
			$q1			=	mysqli_query($con,"select * from messenger_group where messenger_id='$mid' and user='$member'");
			if(mysqli_num_rows($q1) > 0){
				if($ms_id[$ix]>=0)$ms_id[$ix] =	$mid;
			}else{
				$ms_id[$ix] =	-1;
			}
		}
	}
	$messenger = 0;
	//filter ms_id, ignore where null
	for($ix2=0;$ix2<count($ms_id);$ix2++){
		if($ms_id[$ix2] > 0){
			$messenger	=	$ms_id[$ix2];
		}
	}
	//if messenger ID not found, create new
	if($messenger <1){
		mysqli_query($con,"insert into messenger (user) values ('$uid')");
		$messenger = mysqli_insert_id($con);
		$to = array_merge($to,array(count($to)=>$uid));
		
		for($ito=0;$ito<count($to);$ito++){
		$to_user = $to[$ito];	
		mysqli_query($con,"insert into messenger_group (messenger_id,user) values ('$messenger','$to_user') ");
		}
	}
	
	return $messenger;
}
/**
* Create new instance a messenger (conversation)
* @param Array message
* @param User user 
* @param String  $conversation 
*/
function Create($message,  $user, $conversation){
	$this->permission->validate('MESSAGE', 'WRITE', 18); //required permission
	$con 	= Xcon(PERMISSION);
	$title 	=	addslashes($message['title']);
	$content=	addslashes($message['content']);
	$email	=	addslashes($message['email']);
	$today 	= 	date('Y-m-d H:i:s');
	$tp	=	addslashes($message['type']);
	$status	=	"on";
	$lid	=	0;
	$member	=	array();
	$uid 	=	$user->id;
	if($user->id<1){
	$uid = $email;	
	}
	/*
	Get list member of messenger_id
	*/
	$q		=	mysqli_query($con,"select * from messenger_group where messenger_id='$conversation'");
	while($g= mysqli_fetch_array($q)){
		$member[$i++] = $g['user'];
	}
	mysqli_query($con,"insert into message (title,content,date,user,tp,status,email,messenger_id) values ('$title','$content','$today','$uid','$tp','$status','$email','$conversation')");
	$lid 	= mysqli_insert_id($con);
	//this will give member of conversation a notification
	foreach($member as $key=>$val){
		if($val !=$uid){
	mysqli_query($con,"update messenger_user set status='0' where messenger='$conversation' and user='$val'");
	mysqli_query($con,"insert into messenger_user (user,status,messenger,message) values ('$val','1','$conversation','$lid')");
		}
	}	
	return $lid;
}
/**
* Update Method
* @param Article 	$message
* @param User 		$user 
* @param bool 		$byother : enable other user update this message
*/
function Update($message, $user, $byother = false){
	$this->permission->validate('MESSAGE', 'WRITE', 7); //required permission
	$con		=	Xcon(PERMISSION);
	if($message->User->id == $user->id || $byother){	//must be enable by other or owner of message is same with the user
	$photo = $message->Photo->id;
	$q = mysqli_query($con,"update message set title ='$message->title', content='$message->content',
	headline='$message->headline', keyword='$message->keyword', photo='$photo', user='$user->id',
	status='$message->status'
	where id='$message->id'");
	/**
	* replace category and tags message
	*/
	$cc 	= count($message->Category);
	$lid 	= $message->id;
	$cat	= $message->Category;
	mysqli_query($con,"delete from category_message where message='$lid'");
		for($i=0;$i<$cc;$i++){
			$cid = $cat[$i];
			if($cid->id > 0){
				
			mysqli_query($con,"insert into category_message (category,message) values ('$cid->id','$lid')");
			}
		}
		$tc = count($message->tags);
		$tg = $message->tags;
		mysqli_query($con,"delete from tags where message='$lid'");	
		for($it=0;$it<$tc;$it++){
			$tid = $tg[$it];
			if(!empty($tid)){
			mysqli_query($con,"insert into tags (name,message) values ('$tid','$lid')");
			}
		}
	return $q;
	}else{
		return false;
	}
}
/**
* remove Method, this only remove member current user from messenger group
* @param Article 	$message
* @param User 		$user 
* @param bool 		$byother : enable other user update this message
*/
function Remove($message, $user, $byother = false){
	$this->permission->validate('MESSAGE', 'WRITE', 7); //required permission
	$con		=	Xcon(PERMISSION);
	if($message->User->id == $user->id || $byother){	//must be enable by other or owner of message is same with the user
	$q = mysqli_query($con,"delete from messenger_group where messenger_id='$message->messenger' and user='$user->id'");
		
	return $q;
	}else{
		return false;
	}
}
/**
* Update status Method, this will set read on unread message
* @param Article 	$message
* @param User 		$user || string Email's User
* @param bool 		$byother : enable other user update this message
*/
function SwitchStatus($message, $user, $byother = false){
	$this->permission->validate('MESSAGE', 'WRITE', 7); //required permission
	$con		=	Xcon(PERMISSION);
	if($message->User->id == $user->id || $byother){	//must be enable by other or owner of message is same with the user
	$status			=	0;
	if($message->status >0){
		$status 	=	1;
	}
	$q = mysqli_query($con,"update messenger_user set status='$status' where message='$message->id' and user='$user->id'");
		
	return $q;
	}else{
		return false;
	}
}
/**
* get list message by type
* @param int $st 	: index page
* @param int $nd 	: number message count perpage
* @param int $mid : Messenger ID
*/	
function getList($mid, $st, $nd){
	$this->permission->validate('MESSAGE', 'READ', 13); //required permission
	$status = addslashes($status);
	$db 	= Xcon(PERMISSION);
	$data 	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	$q = mysqli_query($db,"select m.id,m.user,m.title,m.content,m.email,
		m.messenger_id,m.date,m.tp,mu.status 
		from message m inner join messenger_user mu on m.id=mu.message
		where m.messenger_id ='$mid'  order by id desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		$message = new Message();
		$message->generate($g);		
		$data[$i] = $message;
		$i++;
	}	
	return $data;
}
/**
* Get message inbox for User
* @param User $User || String Email $User
* @param string $status
* @param int $st 	: index page
* @param int $nd 	: number message count perpage
*/
function getInbox($User,$status, $st, $nd){
	$con 	= Xcon(PERMISSION);
	$status = addslashes($status);
	$data 	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	$stat='';
	if($status !='all'){
		$stat = " and mu.status='$status'";
	}
	$uid = $User->id;
	if($User->id < 1){
		$uid 	=	$User;
	}
	
	$q		= mysqli_query($con,"SELECT m.content,m.title,m.id, mu.status, ms.id as messenger_id FROM messenger_group mg,messenger ms, messenger_user mu,message m where mg.messenger_id = ms.id and mg.user='$uid' and mu.messenger=ms.id $stat and mu.message=m.id and mu.user=mg.user
			order by id desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		$message = new Message($g['id']);
		$data[$i] = $message;
		$i++;
	}	
	return $data;
}
/**
*	Update message viewer 
*	this methode is not Open 
* 	@param Article $message
*	@param string $key	: user prefix secret
*/
function View($message,$key){
	if($key ==PERMISSION){ //locked method
	$con		=	Xcon(PERMISSION);
	$view = $message->view + 1;
	$q = mysqli_query($con,"update message set view ='$view' where id='$message->id'");
	return $q;
	}
}
/**
*	get list message by date range
*	@param string $range 	: date format start range ex : 2017-02-12 (YYYY-mm-dd)
*	@param string $to 		: date format end range
*	@param string $status 	: status message | Optional
*/
function getListByDate($range,$to, $status='on'){
	$this->permission->validate('MESSAGE', 'READ', 13); //required permission
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
	$q = mysqli_query($db,"select * from message where dt >'$range' and dt < '$to' $stat order by id desc");
	while($g = mysqli_fetch_array($q)){
		$message = new Article($g['id']);		
		$data[$i] = $message;
		$i++;
	}	
	return $data;
	
}
/**
* count number unread messaages
* @param string $to : messege to User | optional
*/	
function countUnread($to=''){
	$this->permission->validate('MESSAGE', 'READ', 13); //required permission
	$db 	= Xcon(PERMISSION);
	if($to !=''){
	$too ="and touser = '$to'";	
	}
	$q = mysqli_query($db,"select * from message where status='on' $too");
	$data = mysqli_num_rows($q);
	return $data;
}

}//
?>