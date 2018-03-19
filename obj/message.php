<?php
/**
@Message Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Message object
**/
namespace Prox\Engine;
use Prox\Engine\User;
use Prox\System\Date_Time;
class Message {
	private $id;	//Read Only
	private $User;	//Read Only
	public $title;
	public $content;
	public $date;
	public $type;
	public $status;
	public $email;
	public $messenger;
	private $db;
	function __construct($id=0){
		$this->db	=	Xcon(PERMISSION);
		if($id >0){
		$q 	=	mysqli_query($this->db,"select m.id,m.user,m.title,m.content,m.email,
		m.messenger_id,m.date,m.tp,mu.status 
		from message m inner join messenger_user mu on m.id=mu.message where m.id='$id'");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= $g['id'];
			$this->User 		= new User();
			$this->User->getdata($g['user']);
			$this->title 		= htmlspecialchars($g['title']);
			$this->content 		= $g['content'];
			$this->status 		= htmlspecialchars($g['status']);
			$this->email 		= htmlspecialchars($g['email']);
			$this->messenger	= $g['messenger_id'];
			$dt					=	new Date_Time($g['date']);
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
  function generate($g){
			$this->id 			= $g['id'];
			$this->User 		= new User();
			$this->User->getdata($g['user']);
			$this->title 		= htmlspecialchars($g['title']);
			$this->content 		= $g['content'];
			$this->status 		= htmlspecialchars($g['status']);
			$this->messenger	= $g['messenger_id'];
			$dt					=	new Date_Time($g['date']);
			$this->date 		= $dt->it;
			$this->type			=	$g['tp'];
			$this->email 		= htmlspecialchars($g['email']);
			
  }
	
}

?>