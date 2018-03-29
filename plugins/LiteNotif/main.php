<?php
/**
Lite Notif v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
namespace LiteNotif;
use Prox\Plugins\Manager_Plug_handler;
use Prox\Engine\Notification;
use Prox\Engine\Article;
use Prox\Engine\Photo;
use Prox\System\Site;
use Prox\Engine\User;
class MainClass extends Manager_Plug_handler{
public $arguments;	
public $Manager;  				//(reuqired)
public $pagetitle = array(); 	//(reuqired)
public $notification;
private $NC;
public function __construct($arg,$param){
	$this->arguments = $arg;
	/**
	* initialize (required)
	*/
	$this->NC = new Notification($this);
	parent::__construct($this,$param);
	$this->Manager = $this->PManager;
	/**
	* Kernel 
	*/
	$this->pagetitle	= array('title'=>BCL('LiteNotif','title'),'subtitle'=>BCL('LiteNotif','subtitle'));
		
}
public function main($arg,$param,$hook){
	$this->create_menu($hook);
	switch($arg){
		case 'Backend': $this->backend($param,$hook); 
		break;
	}
}
function create_menu($hook){
	if($hook=='Admin_Menu'){
		//$this->create_menu_admin();
	}else if($hook=='Admin_Headericon'){
		$this->create_headericon_admin();
	}
}
public function create_headericon_admin(){
	$site 	= new Site();
	$my		= new User();
	$ib 	= $this->NC->getList(1,$my, 0, 10);
	//print_r($ib);
	$ctr = '<span class="badge vd_bg-red">'.count($ib).'</span>';
	if(count($ib)<1){
		$ctr='';
	}
	$temp='<li id="top-menu-1" class="one-big-icon mega-li"> 
      <a href="index-2.html" class="mega-link" data-action="click-trigger">
    	<span class="mega-icon"><i class="fa fa-globe"></i></span>'.$ctr.' 
		       
      </a>
	  <div class="vd_mega-menu-content width-xs-3 width-sm-4 width-md-5 width-lg-4 right-xs left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> 
           	   Notification
               <div class="vd_panel-menu">
                     <span data-original-title="Notification Setting" data-toggle="tooltip" data-placement="bottom" class="menu">
                        <i class="fa fa-cog"></i>
                    </span>                                                                              
                </div>
           </div>                 
		   <div class="content-list content-image">
           	   <div  data-rel="scroll">	
               <ul class="list-wrapper pd-lr-10">';
 for($i=0;$i<count($ib);$i++){ 
$notif = $ib[$i];
		$photo = $notif->icon;
		if($$photo = $notif->icon ==''){
        $photo = $site->logo;
		}
		
$temp .='		 <li> 	<a href="'.PROX_URL.'ajax.php?plugins=1&class=LiteNotif.MainClass&function=directo&not='.$notif->id.'"><div class="menu-icon"><img src="'.$photo.'"></div> 
                            <div class="menu-text"> '.$notif->content.'
                            	<div class="menu-info">
                                    <span class="menu-date">'.$notif->date.'</span>                                                                         
                                    <span class="menu-action">
                                                                                                                 
                                    </span>                                
                            	</div>
                            </div> </a>
                    </li>';
}                                                            
                    
              $temp .=' </ul>
               </div>
               <div class="closing text-center" style="">
               		<a href="'.PROX_URL_ADMIN.'/plugins/LiteNotif/readall">See All Notification <i class="fa fa-angle-double-right"></i></a>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content --> 
   </li>';
	  echo $temp;
}

function removeArt(){
	$art = new notification($_GET['notification']);
	$ac 	= new Notification\Core($this);
	$ac->Remove($art,new User(), true);
}
function backend($param,$hook){
	$rout = strtolower($param[2]);
	$a_id = 0;
	if(addslashes($_GET['not']) >0){
		$a_id = addslashes($_GET['not']);
	}
	$this->notification = new Notification($a_id);
	$temp = $param['template'];
	
	$param = array_merge($param,array("this"=>$this));
	
	switch($rout){ //router controlling
		case 'readall':if($temp=='notiflist'){$this->showlistnotif();}
		break;
	}
}
function showlistnotif(){
	$pi = $_GET['page'];	
	if($pi <2){
		$pi =1;
	}
	$pg = $pi-1;
	$my = new User();
	$notifs = $this->NC->getList('all',$my, $pg, 20);
	$cp[$pi]="class='active'";
	$data = array('notiflist'=>$notifs ,
		'curpage'=>$pi,'curpage_class'=>$cp,
		'ib_unread'=>count(notifs)
	);
	/*
	* param : string "list" (template file name)
	*		: array $data (parsing data template)
	*/
	$this->View->Show("list",$data);
}
function directo(){
	$nc = new Notification($this,addslashes($_GET['not']));
	$this->notification	=	$nc->Obj[0];
	$this->NC->setStatus($this->notification,0);
	header("location:".$this->notification->urlresult);
}
function Btn_Click(){
	$nc = new Notification($this,addslashes($_GET['not']));
	$this->notification	=	$nc->Obj[0];
	$ok = $this->NC->Remove($this->notification, new User());
	
}

}
?>