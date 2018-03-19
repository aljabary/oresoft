<?php
/**
@Analityc Core Class
@Dashboard v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class handling Analityc processing data, insert, update, delete
**/
namespace Prox\Engine;
use Prox\System\Site;
use Prox\System\Permission;
use Prox\System\Date_Time;
class Analityc{
	private $permission;
	/**
	initialize permission for plugins
	*/
function __construct($bc){	
		$this->permission = new Permission($bc);
		}	
/**
* Count total visitor by range days
* @param int $range 	:	Range Days
* @param string $rf 	: 	return format string or int | optional
*/
function countVisitor($range, $rf='int'){
	$this->permission->validate('ANALITYC', '', 17); //required permission
	$dt 	= 	date('Y-m-d');
	$db 	=	Xcon(PERMISSION);
	$dtt 	=	new Date_Time();
	$rng	=	$dtt->pretime($dt,$range,'i',1); 
	$tc		=	0;
	$q	=mysqli_query($db,"select sum(counter) as tcounter from visitor where date > '$rng'");
	while($g = mysqli_fetch_array($q)){
		$tc = $g['tcounter'];
	}
	if(strtolower($rf)=='string'){
	$sl =	 strlen($tc);
	$co = $tc;
	if($sl > 3 && $sl < 7){
		$ref = 'K';
		$codat =substr($tc,-3);
		$cot =substr($tc,-2);
		$cot = str_replace($cot,'',$tc);
		$co = substr($cot,0,1);
		$cot = substr($cot,1);
		$co = $co.'.'.$cot. ' '.$ref;
	}
	if($sl > 6 && $sl < 10){
		$ref = 'M';
		$codat =substr($tc,-6);
		$cot =substr($tc,-4);
		$cot = str_replace($cot,'',$tc);
		$co = substr($cot,0,1);
		$cot = substr($cot,1);
		$co = $co.'.'.$cot. ' '.$ref;
	}
	return $co;
	}else{
		return $tc;
	}
	}
/**
* get visitor record by range days
* @param string $range 	:	Range Days start date time format (YYYY-mm-dd)
* @param string $to 	: 	Range Days end date time format (YYYY-mm-dd)
* @param string $group 	: 	Group data (column)
*/	
function getVisitorByDate($range, $to,$group){
	$this->permission->validate('ANALITYC', '', 17); //required permission
	$db 	=	Xcon(PERMISSION);
	$data 	=	array();$i=0;
	$q	=mysqli_query($db,"select *,sum(counter) as tcounter from visitor where date > '$range' and date < '$to' group by $group");
	while($g = mysqli_fetch_array($q)){
		$data[$i] = $g;$i++;
	}
	return $data;
}
/**
* get visitor record by range days
* @param array $data 	:	Graph data, all element is string
* Avalaiable graph data :	date,group, (column) as statement ex : page='$pageid'
*/	
function graph($data){
	$this->permission->validate('ANALITYC', '', 17); //required permission
	$db 	=	Xcon(PERMISSION);
	$datar 	=	array();$i=0;
	$st_date="";$and="";
	if(!empty($data['date'])){
		$sdt 	=	explode('_',addslashes($data['date']));
		$sdt1	=	$sdt[0];
		$sdt2	=	$sdt[1];
		$st_date ="date > '$sdt1' and date < '$sdt2'";$and="and";
	}
	if(!empty($data['group'])){
		$gr = addslashes($data['group']);
		$group =  "group by $gr";
	}
	$state = $and." ";$k=2;
	$imo=0;
	foreach($data as $key=>$val){
		if($key !='date' && $key!='group'){
			$value = addslashes($val);
			$keys = addslashes($key);
			$imo;
			if($imo>0){
				$state .=" and $keys ='$value'";
			}else{
				$state .=" $keys ='$value' ";
			}
			$imo++;
		}
	}
	
	$q	=mysqli_query($db,"select *,sum(counter) as tcounter from visitor where $st_date $state $group");
	while($g = mysqli_fetch_array($q)){
		$datar[$i] = $g;$i++;
	}
	return $datar;
}
}
?>