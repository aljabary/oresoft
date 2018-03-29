<?php
/**
@Article Core Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling article processing data, insert, update, delete
**/
namespace Prox\Engine;
use Prox\Engine\Article\Core;
use Prox\System\Permission;
class Article extends Core{
	private $permission;
	private $Base_Class;
	/**
	initialize permission for plugins
	*/
	
function __construct($bc,$id=0){
	parent::__construct($bc,$id);
	$this->permission 	= new Permission($bc);
	$this->Base_Class = $bc;	
}
/**
* Create new instance an article
* @param Array article
* @param User user 
*/
function Create( $article,  $user){
	$this->permission->validate('ARTICLE', 'WRITE', 7); //required permission
	$this->permission->validate('CATEGORY', 'READ', 3); //required permission
	$con 		= Xcon(PERMISSION);
	$title 		=	addslashes($article['title']);
	$content	=	addslashes($article['content']);
	$today 		= 	date('Y-m-d H:i:s');
	$category	=	$article['categories'];
	$tags		=	$article['tags'];
	$headline	=	$article['headline'];
	$keyword	=	$article['keyword'];
	$status		=	$article['status'];
	$photo		=	$article['photo'];
	$lid		=	0;
	mysqli_query($con,"insert into article (title,content,dt,user,headline,keyword,photo,status) values ('$title','$content','$today','$user->id','$headline','$keyword','$photo','$status')");
	$lid 	= mysqli_insert_id($con);
	/* Insert article category  and tags*/
	if($lid > 0){
		$cc = count($category);
		for($i=0;$i<$cc;$i++){
			$cid = $category[$i];
			if($cid>0){
			mysqli_query($con,"insert into category_article (category,article) values ('$cid','$lid')");
			}
		}
		$tc = count($tags);
		for($it=0;$it<$tc;$it++){
			$tid = $tags[$it];
			if($tid>0){
			mysqli_query($con,"insert into tags (name,article) values ('$tid','$lid')");
			}
		}
	}
	return $lid;
}
/**
* Update Method
* @param Engine\Article\Obj 	$article
* 		 Engine\User 			$user 
* 		 bool 					$byother : enable other user update this article
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
* @param Article 	$article
* @param User 		$user 
* @param bool 		$byother : enable other user update this article
*/
function Remove($article, $user, $byother = false){
	$this->permission->validate('ARTICLE', 'WRITE', 7); //required permission
	$con		=Xcon(PERMISSION);
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
	$db 	= Xcon(PERMISSION);
	$this->Obj 	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	if($status !='all'){
		$stat = " where status='$status'";
	}
	//$article = new Article($this->Base_Class);
	$q = mysqli_query($db,"select * from article $stat order by id desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		 $this->gen($g);		
		//$data[$i] = $article->Obj-;
		$i++;
	}	
	return $this->Obj;
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
	$db 	= Xcon(PERMISSION);
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
	$db 	=Xcon(PERMISSION);
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
	$db 	= Xcon(PERMISSION);
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