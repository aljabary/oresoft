<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title><?php echo $view_title; ?></title>
    <meta name="keywords" content="<?php echo $site->keyword; ?>" />
    <meta name="description" content="<?php echo $site->description; ?>">
    <meta name="author" content="<?php echo $site->name; ?>">    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $site->icon; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $site->icon; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $site->icon; ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $site->icon; ?>">
    <link rel="shortcut icon" href="<?php echo $site->icon; ?>">
    <!-- CSS -->
       
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="<?php echo PROX_URL; ?>temp/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo PROX_URL; ?>temp/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="<?php echo PROX_URL; ?>temp/css/font-awesome-ie7.min.css"><![endif]-->
    <link href="<?php echo PROX_URL; ?>temp/css/font-entypo.css" rel="stylesheet" type="text/css">    

    <!-- Fonts CSS -->
    <link href="<?php echo PROX_URL; ?>temp/css/fonts.css"  rel="stylesheet" type="text/css">
               
    <!-- Plugin CSS -->
    <link href="<?php echo PROX_URL; ?>temp/plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo PROX_URL; ?>temp/plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="<?php echo PROX_URL; ?>temp/plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="<?php echo PROX_URL; ?>temp/plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
	<link href="<?php echo PROX_URL; ?>temp/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 
   
         
    <link href="<?php echo PROX_URL; ?>temp/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="<?php echo PROX_URL; ?>temp/plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo PROX_URL; ?>temp/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo PROX_URL; ?>temp/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo PROX_URL; ?>temp/plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">            

	<!-- Specific CSS -->
	    
     
    <!-- Theme CSS -->
    <link href="<?php echo PROX_URL; ?>temp/css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="<?php echo PROX_URL; ?>temp/css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="<?php echo PROX_URL; ?>temp/css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->            
    <!-- Responsive CSS -->
        	<link href="<?php echo PROX_URL; ?>temp/css/theme-responsive.min.css" rel="stylesheet" type="text/css"> 
 
    <!-- for specific page in style css PLUGINS-->
        <?php //$this->Plugins_Manager->($plugins_arg,$this->routing,'Header_Meta',$this->plug);
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'Header_Meta');		?> 
    <!-- for specific page responsive in style css -->      
    
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/jquery.js"></script> 
    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/modernizr.js"></script> 
    <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/mobile-detect.min.js"></script> 
    <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/mobile-detect-modernizr.js"></script> 
 <script>var base_url = "<?php echo PROX_URL; ?>";</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/html5shiv.js"></script>
      <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/respond.min.js"></script>     
    <![endif]-->
    
</head>    

<body id="ui" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed  responsive  clearfix breakpoint-975" data-active="ui " data-smooth-scrolling="1">   
     <?php 
$this->Plugins_Manager->call_action('tools',$plugins_arg,$this->routing,'Body_Before'); ?> 
   
 <div class="vd_body">
<!-- Header Start -->
  <header class="header-3" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container vd_bg-white light-top-menu menu-search-style-2">
          <div class="vd_top-nav vd_nav-width  vd_bg-white panel-menu-style-2">
          <div class="vd_panel-header">
          	<div class="logo">
            	<a href="<?php echo PROX_URL_ADMIN; ?>admin"><img alt="logo" src="<?php echo $site->icon; ?>" style="width: 55px;height: 55px; margin-top: -12px;"></a>
            </div>
            <!-- logo -->
            <div class="vd_panel-menu  hidden-sm hidden-xs" style="position:relative">
            		            		                    
                	<span class="nav-small-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Small Nav Toggle" data-action="nav-left-small">
	                    <i class="fa fa-ellipsis-v"></i>
                    </span> 
                                       
            </div>
            <div class="vd_panel-menu left-pos visible-sm visible-xs">
                     
                        <span class="menu" data-action="toggle-navbar-left">
                            <i class="fa fa-ellipsis-v"></i>
                        </span>  
                                      
            </div>
            <div class="vd_panel-menu ">
                	<span class="menu visible-xs" data-action="submenu">
	                    <i class="fa fa-bars"></i>
                    </span>  
                                 
                        <span class="menu " data-action="toggle-navbar-right">
                            <i class="fa fa-chevron-right"></i>
                        </span>                   
                     
            </div>                                     
            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->
            
          </div>    
          <div class="vd_container">
          	<div class="row">
            	<div class="col-sm-5 col-xs-12">
            		
<div class="vd_menu-search">
  <form id="search-box" method="post" action="#">
    <input type="text" name="search" class="vd_menu-search-text width-60" placeholder="Search">
    <div class="vd_menu-search-category"> <span data-action="click-trigger"> <span class="separator"></span> <span class="text">Category</span> <span class="icon"> <i class="fa fa-caret-down"></i></span> </span>
      <div class="vd_mega-menu-content width-xs-2 center-xs-2 right-sm" data-action="click-target">
        <div class="child-menu">
          <div class="content-list content-menu content">
            <ul class="list-wrapper">
              <li>
                <label>
                  <input type="checkbox" value="all-files">
                  <span>All Files</span></label>
              </li>
              <li>
                <label>
                  <input type="checkbox" value="photos">
                  <span>Photos</span></label>
              </li>
              <li>
                <label>
                  <input type="checkbox" value="illustrations">
                  <span>Illustrations</span></label>
              </li>
              <li>
                <label>
                  <input type="checkbox" value="video">
                  <span>Video</span></label>
              </li>
              <li>
                <label>
                  <input type="checkbox" value="audio">
                  <span>Audio</span></label>
              </li>
              <li>
                <label>
                  <input type="checkbox" value="flash">
                  <span>Flash</span></label>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <span class="vd_menu-search-submit"><i class="fa fa-search"></i> </span>
  </form>
</div>
                </div>
                <div class="col-sm-7 col-xs-12">
              		<div class="vd_mega-menu-wrapper">
                    	<div class="vd_mega-menu pull-right">
            				<ul class="mega-ul">
	
<?php
$this->Plugins_Manager->call_action('tools',$plugins_arg,$this->routing,'Admin_Headericon');
 ?>							
    
    <li id="top-menu-profile" class="profile mega-li"> 
        <a href="#" class="mega-link"  data-action="click-trigger"> 
            <span  class="mega-image">
                <img src="<?php echo $user->photo; ?>"  />               
            </span>
            <span class="mega-name">
                <?php echo $user->name; ?><i class="fa fa-caret-down fa-fw"></i> 
            </span>
        </a> 
      <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
        <div class="child-menu"> 
        	<div class="content-list content-menu">
                <ul class="list-wrapper pd-lr-10">
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-trophy"></i></div> <div class="menu-text">My Achievements</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-envelope"></i></div> <div class="menu-text">Messages</div><div class="menu-badge"><div class="badge vd_bg-red">10</div></div> </a>  </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-tasks
"></i></div> <div class="menu-text"> Tasks</div><div class="menu-badge"><div class="badge vd_bg-red">5</div></div> </a> </li> 
                    <li class="line"></li>                
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-lock
"></i></div> <div class="menu-text">Privacy</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-cogs"></i></div> <div class="menu-text">Settings</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class="  fa fa-key"></i></div> <div class="menu-text">Lock</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a> </li>
                    <li class="line"></li>                
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-question-circle"></i></div> <div class="menu-text">Help</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" glyphicon glyphicon-bullhorn"></i></div> <div class="menu-text">Report a Problem</div> </a> </li>              
                </ul>
            </div> 
        </div> 
      </div>     
  
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
  <!-- Header Ends --> 
<div class="content">
  <div class="container">
    <div class="vd_navbar vd_nav-width vd_navbar-tabs-menu vd_navbar-left vd_bg-facebook">
	<div class="navbar-menu clearfix">
        <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu">
                <i class="fa fa-sort-amount-asc"></i>
            </span>                   
        </div>
    	<h3 class="menu-title hide-nav-medium hide-nav-small"><?php echo BCL('px','panel_menu'); ?></h3>
        <div class="vd_menu">
			 <ul>
    <li>
    	<a href="<?php echo PROX_URL_ADMIN; ?>">
        	<span class="menu-icon"><i class="fa fa-dashboard"></i></span> 
            <span class="menu-text">Dashboard</span>  
            </a>
    </li>
<?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'Admin_Menu');

 ?>		
 	<li>
    	<a href="<?php echo PROX_URL_ADMIN."/plugins/"?>">
        	<span class="menu-icon"><i class="fa fa-cubes"></i></span> 
            <span class="menu-text">Aplikasi</span>  
          
       	</a> 
    </li>
    <li>
    	<a href="functions-index.html">
        	<span class="menu-icon"><i class="fa fa-code"></i></span> 
            <span class="menu-text">Custom Functions</span>  
            <span class="menu-badge"><span class="badge vd_bg-yellow"><i class="fa fa-star"></i></span></span>
       	</a>
    </li>    
               
</ul>
<!-- Head menu search form ends -->         </div>             
    </div>
    <div class="navbar-spacing clearfix">
    </div>
    <div class="vd_menu vd_navbar-bottom-widget">
        <ul>
            <li>
                <a href="pages-logout.html">
                    <span class="menu-icon"><i class="fa fa-sign-out"></i></span>          
                    <span class="menu-text">Logout</span>             
                </a>
                
            </li>
        </ul>
    </div>     
</div>    <div class="vd_navbar vd_nav-width vd_navbar-chat vd_bg-black-80 vd_navbar-right   ">
	<div class="navbar-menu clearfix">
        <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu">
                <i class="fa fa-sort-amount-asc"></i>
            </span>                   
        </div>
    	<h3 class="menu-title hide-nav-medium hide-nav-small"><?php echo BCL('px','panel_menu'); ?></h3>
        <div class="vd_menu">
			 <ul>
<?php
$this->Plugins_Manager->call_action('tools',$plugins_arg,$this->routing,'Admin_Menu_Right');

 ?>	         
</ul>
<!-- Head menu search form ends -->         </div>             
    </div>
    <div class="navbar-spacing clearfix">
    </div>
    <div class="vd_menu vd_navbar-bottom-widget">
        <ul>
            <li>
                <a href="pages-logout.html">
                    <span class="menu-icon"><i class="fa fa-sign-out"></i></span>          
                    <span class="menu-text">Logout</span>             
                </a>
                
            </li>
        </ul>
    </div>  
</div>  