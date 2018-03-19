<?php include(PROX_Domain.'/temp/header.php'); ?>
    <!-- Middle Content Start -->    
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li class="active"><a href="<?php echo PROX_URL_ADMIN;?>">Dashboard</a></li>
               <?php $pxr= $this->routing;
			   for($i=0;$i<count($pxr);$i++){
				   $rtt.=$pxr[$i].'/';
			   ?>	
			    <li><a href="<?php echo PROX_URL_ADMIN.'/'.$rtt;?>"><?php echo $pxr[$i];?></a></li>
			   <?php }?>
              </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      
</div>
 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1><?php echo $this->plug->pagetitle['title'];?>	</h1>
              <small class="subtitle"><?php echo $this->plug->pagetitle['subtitle'];?></small> </div>  </div>
		  
          <!-- vd_title-section -->
          
            <div class="vd_content-section clearfix">
            <div class="row">
			<div class="col-sm-12">
			 </div>
			 <div class="col-sm-12" data-rel="sortable" data-hook="backend_12">
<?php 
//$this->Plugins_Manager->hook($plugins_arg,$this->routing,'backend_12',$this->plug);
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'backend_12');
?>		
		<div class="panel widget"></div>     
		  
			 </div>
              <div class="col-sm-6" data-rel="sortable" data-hook="backend_6a">
			  <?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'backend_6a');
?>		

               <!-- Panel Widget --> 
                <div class="panel widget"></div>
              </div>
              <div class="col-sm-6" data-rel="sortable" data-hook="backend_6b">
			    <?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'backend_6b');
?>	
			  <div class="panel widget"></div>
              </div>
			  </div> <div class="row">
			  <div class="col-sm-8" data-rel="sortable" data-hook="backend_8a">
			    <?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'backend_8a');
?>	
			  <div class="panel widget"></div>
              </div>
			  <div class="col-sm-4" data-rel="sortable" data-hook="backend_8b">
			    <?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'backend_8b');
?>	
			  <div class="panel widget"></div>
              </div>
			  </div> <div class="row">
			  <div class="col-sm-4" data-rel="sortable" data-hook="backend_4a">
			    <?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'backend_4a');
?>	
			  <div class="panel widget"></div>      
		  
              </div><div class="col-sm-4" data-rel="sortable" data-hook="backend_4b">
			    <?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'backend_8b');
?>	
			  <div class="panel widget"></div> 
		  
              </div><div class="col-sm-4" data-rel="sortable" data-hook="backend_4c">
			    <?php 
$this->Plugins_Manager->call_action('tools',$PXargs,$this->routing,'backend_8c');
?>	
			  <div class="panel widget"></div>      
			
              </div>
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
       <!-- Modal -->
                  <div class="modal fade" id="PXMediaBrowser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header vd_bg-blue vd_white">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                          <h4 class="modal-title" id="myModalLabel">Media Browser</h4>
                        </div>
                        <div class="modal-body">					
                        <div class="row pxmob isotope js-isotope vd_gallery text-center">
                       
                        </div>
						<ul class="pagination">
              <li><a href="javascript:PXMedia.before();">«</a></li>
			  <li ><a href="javascript:PXMedia.gopage(1);">1</a></li>
			  <li ><a href="javascript:PXMedia.gopage(2);">2</a></li>
			  <li ><a href="javascript:PXMedia.gopage(3);">3</a></li>
              <li><a href="javascript:PXMedia.next();">»</a></li>
            </ul>
                        <div class="modal-footer background-login">
                          <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                          <button type="button" class="btn vd_btn vd_bg-green" data-dismiss="modal">Ok</button>
                        </div>
                      </div>
                      <!-- /.modal-content --> 
                    </div>
                    <!-- /.modal-dialog --> 
                  </div>
                  <!-- /.modal --> 	
          
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
<?php include(PROX_Domain.'/temp/footer.php'); ?>