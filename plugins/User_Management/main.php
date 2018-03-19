<?php
/**
User Management v.2.1.1
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal OpenProject License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
namespace User_Management;
use Prox\Plugins\Manager_Plug_handler;
use Prox\Engine\User;
use Prox\Engine\Article;
use Prox\Engine\Notification;
class MainClass extends Manager_Plug_handler{
public $arguments;	
public $Manager;  				//(reuqired)
public $pagetitle = array(); 	//(reuqired)
public $article;
private $NC;
public $me;
public function __construct($arg,$param){
	$this->arguments = $arg;
	/**
	* initialize (required)
	*/
	$this->me = new User();

	$this->NC = new Notification\Core($this);
	parent::__construct($this,$param);
	$this->Manager = $this->PManager;
	/**
	* Kernel 
	*/
	$this->pagetitle	= array('title'=>BCL('User_Management','title'),'subtitle'=>BCL('User_Management','subtitle'));
		
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
		$this->create_menu_admin();
	}else if($hook=='Admin_Headericon'){
		$this->create_headericon_admin();
	}
}
public function create_headericon_admin(){
	$site 	= new Site();
	$my		= new User();
	$ib 	= $this->NC->getList(1,'all', 0,$my, 0, 10);
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
        $photo = $site->logo;
		if($notif->User->photo !=''){
			$photo = $notif->User->photo;
		}
		
$temp .='		 <li> 	<a href="'.PROX_URL_ADMIN.'/plugins/User_Management/read?not='.$notif->id.'"><div class="menu-icon"><img src="'.$photo.'"></div> 
                            <div class="menu-text"> '.$notif->title.'
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
               		<a href="'.PROX_URL_ADMIN.'/plugins/User_Management/readall">See All Notification <i class="fa fa-angle-double-right"></i></a>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content --> 
   </li>';
	  echo $temp;
}
function create_menu_admin(){
	$temp =' <li>
    	<a href="javascript:void(0);" data-action="click-trigger">
        	<span class="menu-icon"><i class="fa fa-users"> </i></span> 
            <span class="menu-text">'.BCL('User_Management','title').'</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/User_Management/adduser">
                        <span class="menu-text">'.BCL('User_Management','add').'</span>  
                    </a>
                </li>  
                <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/BlogBooster/list/1">
                        <span class="menu-text">'.BCL('User_Management','list').'</span>  
                    </a>
                </li> 
				 <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/BlogBooster/list/1">
                        <span class="menu-text">'.BCL('User_Management','group').'</span>  
                    </a>
                </li> 
				</ul></div></li>';
	echo $temp;			

}
function removeArt(){
	$art = new Article($_GET['article']);
	$ac = new Article_Core($this);
	$ac->Remove($art,new User(), true);
}
function setStatus(){
	$art = new Article($_GET['article']);
	$stat = $_GET['status'];
	$art->status = $stat;
	$ac = new Article_Core($this);
	$ac->Update($art,new User(), true);	
}
function backend($param,$hook){
	
	$rout = strtolower($param[2]);
	$a_id = 0;
	if($param[3] >0){
		$a_id = $param[3];
	}
	$this->article = new Article($a_id);
	$temp = $param['template'];

	$param = array_merge($param,array("this"=>$this));
	
	switch($hook){
		case 'Footer_Script': $this->scriptController($param); break;
		case 'Header_Meta':		break;
	}
	//echo $hook;
	/**
	*	we handling logic with router controlling and ignore hook
	*   we show template on where determined by user
	*   we have registered hook Backend_12 by default with template name is Editor,
	*	but user can determine with drag and drop hook position
	*	so we must get current template name in hook, if is Editor so Show our edito template
	*/
	switch($rout){ //router controlling
		case 'adduser':if($temp=='user_add'){$this->adduserView($param,$hook);}
		break;
		case 'list':if($temp=='Editor'){$this->listpage($param,$hook);}
		break;
		case 'group':if($temp=='user_list'){$this->list_group($param,$hook);}
		break;
	}
}
function adduserView($param,$hook){
	if($this->me->isadmin <3){ $this->View->User_role_exception();return false;} //User role master
	$data 	= array("lc"=>$Lc,
	"args"=>$this->arguments,
	"param"=>$param, 
	'article'=>$this->article);
	$this->View->Show("adduser",$data);	
}
function submit_add(){
	$site = new Site();
	if($this->me->isadmin ==3){ //this role only for master
	$uc = new User_Core($this);
	$data = array(
	"name"=>$_POST['um_name'],
	"email"=>$_POST['um_mail'],
	"password"=>$_POST['um_password'],
	"repassword"=>$_POST['um_repassword'],
	"photo"=>$site->logo,
	"role"=>$_POST['um_role'], 
	"bio"=>	htmlspecialchars($_POST['um_bio'])
	);
	$lid = $uc->Create($data, $this->me);
	if($lid['response']==0){
		$res = array("response"=>0,"msg"=>BCL('User_Management','er_pas'));
	}else if($lid['response']==2){
		$res = array("response"=>200,"msg"=>BCL('User_Management','suc_msg_'));
	}else{
		$ua = new User();
		$ua->getByEmail($_POST['um_mail']);
		$uc->Update($ua,$this->me,true);
		$res = array("response"=>0,"msg"=>BCL('User_Management','er_pas'));
	}
	header("Content-Type: application/json;charset=utf-8");
	echo json_encode($res);
	}
}

function list_group($param,$hook){
	if($this->me->isadmin <3){ $this->View->User_role_exception();return false;} //User role master
	$data 	= array("lc"=>$Lc,
	"args"=>$this->arguments,
	"param"=>$param, 
	'article'=>$this->article);
	$this->View->Show("list.group",$data);	
}
}
?>