<?php
/**
LiteTheme v.2.1.1
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

use Prox\System\Site;
$site = new Site();	
$includes	=	array("main","lang/".$site->lang, "home");
$this->loadclass($includes);

?>