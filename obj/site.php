<?php
/**
*	@Site Class
*	@Proxtrasoft v.2.1.1
*	@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
*	@author		: Abu Zidane Asadudin Shakir Al-Jabary
*	this class is represent of site data and contain informastion website data
**/
namespace Prox\System;
class Site{
	public $name;
	public $headline;
	public $icon;
	public $logo;
	public $lang;
	public $theme;
	public $keyword;
	public $description;
	private $con;
	/**Constructor **/
function __construct(){
	
		$this->con = Xcon(PERMISSION);
		$sql = mysqli_query($this->con,'SELECT * FROM site');
    while($row = mysqli_fetch_array($sql)) {
       $this->name 		= $row['name'];
	   $this->icon 		= $row['icon'];
	   $this->logo 		= $row['logo'];
	   $this->headline 	= $row['headline'];
	   $this->lang 		= $row['lang'];
	   $this->theme 	= $row['theme'];
	   $this->description = $row['description'];
	   $this->keyword 	= $row['keyword'];
    }
}
/**Call information about your website**/
function about(){
		$sql = mysqli_query(Xcon(PERMISSION),'SELECT about FROM site');
    while($row = mysqli_fetch_array($sql)) {
       $about = $row['about'];  
    }
	return $about;
}

/**Call contact information of your website**/
function contact(){
	$sql = mysqli_query($this->con,'SELECT contact FROM site');
    while($row = mysqli_fetch_array($sql)) {
       $contact = $row['contact'];  
    }
	return $contact;
}
	
}
?>
