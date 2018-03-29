<?php
/**
@Comment Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Comment object
**/
namespace Prox\Engine\Comment;
use Prox\System\Date_Time;
use Prox\Engine\User;


class Core  {
	public $Obj;
function __construct($bc,$id=0){
if($id){	
	$ob 	= 	new Obj($bc,$id);
	$this->Obj[]	=	$ob;
}
	
}
function gen($id=0){
	$x				=	$this->i;
	$ob  	= 	new Obj($bc,$id);
	$this->Obj[]	=	$ob;
}

}
class Obj {
	private $id;	//Read Only
	private $User;	//Read Only
	public $content;
	public $date;
	public $otype;
	public $status;
	public $obj;
	private $db;
	private $BC;
	function __construct($bc,$id=0){
		$this->BC = $bc;
		$this->db	=	Xcon(PERMISSION);
		if(is_array($id)){
			$g = $id;
			$this->id 			= $g['comment_id'];
			$this->User 		= new User();
			$this->User->getdata($g['user']);
			$this->content 		= $g['content'];
			$this->status 		= htmlspecialchars($g['status']);
			$this->email 		= htmlspecialchars($g['email']);
			$this->obj			= $g['obj'];
			$this->otype		= $g['otype'];
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
		}
		else if($id >0){
		$q 	=	mysqli_query($this->db,"select * from comment where comment_id='$id'");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= $g['comment_id'];
			$this->User 		= new User();
			$this->User->getdata($g['user']);
			$this->content 		= $g['content'];
			$this->status 		= htmlspecialchars($g['status']);
			$this->email 		= htmlspecialchars($g['email']);
			$this->obj			= $g['obj'];
			$this->otype		= $g['otype'];
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
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