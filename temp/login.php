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
    <link href="<?php echo PROX_URL; ?>temp/plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
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
<!-- Custom CSS -->
    <link href="custom/custom.css" rel="stylesheet" type="text/css">



    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/modernizr.js"></script> 
    <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/mobile-detect.min.js"></script> 
    <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/mobile-detect-modernizr.js"></script> 
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/html5shiv.js"></script>
      <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/respond.min.js"></script>     
    <![endif]-->
    
</head>    

<body id="pages" class="full-layout no-nav-left no-nav-right  nav-top-fixed background-login     responsive remove-navbar login-layout   clearfix" data-active="pages "  data-smooth-scrolling="1">     
<div class="vd_body">
<!-- Header Start -->

<!-- Header Ends --> 
<div class="content">
  <div class="container"> 
    
    <!-- Middle Content Start -->
    
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_content-section clearfix">
            <div class="vd_login-page">
              <div class="heading clearfix">
                <div class="logo">
                  <h2 class="mgbt-xs-5"><img src="<?php echo $site->logo;?>" alt="logo"></h2>
                </div>
                <h4 class="text-center font-semibold vd_grey"><?php echo BCL('px','login_title').$site->name; ?></h4>
              </div>
              <div class="panel widget">
                <div class="panel-body">
                  <div class="login-icon entypo-icon"> <i class="icon-key"></i> </div>
                  <form class="form-horizontal" method="post" id="login-form" role="form" action="<?php echo PROX_URL; ?>ajax.php">
				  <input type="hidden" name="class" value="Prox\Engine\Admin\Core" />
				   <input type="hidden" name="function" value="auth" />
                  <div class="alert alert-danger vd_hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Error!</strong><p id="ermsg"> <?php echo BCL('px','login_error'); ?> </p></div>
                  <div class="alert alert-success vd_hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong><?php echo BCL('px','login_success'); ?> </strong>. </div>                  
                    <div class="form-group  mgbt-xs-20">
                      <div class="col-md-12">
                        <div class="label-wrapper sr-only">
                          <label class="control-label" for="email">Email</label>
                        </div>
                        <div class="vd_input-wrapper" id="email-input-wrapper"> <span class="menu-icon"> <i class="fa fa-envelope"></i> </span>
                          <input type="email" placeholder="Email" id="email" name="email" class="required" required>
                        </div>
                        <div class="label-wrapper">
                          <label class="control-label sr-only" for="password">Password</label>
                        </div>
                        <div class="vd_input-wrapper" id="password-input-wrapper" > <span class="menu-icon"> <i class="fa fa-lock"></i> </span>
                          <input type="password" placeholder="Password" id="password" name="password" class="required" required>
                        </div>
                      </div>
                    </div>
                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                    <div class="form-group">
                      <div class="col-md-12 text-center mgbt-xs-5">
                        <button class="btn vd_bg-green vd_white width-100" type="submit" id="login-submit"><?php echo BCL('px','login'); ?></button>
                      </div>
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-xs-6">
                            <div class="vd_checkbox">
                              <input type="checkbox" id="checkbox-1" value="1">
                              <label for="checkbox-1"> Remember me</label>
                            </div>
                          </div>
                          <div class="col-xs-6 text-right">
                            <div class=""> <a href="pages-forget-password.html"><?php echo BCL('px','forget_password'); ?> </a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Panel Widget -->
              <div class="register-panel text-center font-semibold"> <a href="pages-register.html"><?php $ca= BCL('px','account_create'); echo strtoupper($ca); ?><span class="menu-icon"><i class="fa fa-angle-double-right fa-fw"></i></span></a> </div>
            </div>
            <!-- vd_login-page --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
    
  </div>
  <!-- .container --> 
</div>
<!-- .content -->

<!-- Footer Start -->
  <footer class="footer-2"  id="footer">      
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright text-center">
                  	Copyright &copy;<?php echo date('Y').' '.$site->name; ?> All Rights Reserved 
                </div>
              </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
  </footer>
<!-- Footer END -->

</div>

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>
<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/jquery.js"></script> 
<!--[if lt IE 9]>
  <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/excanvas.js"></script>      
<![endif]-->
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/bootstrap.min.js"></script> 
<script type="text/javascript" src='<?php echo PROX_URL; ?>temp/plugins/jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/caroufredsel.js"></script> 
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/plugins.js"></script>

<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/theme.js"></script>
 
<!-- Specific Page Scripts Put Here -->
<script type="text/javascript">
$(document).ready(function() {
	
		"use strict";
	
        var form_register_2 = $('#login-form');
        var error_register_2 = $('.alert-danger', form_register_2);
        var success_register_2 = $('.alert-success', form_register_2);
var opt ={
	type: "POST",
		url:  $("#login-form").attr('action'),
		dataType: "json",
		success: function(data) {
			if(data.code==200){
				success_register_2.show();
                error_register_2.hide();		
				window.location.href = "<?php echo PROX_URL; ?>px-admin/";
			}else{
				success_register_2.hide();
				$("#ermsg").html("<?php echo BCL('px','login_wrong'); ?>");
                error_register_2.show();
			}
					
		},
		error: function() {
				success_register_2.hide();
				$("#ermsg").html("<?php echo BCL('px','login_wrong'); ?>");
                error_register_2.show();
		},
		 uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
        }
		
		};
        form_register_2.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
				
                email: {
                    required: true,
                    email: true
                },				
                password: {
                    required: true,
					minlength: 6
                },
				
				
            },
			
			errorPlacement: function(error, element) {
				if (element.parent().hasClass("vd_checkbox") || element.parent().hasClass("vd_radio")){
					element.parent().append(error);
				} else if (element.parent().hasClass("vd_input-wrapper")){
					error.insertAfter(element.parent());
				}else {
					error.insertAfter(element);
				}
			}, 
			
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success_register_2.hide();
                error_register_2.show();


            },

            highlight: function (element) { // hightlight error inputs
		
				$(element).addClass('vd_bd-red');
				$(element).parent().siblings('.help-inline').removeClass('help-inline hidden');
				if ($(element).parent().hasClass("vd_checkbox") || $(element).parent().hasClass("vd_radio")) {
					$(element).siblings('.help-inline').removeClass('help-inline hidden');
				}

            },

            unhighlight: function (element) { // revert the change dony by hightlight
                $(element)
                    .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label, element) {
                label
                    .addClass('valid').addClass('help-inline hidden') // mark the current input as valid and display OK icon
                	.closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
				$(element).removeClass('vd_bd-red');
					
            },

            submitHandler: function (form) {
				$(form).find('#login-submit').prepend('<i class="fa fa-spinner fa-spin mgr-10"></i>')/*.addClass('disabled').attr('disabled')*/;					
              $(form).ajaxSubmit(opt); 				
            }
        });	
	
	
});
</script>
<!-- Specific Page Scripts
contentType: false,
    cache: false,
    processData:false,
    xhr: function(){
        //upload Progress
        var xhr = $.ajaxSettings.xhr();
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', function(event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                }
                //update progressbar
                $(progress_bar_id +" .progress-bar").css("width", + percent +"%");
                $(progress_bar_id + " .status").text(percent +"%");
            }, true);
        }
        return xhr;
    },
 END -->


</html>