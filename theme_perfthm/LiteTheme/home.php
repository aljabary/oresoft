<?php
/**
LiteTheme  v.2.1.1
@Proxtrasoft v.2.1.1
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary

* this LThome class of LiteTheme, in this class is not exteds Theme or Manager_Plug_handler.
* extend for only Base Class the Plugins or Theme
*/
namespace LiteTheme;
use Prox\System\Site;
use Prox\Engine\Article\Core;
use Prox\Engine\Page;
class LThome {
public $arguments;
public $param ;
public $BC; // Base Class;
private $col_vav;
public function __construct($arg,$param, $bc){
	$this->arguments=$args;$this->param=$param;
	$this->BC = $bc;
}
public function Home(){
	$ac 	=	new Article_Core($this->BC);
	$pc 	= new Page_Core($this->BC);
	$site 	= new Site();
	$pages		= $pc->getlist("all",0,100);
	$curgape	=	0;
	$blog 	=	$ac->getList("on",$curgape, 10);
	$cc 		=	new Category_Core($this->BC);
	$catlist 	=	$cc->getMostUse(0,10);
	//$this->BC->showHook($this->arguments,$this->param,"Admin_Menu",0);
	$this->col_vav	=	$this->BC->Setting->getVal('color','linknav');
	$data = array("BC"=>$this->BC, 'args'=>$this->arguments,
	'param'=>$this->param, "content"=>"bloglist", "blog"=>$blog,
	'colheader'=>$this->BC->Setting->getVal('color','header'),
	'colfooter'=>$this->BC->Setting->getVal('color','footer'),
	'colbutton'=>$this->BC->Setting->getVal('color','button'),
	'collabel'=>$this->BC->Setting->getVal('color','label'),
	'collinknav'=>$this->col_vav,
	'facebook'=>$this->BC->Setting->getVal('social','facebook'),
	'googleplus'=>$this->BC->Setting->getVal('social','googlplus'),
	'twitter'=>$this->BC->Setting->getVal('social','twitter'),
	'sizelogo'=>'height:'.$this->BC->Setting->getVal('logo','_h').'px;width: '.$this->BC->Setting->getVal('logo','_w').'px;margin-top: '.$this->BC->Setting->getVal('logo','_m').'px;',
	'home'=>$this, 'pages'=>$pages, 'pc'=>$pc,
	'site'=>$site,
	'view_title'=>$site->name.' | '.$site->headline,
	'view_keyword'=>$site->keyword,
	'view_description'=>$site->headline,
	'view_type'=>'website',
	'view_url'=>PROX_URL,
	'view_image'=>$site->logo,
	'curpg'=>$curgape,
	'cookie'=>$this->param['cookie'],
	'slug'=>'p', 'w_catlist'=>true, 'catlist'=>$catlist
	);
	$this->BC->View->Show("home",$data);
}
public function Read(){
	$ac 		=	new Article_Core($this->BC);
	$blog 		=	new Article($this->param[1]);
	$pc			= 	new Page_Core($this->BC);
	$bloglstest	=	$ac->getList("on",0, 10);
	$site 		= 	new Site();
	$im 			=	new User();
	$pages		= 	$pc->getlist("all",0,100);	
	$cc 		=	new Category_Core($this->BC);
	$catlist 	=	$cc->getMostUse(0,10);
	//$this->BC->showHook($this->arguments,$this->param,"Admin_Menu",0);
	$this->col_vav	=	$this->BC->Setting->getVal('color','linknav');
	$data = array("BC"=>$this->BC, 'args'=>$this->arguments,
	'param'=>$this->param, "content"=>"blogread", "blog_single"=>$blog,
	'colheader'=>$this->BC->Setting->getVal('color','header'),
	'colfooter'=>$this->BC->Setting->getVal('color','footer'),
	'colbutton'=>$this->BC->Setting->getVal('color','button'),
	'collabel'=>$this->BC->Setting->getVal('color','label'),
	'collinknav'=>$this->col_vav,
	'facebook'=>$this->BC->Setting->getVal('social','facebook'),
	'googleplus'=>$this->BC->Setting->getVal('social','googlplus'),
	'twitter'=>$this->BC->Setting->getVal('social','twitter'),
	'sizelogo'=>'height:'.$this->BC->Setting->getVal('logo','_h').'px;width: '.$this->BC->Setting->getVal('logo','_w').'px;margin-top: '.$this->BC->Setting->getVal('logo','_m').'px;',
	'home'=>$this, 'pages'=>$pages, 'pc'=>$pc, 'site'=>$site,
	'view_title'=>$blog->title.' | '.$site->name,
	'view_keyword'=>$blog->keyword,
	'view_description'=>$blog->headline,
	'view_type'=>'article',
	'view_url'=>$blog->url,
	'web_image'=>$blog->Photo->Source,
	'w_tag'=>true,
	'w_lastest'=>true,
	'blog_lastest'=>$bloglstest,
	'w_catlist'=>true, 'catlist'=>$catlist,
	'cookie'=>$this->param['cookie'],
	'im'=>$im,
	'comcore'=>new Comment_Core($this->BC)
	);
	$this->BC->View->Show("home",$data);
}


public function Page(){
	$ac 		=	new Article_Core($this->BC);
	$pageobj 	=	new Page(0,$this->BC);
	$pageobj->getBySlug($this->param[0]);	
	$pc 		= new Page_Core($this->BC);
	$site 		= new Site();
	$pages		= $pc->getlist("all",0,100);	
	$cc 		=	new Category_Core($this->BC);
	$catlist 	=	$cc->getMostUse(0,10);
	$bloglstest	=	$ac->getList("on",0, 10);
	$curgape	=	0;
	if(!empty($this->param[1]))	$curgape	=	$this->param[1] - 1;
	$ctn		=	"page.static";
	if($pageobj->type=='dinamic'){
	$cc 		= 	new Category_Core($this->BC);
	$blog 		=	$cc->getArticle($pageobj->Category, $curgape, 100);
	$cb 		=	$cc->countArticle($pageobj->Category);
	$ctn		=	"bloglist";
	}
	
	//$this->BC->showHook($this->arguments,$this->param,"Admin_Menu",0);
	$this->col_vav	=	$this->BC->Setting->getVal('color','linknav');
	$data = array("BC"=>$this->BC, 'args'=>$this->arguments,
	'param'=>$this->param, "content"=>$ctn, "blog"=>$blog,
	'colheader'=>$this->BC->Setting->getVal('color','header'),
	'colfooter'=>$this->BC->Setting->getVal('color','footer'),
	'colbutton'=>$this->BC->Setting->getVal('color','button'),
	'collabel'=>$this->BC->Setting->getVal('color','label'),
	'collinknav'=>$this->col_vav,
	'facebook'=>$this->BC->Setting->getVal('social','facebook'),
	'googleplus'=>$this->BC->Setting->getVal('social','googlplus'),
	'twitter'=>$this->BC->Setting->getVal('social','twitter'),
	'sizelogo'=>'height:'.$this->BC->Setting->getVal('logo','_h').'px;width: '.$this->BC->Setting->getVal('logo','_w').'px;margin-top: '.$this->BC->Setting->getVal('logo','_m').'px;',
	'home'=>$this, 'pages'=>$pages, 'pc'=>$pc, 'site'=>$site,
	'view_title'=>$pageobj->name.' | '.$site->name,
	'view_keyword'=>$pageobj->keyword,
	'view_description'=>$pageobj->description,
	'view_type'=>'article',
	'web_image'=>$site->logo,
	'view_url'=>$pageobj->url,
	'pageobj'=>$pageobj,
	'pg'=>$curgape,	'curpg'=>$curgape,
	'slug'=>$pageobj->slug,
	'w_lastest'=>true,
	'blog_lastest'=>$bloglstest,
	'w_catlist'=>true, 'catlist'=>$catlist,
	'cookie'=>$this->param['cookie']
	);
	$this->BC->View->Show("home",$data);
}
public function CustomRouting(){
	/**
	* when url is example.com/p/{page_index}
	*/
	if($this->param[0] =='p'){
	$this->NextPage($this->param[1]);	
	}
}
/**
* @param int $pi : Page Index
*/
public function NextPage($pi){
	// $pi = 1 is same $pi =0, number page is 1 and page index is 0 ($pi - 1)
	$ac 	=	new Article_Core($this->BC);
	$pc = new Page_Core($this->BC);
	$site = new Site();
	$pages		= $pc->getlist("all",0,100);
	
	$curgape	=	$pi - 1; 							//current page index
	$blog 	=	$ac->getList("on",$curgape, 10);			// get list article by page index
	//$this->BC->showHook($this->arguments,$this->param,"Admin_Menu",0);
	$this->col_vav	=	$this->BC->Setting->getVal('color','linknav');
	$data = array("BC"=>$this->BC, 'args'=>$this->arguments,
	'param'=>$this->param, "content"=>"bloglist", "blog"=>$blog,
	'colheader'=>$this->BC->Setting->getVal('color','header'),
	'colfooter'=>$this->BC->Setting->getVal('color','footer'),
	'colbutton'=>$this->BC->Setting->getVal('color','button'),
	'collabel'=>$this->BC->Setting->getVal('color','label'),
	'collinknav'=>$this->col_vav,
	'facebook'=>$this->BC->Setting->getVal('social','facebook'),
	'googleplus'=>$this->BC->Setting->getVal('social','googlplus'),
	'twitter'=>$this->BC->Setting->getVal('social','twitter'),
	'sizelogo'=>'height:'.$this->BC->Setting->getVal('logo','_h').'px;width: '.$this->BC->Setting->getVal('logo','_w').'px;margin-top: '.$this->BC->Setting->getVal('logo','_m').'px;',
	'home'=>$this, 'pages'=>$pages, 'pc'=>$pc,
	'site'=>$site,
	'view_title'=>$site->name.' | '.$site->headline,
	'view_keyword'=>$site->keyword,
	'view_description'=>$site->headline,
	'view_type'=>'website',
	'view_url'=>PROX_URL,
	'web_image'=>$site->logo,
	'pg'=>$curgape,	'curgape'=>$curgape,
	'slug'=>'p',
	'cookie'=>$this->param['cookie']
	);
	$this->BC->View->Show("home",$data);
}

public function Category(){
	$ac 		=	new Article_Core($this->BC);
	$category	= $this->param['Category'];
	$pc 		= new Page_Core($this->BC);
	$site 		= new Site();
	$pages		= $pc->getlist("all",0,100);	
	$cc 		=	new Category_Core($this->BC);
	$catlist 	=	$cc->getMostUse(0,10);
	$bloglstest	=	$ac->getList("on",0, 10);
	$curgape	=	0;
	if(!empty($this->param[2]))	$curgape	=	$this->param[2] - 1;

	$blog 		=	$cc->getArticle($category, $curgape, 10);
	$cb 		=	$cc->countArticle($category);
	$ctn		=	"bloglist";
	
	$slug		=	str_replace(PROX_URL."category/",'',$category->url);
//	$this->BC->showHook($this->arguments,$this->param,"Admin_Menu",0);
	$this->col_vav	=	$this->BC->Setting->getVal('color','linknav');
	$data = array("BC"=>$this->BC, 'args'=>$this->arguments,
	'param'=>$this->param, "content"=>$ctn, "blog"=>$blog,
	'colheader'=>$this->BC->Setting->getVal('color','header'),
	'colfooter'=>$this->BC->Setting->getVal('color','footer'),
	'colbutton'=>$this->BC->Setting->getVal('color','button'),
	'collabel'=>$this->BC->Setting->getVal('color','label'),
	'collinknav'=>$this->col_vav,
	'facebook'=>$this->BC->Setting->getVal('social','facebook'),
	'googleplus'=>$this->BC->Setting->getVal('social','googlplus'),
	'twitter'=>$this->BC->Setting->getVal('social','twitter'),
	'sizelogo'=>'height:'.$this->BC->Setting->getVal('logo','_h').'px;width: '.$this->BC->Setting->getVal('logo','_w').'px;margin-top: '.$this->BC->Setting->getVal('logo','_m').'px;',
	'home'=>$this, 'pages'=>$pages, 'pc'=>$pc, 'site'=>$site,
	'view_title'=>$category->name.' | '.$site->name,
	'view_keyword'=>$category->keyword,
	'view_description'=>$category->description,
	'view_type'=>'article',
	'view_url'=>$category->url,
	'pageobj'=>$category,
	'pg'=>$curgape,	'curpg'=>$curgape,
	'slug'=>'category/'.$slug,
	'w_lastest'=>true,
	'web_image'=>$site->logo,
	'blog_lastest'=>$bloglstest,
	'w_catlist'=>true, 'catlist'=>$catlist,
	'cookie'=>$this->param['cookie']
	);
	$this->BC->View->Show("home",$data);
}

public function Tag(){
	
	$ac 		=	new Article_Core($this->BC);
	$tag 		=	$this->param['Tag'];
	$pc 		= new Page_Core($this->BC);
	$site 		= new Site();
	$pages		= $pc->getlist("all",0,100);	
	$cc 		=	new Category_Core($this->BC);
	$catlist 	=	$cc->getMostUse(0,10);
	$bloglstest	=	$ac->getList("on",0, 10);
	$curgape	=	0;
	if(!empty($this->param[2]))	$curgape	=	$this->param[2] - 1;

	$blog 		=	$ac->getListByTag($tag, $curgape, 10);
	$ctn		=	"bloglist";
	
//	$this->BC->showHook($this->arguments,$this->param,"Admin_Menu",0);
	$this->col_vav	=	$this->BC->Setting->getVal('color','linknav');
	$data = array("BC"=>$this->BC, 'args'=>$this->arguments,
	'param'=>$this->param, "content"=>$ctn, "blog"=>$blog,
	'colheader'=>$this->BC->Setting->getVal('color','header'),
	'colfooter'=>$this->BC->Setting->getVal('color','footer'),
	'colbutton'=>$this->BC->Setting->getVal('color','button'),
	'collabel'=>$this->BC->Setting->getVal('color','label'),
	'collinknav'=>$this->col_vav,
	'facebook'=>$this->BC->Setting->getVal('social','facebook'),
	'googleplus'=>$this->BC->Setting->getVal('social','googlplus'),
	'twitter'=>$this->BC->Setting->getVal('social','twitter'),
	'sizelogo'=>'height:'.$this->BC->Setting->getVal('logo','_h').'px;width: '.$this->BC->Setting->getVal('logo','_w').'px;margin-top: '.$this->BC->Setting->getVal('logo','_m').'px;',
	'home'=>$this, 'pages'=>$pages, 'pc'=>$pc, 'site'=>$site,
	'view_title'=>$tag.' | '.$site->name,
	'view_keyword'=>$category->keyword,
	'view_description'=>$category->description,
	'view_type'=>'article',
	'view_url'=>PROX_URL.'tag/'.$tag,
	'web_image'=>$site->logo,
	'pg'=>$curgape,	'curpg'=>$curgape,
	'slug'=>'tag/'.$tag,
	'w_lastest'=>true,
	'blog_lastest'=>$bloglstest,
	'w_catlist'=>true, 'catlist'=>$catlist,
	'cookie'=>$this->param['cookie']
	);
	$this->BC->View->Show("home",$data);	
}
public function Contact(){	
	if($_POST){
		$name 	= $_POST['nm'];
		$email 	= $_POST['email'];
		$title 	= $_POST['title'];
		$msg 	= $_POST['content'];
		if($name !='' && $email!='' && $msg!=''){
			$mcc	=	new Message_Core($this->BC);
			$data = array(
			'title'=>$name.' | '.$title,
			'content'=>$msg,
			'email'=>$email,
			'type'=>'contact'
			);
			$mid =	$mcc->createConversation(new User(),array('all'),$email);
			$mcc->Create($data, new User(),$mid);
			//header("location:".PROX_URL."contact/?msg=oke");
		}else{
			header("location:".PROX_URL."contact/?msg=error");
		}
	}
	$pc 		= new Page_Core($this->BC);
	$ac 		=	new Article_Core($this->BC);
	$site 		= new Site();	
	$cc 		=	new Category_Core($this->BC);
	$catlist 	=	$cc->getMostUse(0,10);
	$bloglstest	=	$ac->getList("on",0, 10);
	$curgape	=	0;
	if(!empty($this->param[2]))	$curgape	=	$this->param[2] - 1;
	$ctn		=	"contact";
	$info		=	$this->BC->View->getTemplate("setting.json");
	$info		=	json_decode($info);
	
	//$this->BC->showHook($this->arguments,$this->param,"Admin_Menu",0);
	$this->col_vav	=	$this->BC->Setting->getVal('color','linknav');
	$data = array("BC"=>$this->BC, 'args'=>$this->arguments,
	'param'=>$this->param, "content"=>$ctn, 
	'colheader'=>$this->BC->Setting->getVal('color','header'),
	'colfooter'=>$this->BC->Setting->getVal('color','footer'),
	'colbutton'=>$this->BC->Setting->getVal('color','button'),
	'collabel'=>$this->BC->Setting->getVal('color','label'),
	'collinknav'=>$this->col_vav,
	'facebook'=>$this->BC->Setting->getVal('social','facebook'),
	'googleplus'=>$this->BC->Setting->getVal('social','googlplus'),
	'twitter'=>$this->BC->Setting->getVal('social','twitter'),
	'sizelogo'=>'height:'.$this->BC->Setting->getVal('logo','_h').'px;width: '.$this->BC->Setting->getVal('logo','_w').'px;margin-top: '.$this->BC->Setting->getVal('logo','_m').'px;',
	'home'=>$this,'pc'=>$pc, 'site'=>$site,
	'view_title'=>'Contact Us | '.$site->name.' | '.$site->headline,
	'view_keyword'=>$site->keyword,
	'view_description'=>$site->headline,
	'view_type'=>'website',
	'view_url'=>PROX_URL,
	'view_image'=>$site->logo,
	'pg'=>$curgape,	'curpg'=>$curgape,
	'w_lastest'=>true,
	'blog_lastest'=>$bloglstest,
	'w_catlist'=>true, 'catlist'=>$catlist,
	'cookie'=>$this->param['cookie'],
	'info_about'=>$info->info_about,
	'info_title'=>$info->title
	);
	$this->BC->View->Show("home",$data);	
}
}

?>