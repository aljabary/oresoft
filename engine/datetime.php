<?php
/**
@Date_Time Core Class version code 1.1.3
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This class converted date time string to standar writting date time local
**/
namespace Prox\System;
class Date_Time {
	public $day;
	public $m;
	public $M;
	public $y;
	public $it;
	public $exp;
	public $time;
	function __construct($time='')
	{
		if(!empty($time)){
	$time	=	explode(' ', $time);
	$dates	=	explode('-',$time[0]);
	$this->y	=	$dates[0];
	$this->day	= 	$dates[2];
	$this->M	=	$dates[1];
	switch($dates[1]){
	case '01'	: $this->m = 'Januari';
	break;
	case '02'	: $this->m = 'Februari';
	break;
	case '03'	: $this->m = 'Maret';
	break;
	case '04'	: $this->m = 'April';
	break;
	case '05'	: $this->m = 'Mei';
	break;
	case '06'	: $this->m = 'Juni';
	break;
	case '07'	: $this->m = 'Juli';
	break;
	case '08'	: $this->m = 'Agustus';
	break;
	case '09'	: $this->m = 'September';
	break;
	case '10'	: $this->m = 'Oktober';
	break;
	case '11'	: $this->m = 'November';
	break;
	case '12'	: $this->m = 'Desember';
	break;
	}
	$this->it	=	$dates[2].' '.$this->m.' '.$dates[0];
	$this->time =$time[1];
	}
}

	function slash($time)
	{
	//$time	=	explode(' ', $time);
	$dates	=	explode('/',$time);
	$this->y	=	$dates[0];
	$this->day	= 	$dates[1];
	$this->M	=	$dates[2];
	switch($dates[1]){
	case '01'	: $this->m = 'Januari';
	break;
	case '02'	: $this->m = 'Februari';
	break;
	case '03'	: $this->m = 'Maret';
	break;
	case '04'	: $this->m = 'April';
	break;
	case '05'	: $this->m = 'Mei';
	break;
	case '06'	: $this->m = 'Juni';
	break;
	case '07'	: $this->m = 'Juli';
	break;
	case '08'	: $this->m = 'Agustus';
	break;
	case '09'	: $this->m = 'September';
	break;
	case '10'	: $this->m = 'Oktober';
	break;
	case '11'	: $this->m = 'November';
	break;
	case '12'	: $this->m = 'Desember';
	break;
	}
	$this->it	=	$dates[0].' '.$this->m.' '.$dates[2];

}

	function expired($time,$range,$tp,$format=0){
		$d = $this->datetime($time, 'd');
		$m['i'] = $this->datetime($time, 'M');
		$y = $this->datetime($time, 'y');
		$x = $range;

		$p = $d+$x;
		if($p > 30){
		$no = 30 - $d;
		$p = $x-$no;
		if($m['i']==12){
		$y++;
		$m['i']=01;	
		}
		else{
		$m['i']++;
		}
		}
		
		switch('0'.$m['i']){
	case '01'	: $m['s'] = 'Januari';
	break;
	case '02'	: $m['s'] = 'Februari';
	break;
	case '03'	: $m['s'] = 'Maret';
	break;
	case '04'	: $m['s'] = 'April';
	break;
	case '05'	: $m['s'] = 'Mei';
	break;
	case '06'	: $m['s'] = 'Juni';
	break;
	case '07'	: $m['s'] = 'Juli';
	break;
	case '08'	: $m['s'] = 'Agustus';
	break;
	case '09'	: $m['s'] = 'September';
	break;
	case '10'	: $m['s'] = 'Oktober';
	break;
	case '11'	: $m['s'] = 'November';
	break;
	case '12'	: $m['s'] = 'Desember';
	break;
	}
		
		$exp[0] = $p.' '.$m[$tp].' '.$y;
		$exp[1] = $y.'-'.$m[$tp].'-'.$p;
		return $exp[$format];	
	}
	
	function datetime($time, $return)
	{
	$time	=	explode(' ', $time);
	$dates	=	explode('-',$time[0]);
	$tahun	=	$dates[0];
	$day	= 	$dates[2];
	switch($dates[1]){
	case '01'	: $m = 'Januari';
	break;
	case '02'	: $m = 'Februari';
	break;
	case '03'	: $m = 'Maret';
	break;
	case '04'	: $m = 'April';
	break;
	case '05'	: $m = 'Mei';
	break;
	case '06'	: $m = 'Juni';
	break;
	case '07'	: $m = 'Juli';
	break;
	case '08'	: $m = 'Agustus';
	break;
	case '09'	: $m = 'September';
	break;
	case '10'	: $m = 'Oktober';
	break;
	case '11'	: $m = 'November';
	break;
	case '12'	: $m = 'Desember';
	break;
	}
	
	switch($return){
	case 'm'	:	return $m;
	break;
	case 'M'	:	return $dates[1];
	break;
	case 'd'	:	return $day;
	break;
	case 'y'	:	return $tahun;
	break;	
	}
	return $m;
}
	
/**
*	get pre time ago
*	@param string $time : time current
*	@param int $range	: range time
*	@param string $tp	: type result return value
*	@param format 		:	format
*/
	function pretime($time,$range,$tp,$format=0){
		$d = $this->datetime($time, 'd');
		$m['i'] = $this->datetime($time, 'M');
		$y = $this->datetime($time, 'y');
		$x = $range;
		//echo $d;
		$p = $d-$x;
		if($p > 30){
		$no = 30 - $d;
		$p = $x-$no;
		
		if($m['i']==12){
		$y++;
		$m['i']=01;	
		}
		else{
		$m['i']++;$m['i']='0'.$m['i'];
		}
		}
		if($p <0){$m['i'] = $m['i']-1;}		
		switch('0'.$m['i']){
	case '01'	: $m['s'] = 'Januari';
	break;
	case '02'	: $m['s'] = 'Februari';
	break;
	case '03'	: $m['s'] = 'Maret';
	break;
	case '04'	: $m['s'] = 'April';
	break;
	case '05'	: $m['s'] = 'Mei';
	break;
	case '06'	: $m['s'] = 'Juni';
	break;
	case '07'	: $m['s'] = 'Juli';
	break;
	case '08'	: $m['s'] = 'Agustus';
	break;
	case '09'	: $m['s'] = 'September';
	break;
	case '10'	: $m['s'] = 'Oktober';
	break;
	case '11'	: $m['s'] = 'November';
	break;
	case '12'	: $m['s'] = 'Desember';
	break;
	}
		
		//$p	=	$p
		$exp[0] = $p.' '.$m[$tp].' '.$y;
		
		$exp[1] = $y.'-'.$m[$tp].'-'.$p;
		return $exp[$format];	
	}
	
	
}