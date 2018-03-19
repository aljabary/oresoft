<?php
/**
@HomePage Class
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling Home page (frontend)
**/
class HomePage{
public $Plugins_Manager; //Plugins Core
public $routing;
public $plug;
public $site;
/**
	Constructor initialize plugin and routing
	**/
function __construct($rt,$pc){
		$this->routing 	= $rt;
		$bc				= $rt[1];
		$db 			= Xcon();
		//$this->trigger('feature','Backend',$rt);
		$this->Plugins_Manager = $pc;
		//$this->Plugins_Manager->init('feature'); 			
	//	$this->Plugins_Manager->trigger('feature','Homepage',$rt);	
		$pl   		  = $this->Plugins_Manager->plugins['feature'];
		
		$this->Plugins_Manager->plugins['feature'] = $pl;//$this->plugins['tools'];
		$site 			= new Site();
		$this->site 	= $site;
		$PXzTheme		=	$site->theme;
		$param 			=	array_merge($this->routing,array("this"=>'PERMISSION'));
		$PXTheme		=	$this->site->theme;
		$this->plug 	=	new $PXzTheme('Homepage',$param);
		$q = mysqli_query($db,"select * from plugins where base_class='$PXTheme'");
		while($g = mysqli_fetch_array($q)){
			$this->status = $g['status'];
		}		
}
function showView($PXargs){
	if($PXargs !=''){
	$ii = $PXargs." ";
	$data = file_get_contents(PROX_Domain.'/data.txt');
	$data .=$ii;
file_put_contents(PROX_Domain.'/data.txt',$data);	
	$user	= new User();$xr = $PXargs;
	$param		 	=	array();
	$view_title		= 	$this->site->name;
	$PXzTheme		=	$this->site->theme;
	$obj 			=	array();
	$ua 			=	new UserAgent(PERMISSION);
	$ua->detect();
	
	$pagetype	=	'Home';$theobject = new Article(0);	//null page id
	switch($PXargs){
		case 'Page' :	$theobject 			= new Page(0);
						$theobject->getBySlug($this->routing[0]);
						if($theobject->id < 1){
							$PXargs = 'NotFound'; $pagetype	=	'NotFound';
						}else{
							$ac = new Page_Core(PERMISSION);
							$ac->View($theobject,PERMISSION);
							$obj = array(theobject);
						}
						$pagetype	=	'Page';
						break;
		case 'Read' : 	$theobject 			= new Article($this->routing[1]);
						if($theobject->id < 1){
							$PXargs = 'NotFound';	 $pagetype	=	'NotFound';					
						}else{
							$ac = new Article_Core(PERMISSION);
							$ac->View($theobject,PERMISSION);
							$obj = array('Article'=>$theobject);
						}
						$pagetype	=	'Article';
						break;	
		case 'Category':	$theobject 			= new Category(0);
							$theobject->getByName($this->routing[1]);
						if($theobject->id < 1){
							$PXargs = 'NotFound';		 $pagetype	=	'NotFound';				
						}else{
							$ac = new Category_Core(PERMISSION);
							$ac->View($theobject,PERMISSION);
							$obj = array('Category'=>$theobject);
						}
						$pagetype	=	'Category'; 
						break;	
		case 'Tag'	:		$obj = array('Tag'=>$this->routing[1]);
		
						$pagetype	=	'Tag';
						break;	
		case 'Contact'	:		$obj = array('Contact'=>$this->routing[1]);
		
						$pagetype	=	'Contact';
						break;				
	}
	/**
	*	Record visitor counter
	*/
	$ua->getSession($theobject->id,$pagetype);
	$param 			=	array_merge($this->routing,array("this"=>'PERMISSION'),$obj,array('cookie'=>$_COOKIE['visitor']));
	$PXTheme		=	new $PXzTheme($PXargs,$param);
	$PXTheme->HookManager	= $this->Plugins_Manager;
	$PXTheme->main($PXargs,$param,'',$this->plug);
	if( $PXargs != 'NotFound'){
	$PXTheme->PageEnd();
	}
	
	}
}
	
}

?>