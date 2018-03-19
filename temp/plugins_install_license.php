			 <div class="panel vd_quick-press-widget widget">
    <div class="panel-heading vd_bg-blue">
        <h3 class="panel-title">
			<span class="menu-icon">
            	<i class="fa fa-cube"></i>
            </span>        
	            Install <?php echo $this->plug->Meta->name;?> 
        </h3>
        <div class="vd_panel-menu">
 </div>
<!-- vd_panel-menu --> 
              
    </div>
    <div class="panel-body">
	 <?php if(!empty($_GET['suc'])){?> <div class="alert alert-success"><?php echo BCL('px','suc_plugsetting');?></div><?php } ?>
	  <div class="panel ">
                  <div class="panel-heading vd_bg-black">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="icon-lock-open"></i> </span> 
					<?php echo BCL('px','license').' '?><?php echo $this->plug->Meta->name;?>  </h3>
                  </div>
				  <br>
				  <div class="alert alert-info"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong><?php echo BCL('px','ps_warning');?></strong>
				  <?php echo BCL('px','ps_license_msg').BCL('px','term').' '.BCL('px','and').' '.BCL('px','privacy');?></div>
				  <!--textarea disabled class="form-control" rows="8"><?php echo file_get_contents($this->plug->Meta->license);?></textarea-->
				  <div id="boxlicense" style="max-height:200px;overflow-y:auto;border:1px solid #000;text-align:center"><?php $lix = file_get_contents($this->plug->Meta->license);echo nl2br($lix);?></div>
					<span><a href="<?php echo $this->plug->termUrl;?>" class="vd_facebook"><?php echo BCL('px','term');?></a></span>
					<span><i class="icon-dot"></i></span>
					<span><a href="<?php echo $this->plug->privacyUrl;?>" class="vd_facebook"><?php echo BCL('px','privacy');?></a></span>
					<span><i class="icon-dot"></i></span>
					<span>Developer <a href="<?php echo $this->plug->Meta->developer->url;?>" class="vd_facebook"><?php echo  $this->plug->Meta->developer->name;?></a></span>
		<div class="clearfix"></div>
					<a href="<?php echo PROX_URL_ADMIN.'/plugins/license_cb/?cb=yes&bc='.$this->plug->Base_Class.'&metatype='.$_GET['metatype'];?>" class="btn btn-success pull-right " ><i class=" icon-checkmark"></i> <?php echo BCL('px','agree');?></a>
		<a href="<?php echo PROX_URL_ADMIN.'/plugins/license_cb/?cb=no&bc='.$this->plug->Base_Class.'&metatype='.$_GET['metatype'];?>" class="btn btn-danger pull-right mgr-10" ><i class="fa fa-ban"></i> <?php echo BCL('px','disagree');?></a>
			   
               
               
	</div></div>
	</div>