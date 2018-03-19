<?php
/**
@UserAgent Class
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary

Get the user agent informastion http request
this class access is closed for plugins app, used only by core engine
*/
class UserAgent{
	public $bc;
	private $is_mo 	=	false;
	private $is_os 	=	false;
	private $is_bw	=	false;
	private $is_tp 	=	false;
	public	$OS;
	public	$device;
	public	$OSVersion;
	public	$browser;
	public	$browserVersion;
	public	$deviceType;
	public	$deviceVersion;
	private $permission;
	private $detected	=	false;
function __construct($bc){
	$this->permission = new Permission($bc);
}
function getBrowser() 
 { 
     $u_agent 	= $_SERVER['HTTP_USER_AGENT']; 
     $bname 	= 'Unknown';
     $platform 	= 'Unknown';
     $version	= "";
	 $osV		="";

     //First get the platform?
     if (preg_match('/linux/i', $u_agent)) {
         $platform = 'linux';
	}
     elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
         $platform = 'mac';
     }
     elseif (preg_match('/windows|win32/i', $u_agent)) {
         $platform = 'windows';
		  if (preg_match('/NT 6.2/i', $u_agent)) { $osV	= '8'; }
             elseif (preg_match('/NT 6.3/i', $u_agent)) { $osV .= '8.1'; }
             elseif (preg_match('/NT 6.1/i', $u_agent)) { $osV .= '7'; }
             elseif (preg_match('/NT 6.0/i', $u_agent)) { $osV .= 'Vista'; }
             elseif (preg_match('/NT 5.1/i', $u_agent)) { $osV .= 'XP'; }
        // if (preg_match('/WOW64/i', $u_agent) || preg_match('/x64/i', $u_agent)) { $osV = ' (x64)'; }

     }

     // Next get the name of the useragent yes seperately and for good reason
     if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
     { 
         $bname = 'Internet Explorer'; 
         $ub = "MSIE"; 
     } 
     elseif(preg_match('/Trident/i',$u_agent)) 
     { // this condition is for IE11
         $bname = 'Internet Explorer'; 
         $ub = "rv"; 
     } 
     elseif(preg_match('/Firefox/i',$u_agent)) 
     { 
         $bname = 'Mozilla Firefox'; 
         $ub = "Firefox"; 
     } 
     elseif(preg_match('/Chrome/i',$u_agent)) 
     { 
         $bname = 'Google Chrome'; 
         $ub = "Chrome"; 
     } 
     elseif(preg_match('/Safari/i',$u_agent)) 
     { 
         $bname = 'Apple Safari'; 
         $ub = "Safari"; 
     } 
     elseif(preg_match('/Opera/i',$u_agent)) 
     { 
         $bname = 'Opera'; 
         $ub = "Opera"; 
     } 
     elseif(preg_match('/Netscape/i',$u_agent)) 
     { 
         $bname = 'Netscape'; 
         $ub = "Netscape"; 
     } 
     
     // finally get the correct version number
     // Added "|:"
     $known = array('Version', $ub, 'other');
     $pattern = '#(?<browser>' . join('|', $known) .
      ')[/|: ]+(?<version>[0-9.|a-zA-Z.]*)#';
     if (!preg_match_all($pattern, $u_agent, $matches)) {
         // we have no matching number just continue
     }

     // see how many we have
     $i = count($matches['browser']);
     if ($i != 1) {
         //we will have two since we are not using 'other' argument yet
         //see if version is before or after the name
         if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
             $version= $matches['version'][0];
         }
         else {
             $version= $matches['version'][1];
         }
     }
     else {
         $version= $matches['version'][0];
     }

     // check if we have a number
     if ($version==null || $version=="") {$version="?";}

     return array(
         'userAgent' => $u_agent,
         'name'      => $bname,
         'version'   => $version,
         'platform'  => $platform,
         'pattern'    => $pattern,
		 'osv'		=>$osV
     );
 } 

 function detect(){
	$pc = new Plugins_Core();
	$pc->UseLib("Mobile_Detect");	//load mobile detect Library
	$md = new Mobile_Detect();
	if($md->isTablet()){
		foreach ($md->getRules() as $_regex) {
            if (empty($_regex)) { continue; }
            if ($md->match($_regex, null)  && !$this->is_mo) {
				foreach ($md->getTabletDevices() as $key => $val) {
					$dev = $md->getTabletDevices();
					$reg = $dev[$key];
				if ($reg==$_regex && !$this->is_mo) {
				$this->device = $key; $this->is_mo	=	true;
				}
			}
		/**
		*	GET OS
		*/
			foreach ($md->getOperatingSystems() as $keyos => $valos) {
				$devos = $md->getOperatingSystems();
				$regos = $devos[$keyos];
				if ($md->match($regos, null) && !$this->is_os) {
					$this->is_os	=	true;
					$this->OS 	= $keyos;
					$this->OSVersion 	= $md->version($keyos);
				}
			}
		/**
		* Get Broswer getBrowsers
		*/
			foreach ($md->getBrowsers() as $keyb => $valb) {
				$devb = $md->getBrowsers();
				$regb = $devb[$keyb];//echo $regb.'</b>';
				if ($md->match($regb, null) && !$this->is_bw) {
					$this->is_bw	=	true;
					$this->browser 	= $keyb;
					 $this->browserVersion 	= $md->version($keyb);
				}
			}
			
		/**
		* Get Broswer getProperties
		*/
			foreach ($md->getProperties() as $keyp => $valp) {
				$devp = $md->getProperties();
            $regp = $devb[$keyp];
            if ($md->match($regp, null) && !$this->is_tp) {
             $this->is_tp			= true;
			 $this->deviceType 		= 'Tablet';//$keyp;
			 $this->deviceVersion 	= $md->version($keyp);
            }
			}
		 /**/
            }
        }
	}
	else if($md->isMobile()){	
		foreach ($md->getRules() as $_regex) {
            if (empty($_regex)) { continue; }
            if ($md->match($_regex, null)  && !$this->is_mo) {
				foreach ($md->getPhoneDevices() as $key => $val) {
					$dev = $md->getPhoneDevices();
					$reg = $dev[$key];
				if ($reg==$_regex && !$this->is_mo) {
				$this->device = $key; $this->is_mo	=	true;
				}
			}
		/**
		*	GET OS
		*/
			foreach ($md->getOperatingSystems() as $keyos => $valos) {
				$devos = $md->getOperatingSystems();
				$regos = $devos[$keyos];
				if ($md->match($regos, null) && !$this->is_os) {
					$this->is_os	=	true;
					$this->OS 	= $keyos;
					$this->OSVersion 	= $md->version($keyos);
				}
			}
		/**
		* Get Broswer getBrowsers
		*/
			foreach ($md->getBrowsers() as $keyb => $valb) {
				$devb = $md->getBrowsers();
				$regb = $devb[$keyb];//echo $regb.'</b>';
				if ($md->match($regb, null) && !$this->is_bw) {
					$this->is_bw	=	true;
					$this->browser 	= $keyb;
					$this->browserVersion 	= $md->version($keyb);
				}
			}
			
		/**
		* Get Broswer getProperties
		*/
			foreach ($md->getProperties() as $keyp => $valp) {
				$devp = $md->getProperties();
            $regp = $devb[$keyp];
            if ($md->match($regp, null) && !$this->is_tp) {
             $this->is_tp			= true;
			 $this->deviceType 		= $keyp;
			 $this->deviceVersion 	= $md->version($keyp);
            }
			}
		 /**/
            }
        }
          
	}else{
		$ua = $this->getBrowser();
		$this->deviceType ='Desktop';
		$this->device	  = '';
		$this->deviceVersion='';
		$this->browser		=$ua['name'];
		$this->browserVersion=$ua['version'];
		$this->OS			=	$ua['platform'];
		$this->OSVersion	=	$ua['osv'];
	}//desktop

 }
function getSession($page_id,$pagetype){
	$db	=	new DB(PERMISSION);
	$con = $db->connect();
	$md 	=	new MD5Crypt();
	$today 	= 	date('Y-m-d H:i:s');
	if(empty($_COOKIE['visitor']) || $_COOKIE['visitor']==''){	//crete new session user
	/*
	* $device is unique ID support, we must determind every visitor is unique
	*/
		$user 	=	new User();
		$dvc	=	$this->device;	$dvc_v 	=	$this->deviceVersion;
		$dvc_t 	=	$this->deviceType;	$os =	$this->OS;
		$os_v	=	$this->OSVersion;	$br =	$this->browser;	$br_v 	=	$this->browserVersion;
		$device = $dvc.$dvc_v.$dvc_t.$os.$os_v.$br.$br_v;
		mysqli_query($con,"insert into pxsession (device,date,user) values ('$device','$today','$user->id')");
		$sid = mysqli_insert_id($con);
		$cr = $md->encrypt($sid,'visitor');
		//setcookie("visitor", $cr, time()+60*60*24*30, "/"); //expired in 30 days
		setcookie("visitor", $cr, time()+60*60*1, "/"); //expired in 30 days
		echo $cr;
	}else{
		$sid = $md->decrypt($_COOKIE['visitor'],'visitor');
	}	
	$this->setVisitorCounter($page_id,$pagetype,$sid);	//record or update visitor counter
}
/** 
*	record visitor counter, update already record counter
*	every record must be different page, date anda page id
*	@param string $page_id : object page id (article, orcategory,tags, etc)
*	@param string $pagetype	: paget type/name
*	@param int $pxs			: pxsession id
*/
function setVisitorCounter($page_id,$pagetype,$pxs){
	$con = Xcon();
	$dt 	= 	date('Y-m-d');
	/**
	*	check record today for page and page (object) id
	*/
	$counter	=	0;
	$q = mysqli_query($con, "select * from visitor where pxsession='$pxs' and date='$dt' and pagetype='$pagetype' and page='$page_id'");
	while($g = mysqli_fetch_array($q)){
		$counter = $g['counter'];
	}
	if($counter < 1){		
	mysqli_query($con,"insert into visitor (date,device,devicetype,devicename,os,osv,devicev,browser,browserv,page,pagetype,pxsession,counter)
	values ('$dt','$this->device','$this->deviceType','$this->device','$this->OS',
	'$this->OSVersion','$this->deviceVersion','$this->browser','$this->browserVersion','$page_id','$pagetype','$pxs','1')
	");
	}else{
		$counter = $counter+1;
		mysqli_query($con,"update visitor set counter='$counter' where pxsession='$pxs' and date='$dt' and pagetype='$pagetype' and page='$page_id'");
	}
	
}

}
?>