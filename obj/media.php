<?php
/**
@Category Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain category object
**/
namespace Prox\Engine\Media;
use Prox\System\Date_Time;
use Prox\Engine\User;
use Prox\Engine\Media\Obj_Photo;
class Core  {
	public $Obj;
	private $i;
function __construct($id=0,$tp){
if($id){	
	$cls		=	'Prox\Engine\Media\Obj_'.$tp;
	$this->Obj[$tp][] 	= 	new $cls($id);
}
	$this->i		=	0;
}
function gen($id=0,$tp){
	$x				=	$this->i; 
	$cls		=	'Prox\Engine\Media\Obj_'.$tp;
	$this->Obj[$tp][] 			= 	new $cls($id);
	$this->i++;
}

}
class Obj_Photo{
	private $id;	//Read Only
	private $source;	//Read Only
	private $thumb = array();	//Read Only
	public $title;
	public $date;
	private $type; //read only
function __construct($id){
	$Xcon =Xcon(PERMISSION);
	if(is_array($id)){
		$g = $id;
		$this->id 			= $g['id'];
		$this->source 		= $g['source'];
		$this->title 		= htmlspecialchars($g['title']);
		$dt					= new Date_Time($g['dt']);
		$this->date 		= $dt->it;
		$xt 				= "_.".pathinfo($this->source, PATHINFO_EXTENSION);			
		$this->type			=	$g['tp'];
		$this->thumb[75] 	=	str_replace($xt,"thumb_75.".pathinfo($this->source, PATHINFO_EXTENSION),$this->source);
		$this->thumb[150] 	=	str_replace($xt,"thumb_150.".pathinfo($this->source, PATHINFO_EXTENSION),$this->source);
		$this->thumb[250] 	=	str_replace($xt,"thumb_250.".pathinfo($this->source, PATHINFO_EXTENSION),$this->source);
	}else if($id > 0){
		$q 	=	mysqli_query($Xcon,"select * from media where id='$id' and tp='photo'");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= $g['id'];
			$this->source 		= $g['source'];
			$this->title 		= htmlspecialchars($g['title']);
			$dt					= new Date_Time($g['dt']);
			$this->date 		= $dt->it;
			$xt 				= "_.".pathinfo($this->source, PATHINFO_EXTENSION);			
			$this->type			=	$g['tp'];
			$this->thumb[75] 	=	str_replace($xt,"thumb_75.".pathinfo($this->source, PATHINFO_EXTENSION),$this->source);
			$this->thumb[150] 	=	str_replace($xt,"thumb_150.".pathinfo($this->source, PATHINFO_EXTENSION),$this->source);
			$this->thumb[250] 	=	str_replace($xt,"thumb_250.".pathinfo($this->source, PATHINFO_EXTENSION),$this->source);
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

class Obj_Document {
	private $id;	//Read Only
	private $source;	//Read Only
	public $title;
	public $date;
	private $type; //read only
	private $db;
	function __construct($id){
		$this->db	=	Xcon(PERMISSION);
		if(is_array($id)){
			$g = $id;
			$this->id 			= $g['id'];
			$this->source 		= $g['source'];
			$this->title 		= htmlspecialchars($g['title']);
			$dt					= new Date_Time($g['dt']);
			$this->date 		= $dt->it;
			$this->type			=	$g['tp'];
		}
		else if ($id > 0){
			$q 	=	mysqli_query($this->db,"select * from media where id='$id' and tp='document'");
			while($g=mysqli_fetch_array($q)){
				$this->id 			= $g['id'];
				$this->source 		= $g['source'];
				$this->title 		= htmlspecialchars($g['title']);
				$dt					= new Date_Time($g['dt']);
				$this->date 		= $dt->it;
				$this->type			=	$g['tp'];
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
class Obj_Video {
	private $id;	//Read Only
	private $source;	//Read Only
	public  $title;
	public  $date;
	private $type; //read only
	private $db;
	function __construct($id){
		$this->db = Xcon(PERMISSION);
		if(is_array($id)){
			$g = $id;
			$this->id 		= $g['id'];
			$this->source 	= $g['source'];
			$this->title 	= htmlspecialchars($g['title']);
			$dt				= new Date_Time($g['dt']);
			$this->date 	= $dt->it;
			$this->type		=	$g['tp'];
		}else if($id >0){
			$q 	=	mysqli_query($this->db,"select * from media where id='$id' and (tp='audio' or tp='video')");
			while($g=mysqli_fetch_array($q)){
				$this->id 		= $g['id'];
				$this->source 	= $g['source'];
				$this->title 	= htmlspecialchars($g['title']);
				$dt				= new Date_Time($g['dt']);
				$this->date 	= $dt->it;
				$this->type		=	$g['tp'];
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

class Obj_Audio {
	private $id;	//Read Only
	private $source;	//Read Only
	public  $title;
	public  $date;
	private $type; //read only
	private $db;
	function __construct($id){
		$this->db = Xcon(PERMISSION);
		if(is_array($id)){
			$g = $id;
			$this->id 		= $g['id'];
			$this->source 	= $g['source'];
			$this->title 	= htmlspecialchars($g['title']);
			$dt				= new Date_Time($g['dt']);
			$this->date 	= $dt->it;
			$this->type		=	$g['tp'];
		}else if($id >0){
			$q 	=	mysqli_query($this->db,"select * from media where id='$id' and (tp='audio' or tp='video')");
			while($g=mysqli_fetch_array($q)){
				$this->id 		= $g['id'];
				$this->source 	= $g['source'];
				$this->title 	= htmlspecialchars($g['title']);
				$dt				= new Date_Time($g['dt']);
				$this->date 	= $dt->it;
				$this->type		=	$g['tp'];
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