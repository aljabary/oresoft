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
              <h1><?php echo BCL('px','apps');?>	</h1>
              <small class="subtitle"> <?php echo BCL('px','apps_sub');?></small> </div>  </div>
		  
          <!-- vd_title-section -->
          
            <div class="vd_content-section clearfix">
            <div class="row">
			 <div class="col-sm-12" data-rel="sortable" data-hook="backend_12">
		<?php 
		switch($PXargs){
			case 'Plugins'				:	include(PROX_Domain.'/temp/listplugins.php');break;
			case 'Plugins_Info'			: 	include(PROX_Domain.'/temp/infoplugins.php');break;
			case 'Plugins_Setting'		: 	include(PROX_Domain.'/temp/settingplugins.php');break;
			case 'Plugins_Install_License':include(PROX_Domain.'/temp/plugins_install_license.php');break;
			case 'Plugins_Install_Permission':include(PROX_Domain.'/temp/plugins_install_permission.php');break;
			case 'Plugins_Install_Activation':include(PROX_Domain.'/temp/plugins_install_activation.php');break;
		}
$this->Plugins_Manager->hook($plugins_arg,$this->routing,'backend_12',$this->plug);
?>		
		<div class="panel widget"></div>     
		  
			 </div>
              <div class="col-sm-6" data-rel="sortable" data-hook="backend_6a">
			  <?php 
$this->Plugins_Manager->hook($plugins_arg,$this->routing,'backend_6a',$this->plug);
?>		

               <!-- Panel Widget --> 
                <div class="panel widget"></div>
              </div>
              <div class="col-sm-6" data-rel="sortable" data-hook="backend_6b">
			    <?php 
$this->Plugins_Manager->hook($plugins_arg,$this->routing,'backend_6b',$this->plug);
?>	
			  <div class="panel widget"></div>
              </div>
			  </div> <div class="row">
			  <div class="col-sm-8" data-rel="sortable" data-hook="backend_8a">
			    <?php 
$this->Plugins_Manager->hook($plugins_arg,$this->routing,'backend_8a',$this->plug);
?>	
			  <div class="panel widget"></div>
              </div>
			  <div class="col-sm-4" data-rel="sortable" data-hook="backend_8b">
			    <?php 
$this->Plugins_Manager->hook($plugins_arg,$this->routing,'backend_8b',$this->plug);
?>	
			  <div class="panel widget"></div>
              </div>
			  </div> <div class="row">
			  <div class="col-sm-4" data-rel="sortable" data-hook="backend_4a">
			    <?php 
$this->Plugins_Manager->hook($plugins_arg,$this->routing,'backend_4a',$this->plug);
?>	
			  <div class="panel widget"></div>      
		  
              </div><div class="col-sm-4" data-rel="sortable" data-hook="backend_4b">
			    <?php 
$this->Plugins_Manager->hook($plugins_arg,$this->routing,'backend_4b',$this->plug);
?>	
			  <div class="panel widget"></div> 
		  
              </div><div class="col-sm-4" data-rel="sortable" data-hook="backend_4c">
			    <?php 
$this->Plugins_Manager->hook($plugins_arg,$this->routing,'backend_4c',$this->plug);
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
<script>

function setStatus(id){
	var st = $("#plug"+id).attr("stat");
	var nst = 1;
	if(st==1){
		nst=0;
	}
	$.ajax({
		url:base_url+"ajax.php",
		data:"class=Prox.Plugins.Apps&function=setStatus&plugins="+id+"&status="+nst,
		success:function(){
			if(st==1){
		$("#plug"+id).html("Off");$("#plug"+id).attr("stat","0");$("#plug"+id).removeClass("vd_bg-green");$("#plug"+id).addClass("vd_bg-yellow");
			}else{
		$("#plug"+id).html("<i class='fa fa-bolt'></i> Active");$("#plug"+id).attr("stat","1");$("#plug"+id).addClass("vd_bg-green");$("#plug"+id).removeClass("vd_bg-yellow");
			}
		}
	});
}

function cekUpdatePlugins(){
	$('#btnupdateplugin').html('<i class=\'fa fa-spinner fa-spin mgr-10\'></i> Checking...');
$.ajax({
url:base_url+"ajax.php",
data:"class=Prox.Plugins.Apps&function=cekupdate&plugins=<?php echo $this->plug->Base_Class;?>",
success:function(j){
	if(j.isready){
	$("#iu_msg").prepend(' (v '+j.version+') ');
$('#pluginupdateinfo').show();
	}else{
		$("#pluginupdatenoinfo").show();
	}
$('#btnupdateplugin').html('<i class="fa fa-retweet"></i> Check Update');			
	}
});
}
</script>
<?php include(PROX_Domain.'/temp/footer.php'); ?>