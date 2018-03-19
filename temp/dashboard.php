<?php include(PROX_Domain.'/temp/header.php'); ?>
    <!-- Middle Content Start -->    
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li class="active">Dashboard</li>
               
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
              <h1>Clean Minimalist Skin</h1>
              <small class="subtitle">Light Color Background Top Menu</small> </div>  </div>
		  
          <!-- vd_title-section -->
          
            <div class="vd_content-section clearfix">
        <div class="row">
			 <div class="col-sm-12" data-rel="sortable" data-hook="backend_12">
<?php 
$this->Plugins_Manager->call_action('tools',$plugins_arg,$param,'backend_12');
?>		
		<div class="panel widget"></div>     
		  
			 </div>
              <div class="col-sm-6" data-rel="sortable" data-hook="backend_6a">
			

               <!-- Panel Widget --> 
                <div class="panel widget"></div>
              </div>
              <div class="col-sm-6" data-rel="sortable" data-hook="backend_6b">
			  <div class="panel widget"></div>
              </div>
			  </div> <div class="row">
			  <div class="col-sm-8" data-rel="sortable" data-hook="backend_8a">
			  <div class="panel widget"></div>
              </div>
			  <div class="col-sm-4" data-rel="sortable" data-hook="backend_8b">
			  <div class="panel widget"></div>
              </div>
			  </div> <div class="row">
			  <div class="col-sm-4" data-rel="sortable" data-hook="backend_4a">
			  <div class="panel widget"></div>      
		  
              </div><div class="col-sm-4" data-rel="sortable" data-hook="backend_4b">
			  <div class="panel widget"></div> 
		  
              </div><div class="col-sm-4" data-rel="sortable" data-hook="backend_4c">
			  <div class="panel widget"></div>      
			
              </div>
            </div>
            <!-- row -->     
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
<?php include(PROX_Domain.'/temp/footer.php'); ?>