<?php
/**
@Group Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Article object
**/
namespace Prox\Engine;
use Prox\System\Date_Time;
use Prox\Engine\User;
class Group {
	private	$id;	//Read Only
	private	$name;
	public	$date;
function __construct($id=0,$g=null){
	if($id>0){
		$this->Database = Xcon();
		$q 	=	mysqli_query($this->Database,"select * from user_group where group_id='$id'");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= $g['group_id'];
			$this->name 		= htmlspecialchars($g['title']);
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
		}
	}else{
			$this->id 			= $g['group_id'];
			$this->name 		= htmlspecialchars($g['title']);
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
	}
}
function members(){
	
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