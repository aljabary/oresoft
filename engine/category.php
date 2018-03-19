<?php
/**
@Category Core Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class load, handling plugins and routing
**/
namespace Prox\Engine;
use Prox\Engine\Category\Core;
use Prox\System\Permission;
class Category extends Core{
	private $permission;
	/**
	initialize permission for plugins
	*/
function __construct($bc,$id=0,$g=null){
	parent::__construct($id,$g);
	$this->permission 	= new Permission($bc);
}	

function create($name,$desc, $key,$parent){
	$this->permission->validate('CATEGORY', 'WRITE', 2); //required permission
	$con 	= Xcon(PERMISSION);
	$name 	=	addslashes($name);
	$desc 	=	addslashes($desc);
	$key 	=	addslashes($key);
	mysqli_query($con,"insert into category (name,description,keyword,parent) values ('$name','$desc','$key','$parent')");
	return mysqli_insert_id($con);	
}
function update($category){
	$this->permission->validate('CATEGORY', 'WRITE', 2); //required permission
	$pid = $category->parent->id;
	$db 	= Xcon(PERMISSION);
	$q = mysqli_query($db,"update category set name='$category->name', description='$category->description', keyword='$category->keyword', parent='$pid' where id='$category->id'");
	return $q;
	}

function getlist($parent_id,$st,$nd,$order){
	$this->permission->validate('CATEGORY', 'READ', 3); //required permission
	$db 	= Xcon(PERMISSION);
	$data	=	array(); $i=0;	
	switch($parent_id){
		case "all":$prt ="parent !='999999'" ;
		break;
		default:$prt ="parent='".$parent_id."'";
		break;
	}
	$q 		=	mysqli_query($db,"select * from category where $prt order by id $order limit $st,$nd");
	while($g =	mysqli_fetch_array($q)){
		$this->gen(0,$g);
	}
	return $this->Obj;
}
/**
* get list article by category
* @param Category $category : Category Object
* @param int $st 	: index page
* @param int $nd 	: number article count perpage
*/	
function getArticle($category, $st, $nd){
	$this->permission->validate('CATEGORY', 'READ', 3); //required permission
	$status = addslashes($status);
	$db 	= Xcon(PERMISSION);
	$data 	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	$q = mysqli_query($db,"select * from category_article inner join article on category_article.article=article.id where category_article.category='$category->id' order by article.id desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		$article = new Article($g['article']);		
		$data[$i] = $article;
		$i++;
	}	
	return $data;
}
/**
*	count total article by category
*	@param Category $category
* 	@return int $data;
*/
function countArticle($category){
	$this->permission->validate('CATEGORY', 'READ', 3); //required permission
	$db 	= Xcon(PERMISSION);
	$q = mysqli_query($db,"select * from category_article where category='$category->id'");
	$data = mysqli_num_rows($q);	
	return $data;
}
/**
*	get list category most used
* 	@param int $st	: index page
*	@param int $nd	: count perpage
*/
function getMostUse($st, $nd){
	$db 	= Xcon(PERMISSION);
	$data 	= array(); $i=0;
	$ix 	= 0;
	if($st >0){
		$ix =$nd*$st;
	}
	$q = mysqli_query($db,"SELECT *, count(article) as c FROM category_article GROUP by category order by c desc limit $ix,$nd");
	while($g = mysqli_fetch_array($q)){
		$article = new Category($g['category']);		
		$data[$i] = array("category"=>$article,"count"=>$g['c']);
		$i++;
	}	
	return $data;
}

/**
*	Update category viewer 
*	this methode is not Open 
* 	@param Category $category
*	@param string $key	: user prefix secret
*/
function View($category,$key){
	if($key ==PERMISSION){ //locked method
	$con		=	Xcon(PERMISSION);
	$view = $category->view + 1;
	$q = mysqli_query($db,"update category set view ='$view' where id='$category->id'");
	return $q;
	}
}
}
?>