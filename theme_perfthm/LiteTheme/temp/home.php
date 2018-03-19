<?php
/**
LiteTheme v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteTheme : Base Class
* data-tempa = LiteCate-Editor : Base Class-Template hook name
*/
?><!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title><?php $site =$data['site'];echo $data['view_title']; ?></title>
    <meta name="keywords" content="<?php echo $data['view_keyword']; ?>" />
    <meta name="description" content="<?php echo $data['view_description']; ?>">
    <meta name="author" content="<?php echo $site->name; ?>">
    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Language" content="id" />
	<meta name="googlebot-news" content="index,follow" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="index, follow" />
	<meta content="id" name="language">
	<meta name="news_keywords" content="<?php echo $data['view_keyword']; ?>">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="shortcut icon" href="<?php echo $site->icon; ?>">


	<!-- facebook META -->
	<meta property="fb:app_id" content="170780559978197"/>
	<meta property="og:site_name" content="<?php echo $site->name; ?>">
	<meta property="og:title" content="<?php echo $view_title; ?>">
	<meta property="og:url" content="<?php if(empty($data['view_url'])){echo PROX_URL;}else{ echo $data['view_url']; }?>">
	<meta property="og:description" content="<?php echo $view_description; ?>">
	<meta property="og:image" content="<?php echo $data['view_image']; ?>">
    <meta name="author" content="<?php echo $site->name; ?>">	
	<meta property="fb:pages" content="1210345702338575" />
    <meta content="<?php echo $data['view_type']; ?>" property="og:type">
	<!--twitter cards -->
	<meta name="twitter:card" content="app">
	<meta name="twitter:site" content="@empat5">
	<meta name="twitter:description" content="<?php echo $data['view_description']; ?>">
	<meta name="twitter:app:country" content="ID">
    
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $site->icon; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $site->icon; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $site->icon; ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $site->icon; ?>">
    <link rel="shortcut icon" href="<?php echo $site->icon; ?>">
    
    
    <!-- CSS -->
       
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="<?php echo TEMP; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo TEMP; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="<?php echo TEMP; ?>/css/font-awesome-ie7.min.css"><![endif]-->
    <link href="<?php echo TEMP; ?>/css/font-entypo.css" rel="stylesheet" type="text/css">    

    <!-- Fonts CSS -->
    <link href="<?php echo TEMP; ?>/css/fonts.css"  rel="stylesheet" type="text/css">
               
    <!-- Plugin CSS -->
    <link href="<?php echo TEMP; ?>/plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo TEMP; ?>/plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="<?php echo TEMP; ?>/plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="<?php echo TEMP; ?>/plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
	<link href="<?php echo TEMP; ?>/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 
   
         
    <link href="<?php echo TEMP; ?>/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="<?php echo TEMP; ?>/plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo TEMP; ?>/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo TEMP; ?>/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo TEMP; ?>/plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">            

	<!-- Specific CSS -->
	    
     
    <!-- Theme CSS -->
    <link href="<?php echo TEMP; ?>/css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="<?php echo TEMP; ?>/css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="<?php echo TEMP; ?>/css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->            
    <!-- Responsive CSS -->
        	<link href="<?php echo TEMP; ?>/css/theme-responsive.min.css" rel="stylesheet" type="text/css"> 
 
    <!-- for specific page in style css PLUGINS-->
        <?php 
/**
* Load Plugin Hook Header Meta
* for style and script
*/
$Me->showHook($data['args'],$data['param'],'Header_Meta',0);
		?> 
    <!-- for specific page responsive in style css -->      
    
<script type="text/javascript" src="<?php echo TEMP; ?>/js/jquery.js"></script> 
    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="<?php echo TEMP; ?>/js/modernizr.js"></script> 
    <script type="text/javascript" src="<?php echo TEMP; ?>/js/mobile-detect.min.js"></script> 
    <script type="text/javascript" src="<?php echo TEMP; ?>/js/mobile-detect-modernizr.js"></script> 
 <script>var base_url = "<?php echo PROX_URL; ?>";</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo TEMP; ?>/js/html5shiv.js"></script>
      <script type="text/javascript" src="<?php echo TEMP; ?>/js/respond.min.js"></script>     
    <![endif]-->    
</head>    
<body id="login-page" class="middle-layout no-nav-left no-nav-right  nav-top-fixed background-login     responsive remove-navbar front-layout   clearfix" data-active="login-page "  data-smooth-scrolling="1">     
<div class="vd_body">
<?php $Me->showHook($data['args'],$data['param'],'Body_Before',0);?>
<!-- Header Start -->
  <header class="header-2" id="header">
      <div class="vd_top-menu-wrapper vd_bg-<?php echo $data['colheader'];?> ">
        <div class="container">
          <div class="vd_top-nav vd_nav-width  ">
          <div class="vd_panel-header">
          	<div class="logo">
            	<a href="<?php echo PROX_URL; ?>" title="<?php echo $site->name; ?>"><img alt="<?php echo $site->name; ?>" src="<?php echo $site->logo; ?>" style="<?php echo $data['sizelogo'];?>"></a>
            </div>
            <!-- logo -->
            <div class="vd_panel-menu visible-sm visible-xs">
                	<span class="menu visible-xs" data-action="submenu">
	                    <i class="fa fa-bars"></i>
                    </span>                                 
            </div>                                     
            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->
            
          </div>    
          <div class="vd_container">
          	<div class="row">
            	<div class="col-sm-8 col-xs-12">
              		<div class="vd_mega-menu-wrapper horizontal-menu">
                    	<div class="vd_mega-menu">                
            				<ul class="mega-ul nav">   
	<?php $pc = $data['pc']; $pg_par = $pc->getlist("0",0,100);
	$home = $data['home'];
	$ipr =count($pg_par);
for($ipr ;$ipr>0;$ipr--){
	$page = $pg_par[$ipr-1];
	$pchild = $pc->getChild($page);
	$cpc =count($pchild)
	?>						
    <li class="hover-trigger mega-li "> 
        <a href="<?php echo $page->url; ?>" class="mega-link" <?php if($cpc >0){?>data-action="click-trigger" <?php }?>> 
            <span class="menu-text"><?php echo $page->name; ?></span>  <?php if($cpc >0){?><i class="fa fa-caret-down prepend-icon"></i><?php } ?>	
        </a> 
		<?php if($cpc >0){?>
          <div class="vd_mega-menu-content  width-xs-2  right-xs hover-target no-top" data-action="click-target">
            <div class="child-menu"> 
                <div class="content-list content-menu">
				<ul class="list-wrapper pd-lr-10">
				<?php for($ipc =0;$ipc<$cpc;$ipc++){
	$pagech = $pchild[$ipc];
	?>			
		<li><a href="<?php echo $pagech->url; ?>" > 
            <span class="menu-text"><?php echo $pagech->name; ?></span> 
        </a> </li>	         
<?php } ?>	
</ul>       </div> 
            </div> 
          </div>
<?php } ?>	              
    </li>
<?php } ?>	
</ul>
<!-- Head menu search form ends -->                         </div>
                    </div>                    
                </div>
                <div class="col-sm-4 col-xs-12">
              		<div class="vd_mega-menu-wrapper">
                    	<div class="vd_mega-menu pull-right">
            				<ul class="mega-ul">
    <li id="top-menu-1" class="one-icon mega-li"> 
		<a href="pages-login.html" class="btn vd_btn vd_bg-yellow font-semibold">Login</a>	
    </li>
    <li id="top-menu-2" class="one-icon mega-li"> 
		<a href="pages-register.html" class="btn vd_btn  vd_bg-yellow font-semibold">Register</a>	
    </li>

</ul>
<!-- Head menu search form ends -->                         
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
        <!-- container --> 
      </div>
      <!-- vd_primary-menu-wrapper --> 

  </header>
  
  <div class="content">
  <div class="clearfix pd-20" >
  <?php if(!empty($data['pageobj'])){?>    
<div class="vd_title-section clearfix">
  <div class="vd_panel-header">
              <h1><?php echo $data['pageobj']->name;?></h1>
            </div>  </div>
  <?php } ?>	
    <div class="container">	  
      <div class="vd_content clearfix">
	  <div class="col-md-12">  
<?php $Me->showHook($data['args'],$data['param'],'Body',0);?></div>
        <div class="row mgtp-20">
       <?php $Me->View->Show($data['content'],$data); ?>
	     <?php $Me->View->Show("widget",$data); ?>
	   </div>
       </div>
       </div>
       </div>
       </div>
	   

       <?php $Me->View->Show("footer",$data);
if(empty($data["cookie"])){
	   ?>	   
       </div>
	   <div class="modal-dialog wcookie" style="background: none repeat scroll 0 0;
    bottom: -10px;
    color: #FFFFFF;
    font-size: 16px;
    position: fixed;
    text-decoration: none;
    width: 100%;margin:0px;
    z-index: 9999;">
                      <div class="modal-content">
                        <div class="modal-header vd_bg-<?php echo $data['colheader'];?> vd_white">
                          <h4 class="modal-title" >Cookie</h4>
                        </div>
                        <div class="modal-body vd_black"> 
                        	This website use cookie, by continue it mean you are agree.                        
                        </div>
                        <div class="modal-footer background-login">
                          <button type="button" onclick="$('.wcookie').remove();" class="btn vd_btn vd_bg-green">Got it</button>
                        </div>
                      </div>
                      <!-- /.modal-content --> 
                    </div>
<!-- /.modal-dialog --> <?php } ?>
                 