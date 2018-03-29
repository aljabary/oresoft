 <?php $site = $data['site'];
$Me->showHook($data['args'],$data['param'],'Body_After',0); ?> 
<!-- Footer Start -->
  <footer class="footer-2"  id="footer">      
    <div class="vd_bottom vd_bg-<?php echo $data['colfooter'];?> pd-20">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
              	<div class="text-center mgbt-xs-10">
                	<a href="<?php echo $data['facebook'];?>" target="_blank" class="btn vd_btn vd_bg-facebook vd_round-btn btn-sm  mgr-10"><i class="fa fa-facebook fa-fw "></i></a>
                    <a href="<?php echo $data['googleplus'];?>" target="_blank" class="btn vd_btn vd_bg-googleplus vd_round-btn btn-sm  mgr-10"><i class="fa fa-google-plus fa-fw"></i></a>
                    <a href="<?php echo $data['twitter'];?>" target="_blank" class="btn vd_btn vd_bg-twitter vd_round-btn btn-sm mgr-10"><i class="fa fa-twitter fa-fw "></i></a>                    
                </div>              
                <div class="copyright text-center">
                	<p><span class="mgr-10">Powered by Oresoft</span><br/> 
                    RockBusrt Digital Network
                    </p>
					<p> <?php 
$Me->showHook($data['args'],$data['param'],'Footer',0); ?> </p>
                  	Copyright &copy; <?php echo date('Y').' '.$site->name;?>. All Rights Reserved
                </div>
              </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
  </footer>
<!-- Footer END -->

</div>
<!-- .vc_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

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
});
</script>
 <?php $Me->showHook($data['args'],$data['param'],'Footer_Script',0); ?> 
   
</html>