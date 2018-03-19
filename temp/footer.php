 <?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'Body_After'); ?> 
   
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>
<!-- Footer Start -->
  <footer class="footer-2"  id="footer">      
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright text-center">
                  	Proxtrasoft &reg; Copyright &copy;2017 Project eXtra Software. All Rights Reserved 
					 <?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'Footer'); ?> 
   
                </div>
              </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
  </footer>
<!-- Footer END -->
<!-- .vd_body END  -->
<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<!--[if lt IE 9]>
  <script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/excanvas.js"></script>      
<![endif]-->
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/jquery-ui/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/caroufredsel.js"></script> 
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/plugins.js"></script>

<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/pnotify/js/jquery.pnotify.min.js"></script>
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/js/theme.js"></script> 
<!-- Specific Page Scripts Put Here --> 
<script type="text/javascript" src="<?php echo PROX_URL; ?>temp/plugins/google-code-prettify/prettify.js"></script>
<script type="text/javascript" >
	"use strict";
	jQuery(document).ready(function($){prettyPrint();});
	
$(document).ready(function() {
	"use strict";	
	 $( '[data-rel^="sortable"]' ).sortable({
            connectWith: '[data-rel^="sortable"]',
           items: 'div.widget',
            opacity: 0.8,	
            placeholder: 'ui-drop-placeholder panel widget',
            forcePlaceholderSize: true,								
            iframeFix: false,
           tolerance: 'pointer',			
            helper: 'original',
			dropOnEmpty:true,
            revert: true,
            forceHelperSize: true,
			 update: function( event, ui ) {
			 var temp = ui.item.attr('data-temp');
			 var hook = $(this).attr('data-hook');
			 $.ajax({
				 url:"<?php echo PROX_URL; ?>ajax.php",
				 data:"class=Plugins_Core&function=update_hook&hook="+hook+"&template="+temp,
				 
			 });
			 }

	}).disableSelection();	
});
</script>
 <?php $this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'Footer_Script'); ?> 
   
</html>