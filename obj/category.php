<?php
/**
@Category Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain category object
**/
namespace Prox\Engine\Category;
use Prox\System\Date_Time;
use Prox\Engine\User;
use Prox\Engine\Category;

class Core  {
	public $Obj;
	private $i;
function __construct($id=0,$g=null){ 
	$this->Obj[0] 	= 	new Obj($id,$g);
	$this->Obj[0]->parent 	= 	new Obj($this->Obj[0]->parent_id);
	$this->i		=	0;
}
function gen($id=0,$g=null){
	$x				=	$this->i;
	$this->Obj[$x] 	= 	new Obj($id,$g);
	$this->Obj[$x]->parent 	= 	new Obj($this->Obj[$x]->parent_id);
	$this->i++;
}

}
class Obj {
	private $id;
	public $name;
	public $keyword;
	public $description;
	public $parent;
	public $parent_id;
	public $url;
function __construct($id=0,$g=null){
		$Xcon = Xcon(PERMISSION);
	if($id > 0){	
		$q 	=	mysqli_query($Xcon,"select * from category where id='$id'");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= $g['id'];
			$this->name 		= htmlspecialchars($g['name']);
			$this->keyword 		= htmlspecialchars($g['keyword']);
			$this->description 	= htmlspecialchars($g['description']);
			$this->parent_id	= $g['parent'];
			$this->url			=	PROX_URL."category/".seo_link($g['name']);
		}
	}else if($g){
		$this->id 			= $g['id'];
		$this->name 		= htmlspecialchars($g['name']);
		$this->keyword 		= htmlspecialchars($g['keyword']);
		$this->description 	= htmlspecialchars($g['description']);
		$this->parent_id	= $g['parent'];
		$this->url			=	PROX_URL."category/".seo_link($g['name']);
	}
}
	
function getByName($name){
	$nm = str_replace('-',' ',$name);
		$q 	=	mysqli_query($Xcon,"select * from category where name='$nm'");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= $g['id'];
			$this->name 		= htmlspecialchars($g['name']);
			$this->keyword 		= htmlspecialchars($g['keyword']);
			$this->description 	= htmlspecialchars($g['description']);
			$this->parent_id	= $g['parent'];
			$link				=	str_replace(" ","-",$this->name);
			$link				=	str_replace("&","-",$link);
			$link				=	str_replace("?","",$link);
			$link				=	str_replace("'","",$link);
			$link				=	str_replace('"','',$link);
			$link				=	str_replace('!','',$link);
			$link				=	str_replace(',','-',$link);
			$link				=	str_replace('.','-',$link);
			$this->url			=	PROX_URL."category/".$link;
		}
}
	public function __get($name)
  {
    if($name == 'id'){
      return $this->id;
	} else{
	return null;
  }
  }
  public function __set($name, $value)
  {
  }
	
}

?>