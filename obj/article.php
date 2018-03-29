<?php
/**
@Article Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Article object
**/
namespace Prox\Engine\Article;
use Prox\System\Date_Time;
use Prox\Engine\User;
use Prox\Engine\Media;
use Prox\Engine\Category;
use Prox\Engine\Article;
class Core  {
	public $Obj;
	private $i;
	private $BC;
function __construct($bc,$id=0,$g=null){
	$this->i	=	0;
	$this->BC	=	$bc;
	if($id){
	$this->Obj[] 	= 	new Obj($bc,$id);
	}
}
function gen($id=0){
	$this->Obj[] = new Obj($this->BC,$id);
}

}
class Obj{
	private $id;	//Read Only
	private $User;	//Read Only
	private $view;	//Read Only
	public $title;
	public $content;
	public $date;
	public $tags;
	public $Category;
	public $url;
	public $keyword;
	public $headline;
	public $Photo;
	public $status;
	private $Database;
	private $BC;
	function __construct($bc,$id){
		$this->BC	=	$bc;
		$media		=	new Media($bc,0,'Photo');
		$this->Database = Xcon(PERMISSION);
	 if(is_array($id)){
		 $g = $id;
			$this->id 			= $g['id'];
			$this->User 		= new User($g['user']);
			$this->title 		= htmlspecialchars($g['title']);
			$this->content 		= $g['content'];
			$this->status 		= htmlspecialchars($g['status']);
			$this->view 		= htmlspecialchars($g['view']);
			$this->headline 	= htmlspecialchars($g['headline']);
			$this->keyword 		= htmlspecialchars($g['keyword']);
			$media->gen($g['photo'],'Photo');
			$this->Photo 		= $media->Obj['Photo'][0];
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
			$this->tags			=	$this->getTags();
			$this->Category		=	$this->getCategories();
			$this->url			=	PROX_URL."read/".$g['id']."/".seo_link($g['title']);
	}else if($id>0){
		
		$q 	=	mysqli_query($this->Database,"select * from article where id='$id'");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= $g['id'];
			$this->User 		= new User($g['user']);
			$this->title 		= htmlspecialchars($g['title']);
			$this->content 		= $g['content'];
			$this->status 		= htmlspecialchars($g['status']);
			$this->view 		= htmlspecialchars($g['view']);
			$this->headline 	= htmlspecialchars($g['headline']);
			$this->keyword 		= htmlspecialchars($g['keyword']);
			$media->gen($g['photo'],'Photo');
			$this->Photo 		= $media->Obj['Photo'][0];
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
			$this->tags			=	$this->getTags();
			$this->Category		=	$this->getCategories();
			$this->url			=	PROX_URL."read/".$id."/".seo_link($g['title']);
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
private function getTags(){
		$db = $this->Database;
		$data = array(); $i=0;
		$q 	=	mysqli_query($db,"select * from tags where article='$this->id'");
		while($g=mysqli_fetch_array($q)){
		$data[$i] = $g['name'];
		$i++;
		}
		return $data;
}
private function getCategories(){
		$db = $this->Database;
		$cc = new Category($this->BC);
//$cc->Obj = array(); $i=0;
		$q 	=	mysqli_query($db,"select * from category_article where article='$this->id'");
		while($g=mysqli_fetch_array($q)){
		$cc->gen($g['category']);
		
		}
		return $cc->Obj;
}
}

?>