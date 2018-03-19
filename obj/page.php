<?php
/**
@Article Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Article object
**/
namespace Prox\Engine;
use Prox\Engine\User;
use Prox\System\Date_Time;
use Prox\Engine\Category;
use Prox\Engine\Page;
class Page {
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
	private $db;
	function __construct($id = 0){
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
			$this->parent 		=	new Page($g['parent']);
			$this->Category		=	new Category($g['category']);
			$this->type 		=   $g['type'];
			$this->url			=	PROX_URL.seo_link($g['slug']);
		}
	}
	public function getBySlug($name){
		
		$nm = str_replace('-',' ',$name);
		$q 	=	mysqli_query($this->db,"select * from page where slug='$nm'");
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
			$this->parent 		=	new Page($g['parent']);
			$this->Category		=	new Category($g['category']);
			$this->type 		=   $g['type'];
			$this->url			=	PROX_URL.seo_link($g['slug']);
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