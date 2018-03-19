<?php
/**
Lite Message v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Openproject License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
SELECT * FROM messenger m INNER JOIN messenger_group mg on mg.messenger_id=m.id inner join messenger_user mu on mu.messenger = m.id INNER JOIN message msg on msg.id = mu.message
**/
namespace LiteMessage;
class LMinbox{
public $arguments;
public $param ;
public $BC; // Base Class;
public function __construct($arg,$param, $bc){
	$this->arguments=$args;$this->param=$param;
	$this->BC = $bc;
}

function viewInbox(){
	$pi = $_GET['page'];
	
	if($pi <2){
		$pi =1;
	}
	$pg = $pi-1;
	$unread = $this->BC->MC->getInbox(new User(),1,0, 100);
	$cp[$pi]="class='active'";
$data = array('msgs'=>$this->BC->MC->getInbox(new User(),'all', $pg, 20),
	'curpage'=>$pi,'curpage_class'=>$cp,
	'ib_unread'=>count($unread)
	);
	$this->BC->View->Show("inbox",$data);
}
function readmessage(){
	$pi = $_GET['page'];
	
	if($pi <2){
		$pi 	= 1;
	}
	$pg 		= $pi-1;
	$me			=	new User();
	$unread 	= $this->BC->MC->getInbox($me,1,0, 100);

	$cp[$pi]="class='active'";
	$mid 		=	addslashes($_GET['msg']);
	$messages 	=	$this->BC->MC->getList($mid, $pg, 20);
	
	$data 		= array('msgs'=>$messages,
	'curpage'	=>$pi,'curpage_class'=>$cp,
	'title'		=>$this->get_title($messages),
	'ib_unread'	=>count($unread),
	'mid'		=>$mid,
	'MC'		=>$this->BC->MC,
	'me'		=>$me
	);
	$this->BC->View->Show("read",$data);
}
function get_title($msg){
	$title ='';
	foreach($msg as $key=>$val){
		if($title ==''){
			if($val->title){
				$title = $val->title;
			}
		}
	}
	return $title;
}
/*
$dom = new DOMDocument();
$dom->loadHTML($your_html_here);


// find all the img tags
$imgs = $dom->getElementsByTagName('img');

// cycle through all image tags
foreach($imgs as $img) {
    $src = $img->getAttribute("src");
    // do something
}
*/
}
?>