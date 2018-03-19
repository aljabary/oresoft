<?php
/**
@Notif Object Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class contain Notif object
**/
namespace Prox\Engine;
use Prox\Engine\User;
use Prox\System\Date_Time;
class Notification {
	private $id;	//Read Only
	private $User;	//Read Only
	public $content;
	public $fromuser;
	
	public $date;
	public $status;
	public $urlresult;
	public $obj;
	public $icon;
	public $title;
	private $db;
	function __construct($id=0){
		$this->db	=	Xcon(PERMISSION);
		if($id >0){
		$q 	=	mysqli_query($this->db,"select * from notification where notification_id='$id'");
		while($g=mysqli_fetch_array($q)){
			$this->id 			= $g['notification_id'];
			$this->User 		= new User();
			$this->User->getdata($g['user_id']);
			$this->content 		= $g['content'];
			$this->icon 		= $g['icon'];
			$this->title 		= $g['title'];
			$this->fromuser 	=  new User();
			$this->fromuser->getdata($g['fromuser']);
			$this->status 		= htmlspecialchars($g['status']);
			$this->urlresult			= $g['urlresult'];
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
			$this->id 			= $g['notification_id'];
			$this->User 		= new User();
			$this->User->getdata($g['user_id']);
			$this->content 		= $g['content'];
			$this->icon 		= $g['icon'];
			$this->title 		= $g['title'];
			$this->fromuser 	=  new User();
			$this->fromuser->getdata($g['fromuser']);
			$this->status 		= htmlspecialchars($g['status']);
			$this->urlresult			= $g['urlresult'];
			$dt					=	new Date_Time($g['dt']);
			$this->date 		= $dt->it;
		}
	
}

?>