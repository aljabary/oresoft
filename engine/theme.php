<?php
/**
@Theme Core Class
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class theme controller
**/
namespace Prox\Plugins;
use Prox\Plugins\Manager_Plug_handler;
class Theme extends Manager_Plug_handler {
	public $HookManager;
	private $hook = array("Header_Meta"=>0, "Body_Before"=>0,
"Body_After"=>0,"Body"=>0,"Footer"=>0,"Footer_Script"=>0,);
function __construct($bc,$param){
	parent::__construct($bc,$param);
}
public function showHook($PXargs,$param,$hookname,$i){
		$this->HookManager->call_action('feature',$PXargs,$param,$hookname,$i);
		$this->hook[$hookname] = 1; 
}
public function PageEnd(){
		$dth = '';$i=0;
		foreach($this->hook as $key => $val){
			$hk = $this->hook[$key];
			if($hk < 1){
				$dth .=$key.', ';$i++;
			}
		}
		if($i>0){
			throw new PxException("Hook ".$dth.BCL('px','ex_hook'),14);	
		}
		
}
	
	
}

?>