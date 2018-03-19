<?php
/**
@Admin Controller Class
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
This controller for backend
**/

class Admin_Controller extends baseController {

public function index() 
{
	$this->checklogin();
	$pm 	=	new Plugins_Core(new DB(PERMISSION));
	$pm->init('tools'); //load class source of plugins
	$das	=	new Dashboard();
	$das->Plugins_Manager = $pm;
	$das->show();
}
public function settings() 
{
	$das	=	new Dashboard();
	$menu 	= $this->session();
	$das->menu_app = $menu;
	$das->settings(); 
}

public function credit() 
{
	$das	=	new Dashboard();
	$menu 	= $this->session();
	$das->menu_app = $menu;
	$das->credit(); 
}

function submits()
{
	$das	=	new Article_Core();
	$menu = $this->session();
	$das->menu_app = $menu;
	$das->newpost('new',''); 
}

function category(){
	$menu = $this->session();
	$das	=	new Category_Core();
	$das->menu_app = $menu;
	$das->category(); 
}
function message(){
	$menu = $this->session();
	$das	=	new Message_Core();
	$das->menu_app = $menu;
	$rt	=	explode('/',$_GET['rt']);
	$das->read($rt[2]); 
}



function posting(){
	$this->session();
	$das	=	new Dashboard();
	$menu = $this->session();
	$das->menu_app = $menu;
	$das->blog_editor('new',''); 
}
function plugins(){
	$menu = $this->session();
	$rt	=	explode('/',$_GET['rt']);
	$das	=	new Plugins_Core(new DB(PERMISSION));
	$das->menu_app = $menu;
	if(empty($rt[2])){
	
	$das->pluglist(''); 
	}else{
	$plug = new Plugins($rt[3]);
	$cls = $plug->classname;
	$plugs	=	new $cls();
	$das->settings($plugs); 
	}
}
function install(){
	$menu = $this->session();
	$rt	=	explode('/',$_GET['rt']);
	$das	=	new Plugins_Core(new DB(PERMISSION));
	$das->menu_app = $menu;
	
	$das->pluglist($rt[2]); 
	//echo $rt[2];
}
function preinstall(){
	$menu = $this->session();
	$rt	=	explode('/',$_GET['rt']);
	$das	=	new Plugins_Core();
	$das->menu_app = $menu;
	
	$das->preinstall($rt[2]); 
	//echo $rt[2];
}

function theme(){
	$menu = $this->session();
	$rt	=	explode('/',$_GET['rt']);
	$das	=	new Theme_Core();
	$das->menu_app = $menu;
	if(empty($rt[2])){
	
	$das->themelist(); 
	}else{
	$plug = new $rt[3]();
	$das->settings($plug); 
	}
}
public function login(){	
$site = new Prox\System\Site();
$view_title= lang('login_title').$site->name;
include(PROX_Domain.'/temp/login.php');
}
function editarticle(){
	$menu  = $this->session();
	$das =	new Dashboard();
	$das->menu_app = $menu;
	$das->articlelist(); 
	
}
function soap(){
$json = '{"foo-bar": 12345}';

$obj = json_decode($json);
print $obj->{'foo-bar'};	
}
function addnew(){
	$menu = $this->session();
	$das	=	new Admin_Core();
	$das->menu_app = $menu;
	$das->addnew(); 
	
}
function listadmin(){
	$menu = $this->session();
	$das	=	new Admin_Core();
	$das->menu_app = $menu;
	$das->alladmin(); 
	
}
function session(){
if(!isset($_SESSION['PROX_ADMIN'])){
	//header("location:sup-login.php");
	echo '<script>window.location="'.PROX_URL.'admin/login"</script>';
}else{
		$plug	=	new Plugins_Core(new DB(PERMISSION));
		$adm 	=	new Admin_Core();
		$plug->classhandle = $adm;
		$plug->load('admin', '');
		$c = $adm->menusize;
		$menu_app = array();
		$menu_media = array();
		$menu_page = array();
		$menu_article = array();
		$menu_parent = array();
		$menu = array();
		
		for($i=0;$i<=$c;$i++){
			switch($adm->parent[$i]){
				case 'app':array_push($menu_app,array( //array
							'menu'=>$adm->menu[$i],
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
				case 'media':array_push($menu_media,array( //array
							'menu'=>$adm->menu[$i],
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
				case 'page':array_push($menu_page,array( //array
							'menu'=>$adm->menu[$i],
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
				case 'article':array_push($menu_article,array( //array
							'menu'=>$adm->menu[$i],
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
				case 'parent':array_push($menu_parent,array( //array
							'menu'=>$adm->menu[$i],
							'link'=>$adm->link[$i],
							'icon'=>$adm->icon[$i],
							));
				break;
			}
			
			
		
			
		
		}
	$menu =array( //data
		'adm_app'=>$menu_app, 'adm_media'=>$menu_media, 'adm_page'=>$menu_page,
		'adm_article'=>$menu_article, 'adm_parent'=>$menu_parent
				);
		return $menu ;//_app;
		
	
			
}
}
function master(){
	$admin = new Admin();
if($admin->master < 0){
	//header("location:sup-login.php");
	echo '<script>window.location="'.PROX_URL.'admin/login"</script>';
}
}
function profile(){
$menu = $this->session();	
$pro = new Profile_Core(new DB(PERMISSION));
$pro->menu_app = $menu;
$pro->show();
	
}
function media(){
	$menu = $this->session();
	$rt = $_GET['rt'];
	$ex = explode('/', $rt);
	$das	=	new Media_Core();
	$das->menu_app = $menu;
	$das->$ex[2](); 
	
}
function letinstall(){
	$menu = $this->session();
	$rt = $_GET['rt'];
	$ex = explode('/', $rt);
	$das	=	new Plugins_Core();
	$das->menu_app = $menu;
	$das->letinstall($ex[2].'.zip');
	
	
}
function edit(){
	$menu = $this->session();
	$rt = $_GET['rt'];
	$ex = explode('/', $rt);
	$das	=	new Dashboard();
	$das->menu_app = $menu;
	$das->afterpos($ex[2]); 
	
}
function pages(){
	$menu = $this->session();
	$das	=	new Halaman_Core();
	$das->menu_app = $menu;
	$rt = explode('/', $_GET['rt']);
	if(empty($rt['2'])){
	
	$das->daftarhalaman();
	}else{
		$das->$rt['2']($rt['3']);
	}
}
public function checklogin(){
	if(!isset($_SESSION['admin'])){
		header('location:'.PROX_URL.'px-admin/admin/login');
	}
}

function cretekey(){
	$fn = Prox_Domain.'';
	$pcore = new Plugins_Core();
			$pcore->UseLib('RijndaelCore');
			$rij = new RijndaelCore('proxtrasofttechnologyinc','sellupbooster');
			$data = '{
"name":"Test_Package",
"base_class":"Test_Package",
"version":"1.1.0",
"type":"tools",
"info":"{$this->url}temp/about.txt",
"description":"User management, add account, setting account and manage administration web",
"permission":["USER"],
"logo":"logo.png",
"target_version":"0.1.0",
"developer":{
"name":"RockBurst Digital",
"url":"http://oreple.com",
"email":"official@oreple.com",
"email":"official@oreple.com",
"address":"Jl Cileungsi - Jonggol KM 11",
"contact":"+62 857 8196 5049"
},
"license":"../license.txt",
"requirement":{
"apps":[]
},
"price":0
}
';
			$json= $rij->encrypt($data);
			echo $json;	
}
}
?>
