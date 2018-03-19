<?php
/**
@Lang Function
@Proxtrasoft v.2.1.1
@license: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author: Abu Zidane Asadudin Shakir Al-Jabary
this function handling language
**/
/**including file language**/
use Prox\System;
function includefile(){
$site = new System\Site();	
include(PROX_Domain.'/lang/'.$site->lang.'.php');
}
/**Calling for getting value of language by key**/
function lang($key){
global $lang;	
$l =$lang[$key]; return $l;
}

?>