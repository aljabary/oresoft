<?php
/**
@Page Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Article object
**/
namespace Prox\Engine\Page;
use Prox\Engine\User;
use Prox\System\Date_Time;
use Prox\Engine\Category;

class Core  {
	public $Obj = array();
	private $i;
	private $BC;
function __construct($bc,$id=0){
	$this->i	=	0;
	$this->BC	=	$bc;
	if($id){
	$ob 			= 	new Obj($bc,$id);
	$ob->parent 	= 	new Obj($bc,$ob->parent_id);
	$this->Obj[] 	= $ob;
	}
}
function gen($id=0){
	$i 			 =	$this->i;
	$ob = new Obj($this->BC,$id);
	//$this->Obj[] = new Obj($this->BC,$id);
	$ob->parent 	= 	new Obj($this->BC,$ob->parent_id);
	$this->Obj[] = $ob;
	$this->i++;
}

}
class Obj {
	private $id;	//Read Only
	private $User;	//Read Only
	private $view;	//Read Only
	public $name;
	public $content;
	public $date;
	public $Category;
	public $url;
	public $keyword;
	public $status;
	public $description;
	public $slug;
	public $type;
	public $parent;
	public $parent_id;
	private $db;
	private $BC;
	function __construct($bc,$id = 0){
		$this->BC	=	$bc;
		$cc 		=	new Category($this);
		if(is_array($id)){
			$g 					=	$id;
			$this->id 			= 	$g['id'];
			$this->User 		= 	new User($g['user']);
			$this->name 		= 	htmlspecialchars($g['name']);
			$this->slug 		= 	htmlspecialchars($g['slug']);
			$this->content 		= 	$g['content'];
			$this->status 		= 	htmlspecialchars($g['status']);
			$this->view 		= 	htmlspecialchars($g['view']);
			$this->description 	= 	htmlspecialchars($g['description']);
			$this->keyword 		= 	htmlspecialchars($g['keyword']);
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= 	$dt->it;
			$this->parent_id 		=	$g['parent'];
			$cc->gen($g['category']);
			$this->Category		=	$cc->Obj[0];
			$this->type 		=   $g['type'];
			$this->url			=	PROX_URL.seo_link($g['slug']);
		}else if($id >0){
		$this->db	=	Xcon(PERMISSION);
		$q 	=	mysqli_query($this->db,"select * from page where id='$id'");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= 	$g['id'];
			$this->User 		= 	new User($g['user']);
			$this->name 		= 	htmlspecialchars($g['name']);
			$this->slug 		= 	htmlspecialchars($g['slug']);
			$this->content 		= 	$g['content'];
			$this->status 		= 	htmlspecialchars($g['status']);
			$this->view 		= 	htmlspecialchars($g['view']);
			$this->description 	= 	htmlspecialchars($g['description']);
			$this->keyword 		= 	htmlspecialchars($g['keyword']);
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= 	$dt->it;
			$this->parent_id 		=	$g['parent'];
			$cc->gen($g['category']);
			$this->Category		=	$cc->Obj[0];
			$this->type 		=   $g['type'];
			$this->url			=	PROX_URL.seo_link($g['slug']);
		}
		}
	}
	
	public function __get($name)
  {
	  return $this->$name;
  }
  public function __set($name, $value)
  {
  }
}

?>