			 <div class="panel vd_quick-press-widget widget">
    <div class="panel-heading vd_bg-blue">
        <h3 class="panel-title">
			<span class="menu-icon">
            	<i class="fa fa-cube"></i>
            </span>        
	            <?php echo BCl('px','activation').' '.$this->plug->Meta->name;?> 
        </h3>
        <div class="vd_panel-menu">
 </div>
<!-- vd_panel-menu --> 
              
    </div>
    <div class="panel-body">
	 <?php if(!empty($_GET['suc'])){?> <div class="alert alert-success"><?php echo BCL('px','suc_plugsetting');?></div><?php } ?>
	  <div class="panel ">
                  <div class="panel-heading vd_bg-black">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-key"></i> </span> 
					<?php echo BCL('px','activation').' '?><?php echo $this->plug->Meta->name;?>  </h3>
                  </div>
				  <br>
				  <div class="alert alert-info"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong><?php echo BCL('px','ps_warning');?></strong>
				  <?php echo BCL('px','ps_activation_msg');?></div>
				 <?php if($_GET['result']=='error'){ ?>
				    <div class="alert alert-danger"> <span class="vd_alert-icon"><i class="fa fa-times-circle vd_red"></i></span><strong>error</strong>
				  <?php echo BCL('px','ps_activation_error');?></div>
					<?php 
				 }
		$price = $this->plug->View->getKeystore();
		$price = $price->price;	
		?>	
<form action="<?php echo PROX_URL.'/ajax.php';?>" method="POST">
<div class="form-group" >
<input type="hidden" value="Apps" name="class"/>
<input type="hidden" value="do_activated" name="function"/>
<input type="hidden" value="<?php echo $this->plug->Base_Class;?>" name="base_class"/>
<input name="metatype" value="<?php echo $_GET['metatype'];?>" type="hidden">
<label>Signature</label>
<textarea disabled><?php echo $this->plug->signature;?></textarea>
</div>	
<?php if($price > 0){?>
<input type="hidden" value="1" name="act"/>
<div class="form-group">
<label>Key Product</label>
<textarea name="keyp"></textarea>
</div>	
<?php } ?>						
		<button class="btn btn-success pull-right" ><i class=" icon-checkmark"></i> <?php echo BCL('px','active');?></button>
<a href="<?php echo PROX_URL_ADMIN.'/plugins/permission_cb/?cb=no&bc='.$this->plug->Base_Class.'&metatype='.$_GET['metatype'];?>" class="btn btn-danger pull-right mgr-10" ><i class="fa fa-ban"></i> <?php echo BCL('px','cancel');?></a>
</form>					
               
	</div></div>
	</div>