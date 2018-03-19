<?php
/**
@Permission Class
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class load, handling plugins and routing
**/
/*
Validation User role
@param User $user
@param int $levele : User role level required
*/
function User_role($user,$level){
	if($user->isadmin >= $level){
		$is = true;
	}else{
	 throw new PxException(BCL('px','role_level'), 29);
	}
}
    

?>