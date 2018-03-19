<?php
/**
@Auvi Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Media Audio and Video object
**/
namespace Prox\Engine;
use Prox\System\Date_Time;
use Prox\Engine\User;
class Auvi {
	private $id;	//Read Only
	private $source;	//Read Only
	public $title;
	public $date;
	private $type; //read only
	private $db;
	function __construct($id){
		$this->db = Xcon(PERMISSION);
		
		$q 	=	mysqli_query($this->db,"select * from media where id='$id' and (tp='audio' or tp='video')");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= $g['id'];
			$this->source 		= $g['source'];
			$this->title 		= htmlspecialchars($g['title']);
			$dt					= new Date_Time($g['dt']);
			$this->date 		= $dt->it;
			$this->type			=	$g['tp'];
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