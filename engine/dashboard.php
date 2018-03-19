<?php
/**
@Plugins Manager Class
@Dashboard v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class load, handling plugins and routing
**/
namespace Prox\Engine;
use Prox\Plugins\Core;
use Prox\System\Site;
class Dashboard extends Core{
	public $plug;
	public $routing;
	public $status;
	public $Plugins_Manager;
	public $type;
	/**
	Constructor initialize plugin and routing
	**/
function __construct($rt,$pc){
		parent::__construct(PERMISSION);
		$this->routing 	= $rt;
		$bc				= $rt[1];
		$db 			= Xcon(PERMISSION);
		$q = mysqli_query($db,"select * from plugins where base_class='$bc'");
		while($g = mysqli_fetch_array($q)){
			$this->status 	=	 $g['status'];
			$this->type 	=	 $g['p_type'];
		}
		$this->trigger('tools','Dashboard',$rt);		
		if($this->type !='tools'){		
			$this->init($this->type); 
		}
		$this->trigger($this->type,'Dashboard',$rt);
		$pl   		= $this->plugins[$this->type];
		$this->Plugins_Manager = $pc;
		$this->Plugins_Manager->plugins['tools'] = $this->plugins['tools'];
		$bcl		= explode('_',$bc);
		$base_class =  UCfirst($bcl[0]);
		if(count($bcl)>1){
		$base_class = UCfirst($bcl[0]).'_'.UCfirst($bcl[1]);
		}
		$this->plug = $pl[$base_class];
				
}
	function show(){
	$site 	= new Site();
	$user	= new User();
	$plugins_arg = 'Dashboard';$PXargs='Dashboard';
	$view_title= 'Dashboard - '.$site->name;
	include(PROX_Domain.'/temp/dashboard2.php');
	}
}

?>