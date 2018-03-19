<?php
/**
LiteCat v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
use Prox\System\Site;
$site = new Site();	
$includes	=	array("main","lang/".$site->lang);
$this->loadclass($includes);

?>