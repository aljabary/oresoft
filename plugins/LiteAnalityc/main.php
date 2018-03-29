<?php
/**
Lite Analitycs  v.2.1.1
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
namespace LiteAnalityc;
use Prox\System\Site;
use Prox\System\Date_Time;
use Prox\Engine\Analityc;
use Prox\Plugins\Manager_Plug_handler;
use Prox\Engine\Article;
use Carbon\Carbon;
class MainClass extends Manager_Plug_handler{
public $arguments;
private $lvl=1;
public function __construct($arg,$param){
	/**
	* initialize (required)
	*/
//	print_r($param);
	parent::__construct($this,$param);
	$this->Manager = $this->PManager;
	/**
	* Kernel 
	*/
	 $this->pagetitle	= array('title'=>BCL('LiteAnalityc','menu1'),'subtitle'=>BCL('LiteAnalityc','title')); //(required)
	
}
public function main($arg,$param,$hook){
	$this->create_menu($hook);		//create menu by hook and ignore arguments
	
	switch($arg){
		case 'Dashboard': $this->backend($param,$hook); 	//do action by arguments (Dashboard)
		break;
		case 'Backend': $this->showAnalityc($param,$hook); 	//do action by arguments (Dashboard)
		break;
	}
}
function create_menu($hook){
	if($hook=='Admin_Menu'){
		$this->create_menu_admin();
	}	
}
public function create_menu_admin(){
	$temp =' <li>
    	<a href="javascript:void(0);" data-action="click-trigger">
        	<span class="menu-icon"><i class="icon-graph"> </i></span> 
            <span class="menu-text">'.BCL('LiteAnalityc','menu1').'</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LiteAnalityc/visitor/7">
                        <span class="menu-text">'.BCL('LiteAnalityc','menuvisitor').' '.BCL('LiteAnalityc','d7').'</span>  
                    </a>
                </li> 
				  <li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LiteAnalityc/visitor/30">
                        <span class="menu-text">'.BCL('LiteAnalityc','menuvisitor').' '.BCL('LiteAnalityc','d30').'</span>  
                    </a>
                </li>
<li>
                    <a href="'.PROX_URL_ADMIN.'/plugins/LiteAnalityc/article">
                        <span class="menu-text">'.BCL('LiteAnalityc','menuvisitor').' '.BCL('LiteAnalityc','atitle').'</span>  
                    </a>
                </li>				
				</ul></div></li>';
	echo $temp;			
}

function view($param,$hook){
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon'){	
	$dt 	= 	date('Y-m-d');
	$date 	=	new Date_Time();
	$sv_last	=	$date->pretime($dt,7,'i',1);  //get 7 last day datetime formast (YYYY-mm-dd)
//	$sv_next	=	$date->expired($dt,7,'i',1);  //get 7 next day datetime formast (YYYY-mm-dd)
	$an = new Analityc($this);
	$ac = new Article($this);
	$vcounter 	=	$an->countVisitor(1,'string');	
	$newarticle	=	$ac->getListByDate($sv_last,$dt);
	$this->View->Show("visitorchart", array("vcounter"=>$vcounter,
	'newarticle'=>count($newarticle)
	));
	}
}

function showAnalityc($param,$hook){ 
if(strtolower($param[1])==strtolower($this->Base_Class)){ //Perfom only in own backennd page
	if($hook!='Admin_Menu' && $hook!='Admin_Headericon' && $param['template']=='analityc'){	
	$dt 	= 	date('Y-m-d');
	$rout		=	strtolower($param[2]);
	if($param[3]==7){
	$rg	=	7;
	}else{
	$rg	=	30;
	}
	if($rout=='articleanalisis'){
		if($param[4]==7){
	$rg	=	7;}else{$rg	=	30;	}
	}
	//$this->UseLib('Minify_Html');	
	$this->UseLib('Carbon','Carbon');
	
	$carbon 	= new Carbon(); 
	$sv_last 	=  Carbon::now()->subDays($rg);               // 5 days ago
	$sv_next 	=  Carbon::now()->addDays(1);//.'<br>';      
	$an 		= new Analityc($this);
	$ac 		= new Article($this);
	if($rout=='visitor'){
		$newarticle		=	$ac->getListByDate($sv_last,$dt);
		$dailycounter	=	$an->getVisitorByDate($sv_last,$sv_next,'date');
		$device			=	$an->getVisitorByDate($sv_last,$sv_next,'devicetype');
		$pages			=	$an->getVisitorByDate($sv_last,$sv_next,'pagetype');	
		$this->View->Show("analityc", array("dailycounter"=>$dailycounter,
		'newarticle'=>count($newarticle),	'device'=>$device,'pagecounter'=>$pages,'ft'=>$rg
		));
	}
	if($rout=='article'){
	$pi=0;
	if($param[3] > 0){
	$pi = $param[3]-1;
	}
	$curpg[$pi] = 'class="active"';
		$this->View->Show("list", array(
		'article_list'=>$ac->getList('all',$pi, 10),
		'pg'=>$pi, 'curpg'=>$curpg
	));
	}
	if($rout=='articleanalisis'){
		$data	=	array(
		'date'=>$sv_last.'_'.$sv_next,
		'pagetype'=>'article',
		'page'=>$param[3],
		'group'=>'date'
		);
		$ac->gen($param[3]);
		$dailycounter	=	$an->graph($data);
		$this->View->Show("analitycarticle", array(
		"dailycounter"=>$dailycounter, 'aid'=>$param[3],
		"article"=>$ac->Obj[0]
	));
	}
	}
}
}
function backend($param,$hook){
	$temp = $param['template'];
	switch($temp){
		case 'vchart':$this->view($param,$hook);
		break;
	}
	
}

/**
* We provide API for other plugins
* other plugin can call this method
*/

}
?>