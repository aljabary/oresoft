<?php
/**
@Permission Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class load, handling plugins and routing
**/
namespace Prox\System;
class Permission{
	public $bc;
	public $val	=	'false';
function __construct($bc){
		$this->bc	=	$bc;
		
}
function validate($perm, $subperm='', $code){
	$bc = $this->bc;
	$permi = $perm.'.'.$subperm;
	if($bc !='pxpermission'){
	if($this->bc->Manager->Base_Class !='Manager_Plug_handler'){
		$this->val = $this->bc->Permissions[$perm];
		if(!$this->val){
		$this->val = $this->bc->Permissions[$permi];	
		}
	switch ($this->val) {
            case 'false':
                throw new PxException(BCL('px','ex_perm'), $code);
                break;
			case 'true':
               $this->val = $val;
                break;
			default: 
                // No exception, object will be created.
                $this->val = $val;
                break;
        }
	}
	}
}
}

?>