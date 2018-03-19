<?php
/**
@Comment Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Comment object
**/
namespace Prox\Engine;
use Prox\System\Date_Time;
use Prox\Engine\User;
class Comment {
	private $id;	//Read Only
	private $User;	//Read Only
	public $content;
	public $date;
	public $otype;
	public $status;
	public $obj;
	private $db;
	function __construct($id=0){
		$this->db	=	Xcon(PERMISSION);
		if($id >0){
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
  function generate($g){
			$this->id 			= $g['comment_id'];
			$this->User 		= new User();
			$this->User->getdata($g['user']);
			$this->content 		= $g['content'];
			$this->status 		= htmlspecialchars($g['status']);
			$this->email 		= htmlspecialchars($g['email']);
			$this->Object		= $g['obj'];
			$this->otype		= $g['otype'];
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;			
  }
	
}

?>