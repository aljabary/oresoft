<?php
/**
@Admin Core Class
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling view plugins 
**/
namespace Prox\Engine\View;
use Prox\Plugins;
use Prox\System\PxException;
class Core {
	protected $Plugin_Handler;
	protected $bc;
	protected $Url;
	protected $fol;
	public function __construct($ph, $bc){
		$this->fol ='plugins';
		if($bc->type == 'theme'){
			$this->fol = 'theme_perfthm';
		}
		$this->Plugin_Handler = $ph;
		$this->bc = $bc;
		$this->Url =PROX_URL.$this->fol.'/'.$this->Plugin_Handler->Base_Class.'/';
	}	
	public function Show($file, $data=array()){
		$Me = $this->bc;
		$fn = PROX_Domain.'/'.$this->fol.'/'.$this->Plugin_Handler->Base_Class.'/temp/'.$file.'.php';
		if(is_file($fn)){
		include($fn);	
		}else{
			throw  new PxException('Template '.$file.' '.BCL('px','ex_template'), 5);
		}
	}
	public function getTemplate($filename){
		$Me = $this->bc;
		$fn = PROX_Domain.'/'.$this->fol.'/'.$this->Plugin_Handler->Base_Class.'/temp/'.$filename;
		if(is_file($fn)){
		$data = file_get_contents($fn);
		}else{
			throw  new PxException('Template '.$file.' '.BCL('px','ex_template'), 5);
		}
		return $data;
	}
	public function getTrialKey(){
		$Me = $this->bc;
		$fn = PROX_Domain.'/'.$this->fol.'/'.$this->Plugin_Handler->Base_Class.'/temp/trial.key';
		if(is_file($fn)){
		$data = file_get_contents($fn);
		}else{
			$data = null;
		}
	}
	public function getKeystore(){
		$Me = $this->bc;
		$fn = PROX_Domain.'/'.$this->fol.'/'.$this->Plugin_Handler->Base_Class.'/temp/keystore.key';
		if(is_file($fn)){
			$pcore = new Plugins\Core();
			$pcore->UseLib('RijndaelCore');
			$rij = new \RijndaelCore('proxtrasofttechnologyinc','sellupbooster');
			$data = file_get_contents($fn);
			$json= $rij->decrypt($data);
			$meta = json_decode($json);	
			$ex = false;
			if($Me->Meta->name != $meta->name){
				$ex = true; echo $meta->name;
			}
			if($Me->Meta->type != $meta->type){
				$ex = true;echo $Me->Meta->type;
			}
			if($Me->Meta->base_class != $meta->base_class){
				$ex = true;echo $meta->base_class;
			}
			if($Me->Meta->developer->name != $meta->developer->name){
				$ex = true;echo $meta->developer->name;
			}
			if($Me->Meta->developer->url != $meta->developer->url){
				$ex = true;echo $meta->developer->url;
			}
			if($Me->Meta->developer->email != $meta->developer->email){
				$ex = true;echo $meta->developer->email;
			}/*
			if($Me->Meta->developer->id != $meta->developer->id){
				$ex = true;
			}*/
			if($ex){
			throw new PxException(BCL('px','ex_keystore'), 21);	
			}
			return $meta;
		}else{
			throw new PxException(BCL('px','ex_keystore'), 21);	
		}
	}
	public function removeTrialKey(){
		$Me = $this->bc;
		$fn = PROX_Domain.'/'.$this->fol.'/'.$this->Plugin_Handler->Base_Class.'/temp/trial.key';
		unlink($fn);
	}
	public function saveTemplate($filename,$data){
		$Me = $this->bc;
		$fn = PROX_Domain.'/'.$this->fol.'/'.$this->Plugin_Handler->Base_Class.'/temp/'.$filename;
		file_put_contents($fn,$data);
	}
	public function User_role_exception(){
		include(PROX_Domain.'/temp/user_role_Exception.php');
	}
}

?>