<?php
/**
@Comment Core Class
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling Comment processing data, insert, update, delete
**/
class Comment_Core{
	private $permission;
	/**
	initialize permission for plugins
	*/
function __construct(/*Plugins Base_Class*/ $bc){	
		$this->permission 	= new Permission($bc);
		}	
/**
* Create new instance an Comment
* @param Array data
* @param User user 
* return int $lid : Id Comment
*/
function Create($data,  $user){
	$this->permission->validate('COMMENT', 'WRITE', 22); //required permission
	$con 		=	 Xcon();
	//print_r($data);
	$obj 		=	addslashes($data['object']);
	$content	=	addslashes($data['content']);
	$today 		= 	date('Y-m-d H:i:s');
	$otype		=	addslashes($data['otype']);
	$lid		=	0;
	mysqli_query($con,"insert into comment (user,content,status,obj,otype,dt) values ('$user->id','$content','0','$obj','$otype','$today')");
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
	$con		=	Xcon();
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
* get list comment by type
* @param string $status : 1 or 2 or 3 or all status comment
* @param int $objid 	: ID Object
* @param int $st 	: index page
* @param int $nd 	: number article count perpage
*/	
function getList($status,$type, $objid=0, $st, $nd){
	$this->permission->validate('COMMENT', 'READ', 23); //required permission
	$status = addslashes($status);
	$db 	= Xcon();
	$data 	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	$whr='';
	if($status !='all'){
		
		$stat = " where status='$status'";
	}
	if($type !='all'){
		$qtype = "where otype='$type'";
		if($stat){
			$qtype = " and otype='$type'";
		}
	}
	if($objid > 0){
		if($qtype){
			$qobj = " and obj='$objid'";
		}
	}
	
	$q = mysqli_query($db,"select * from comment $stat $qtype $qobj order by comment_id desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		$com = new Comment($g['comment_id']);		
		$data[$i] = $com;
		$i++;
	}	
	return $data;
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