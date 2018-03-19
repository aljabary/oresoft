<?php
/**
@Photo Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Media Photo object
**/
namespace Prox\Engine;
use Prox\Engine\User;
use Prox\System\Date_Time;
class Photo {
	private $id;	//Read Only
	private $source;	//Read Only
	private $thumb = array();	//Read Only
	public $title;
	public $date;
	private $type; //read only
function __construct($id){
	$Xcon =Xcon(PERMISSION);
	if($id > 0){
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

?>