
			 <div class="panel vd_quick-press-widget widget">
    <div class="panel-heading vd_bg-blue">
        <h3 class="panel-title">
			<span class="menu-icon">
            	<i class="fa fa-gear"></i>
            </span>        
	            <?php echo $this->plug->pagetitle['title'];?> 
        </h3>
        <div class="vd_panel-menu">
 </div>
<!-- vd_panel-menu --> 
              
    </div>
    <div class="panel-body">
	 <?php if(!empty($_GET['suc'])){?> <div class="alert alert-success"><?php echo BCL('px','suc_plugsetting');?></div><?php } ?>
		<div class="alert">
		<a href="<?php echo PROX_URL_ADMIN.'/plugins/uninstall/?bc='.$this->plug->Base_Class.'&metatype='.$this->plug->type?>" class="btn btn-danger pull-right" ><i class="icon-cross3"></i> Uninstall</a>
		<a href="javascript:cekUpdatePlugins();" class="btn btn-info pull-right mgr-10" id="btnupdateplugin"><i class="fa fa-retweet"></i> Check Update</a></div>
	<div class="alert alert-success" id="pluginupdateinfo" style="display:none"> <span class="vd_alert-icon"><i class="fa fa-magic vd_blue"></i></span><strong>Update!!!</strong>
	<span id="iu_msg"><?php echo BCL('px','update_ready');?></span><a href="#" class="btn btn-success pull-right"><i class="fa fa-magic"></i> Update</a></div>
	<div class="alert alert-danger" id="pluginupdatenoinfo" style="display:none"> <span class="vd_alert-icon"><i class="fa fa-ban vd_red"></i></span><strong><?php echo BCL('px','iu_notav'); ?></strong>
	<span id="iu_nomsg"><?php echo BCL('px','iu_notav_msg');?></span></div>
	
					    <div class="panel ">
                  <div class="panel-heading vd_bg-black">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-crosshairs"></i> </span> 
					<?php echo BCL('px','hookpos').' '.$this->plug->pagetitle['title']; ?> </h3>
                  </div>
				  <br>
				  <div class="alert alert-info"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong><?php echo BCL('px','ps_warning');?></strong>
				  <?php echo BCL('px','ps_warning_msg');?></div>
				  <form method="post" action="<?php echo PROX_URL_ADMIN."/plugins/savehook/"; ?>"> 
				  <input type="hidden" name="bc" value="<?php echo $this->plug->Base_Class;?>" />
<?php $ap = new Prox\Plugins\Apps();
$hk 	=	$ap->getHook($this->plug->Base_Class); 
for($i=0;$i<count($hk);$i++){
 ?>	
<div class="form-group row">
                        <label class="col-sm-4 col-md-4 control-label"><?php echo $hk[$i]['template'];?></label>
                        <div class="col-sm-4 col-md-4 controls">
                          <select name="hook_<?php echo $i.'_'.$hk[$i]['template'];?>">
						  <option><?php echo $hk[$i]['hook'];?></option>
						   <option>backend_4a</option>
 <option>backend_4b</option>
 <option>backend_8a</option>
  <option>backend_8b</option>
 <option>backend_6a</option>
 <option>backend_6b</option>
 <option>backend_12</option>
 <option>Admin_Menu</option>
 <option>Admin_Headericon</option>
 <option>Header_Meta</option>
 <option>Body_Before</option>
 <option>Body</option>
 <option>Body_After</option>
 <option>Footer</option>
 <option>Footer_Script</option>
						  </select>
                          <span class="help-inline"><?php echo BCL('px','hookpos');?></span> </div>
						   <div class="col-sm-4 col-md-4 controls">
                         <input type="text" value="<?php echo $hk[$i]['ix'];?>" name="ix_<?php echo $i.'_'.$hk[$i]['template'];?>" />
                          <span class="help-inline"><?php echo BCL('px','hookix');?></span></div> 
                      </div> 
<?php }?>   
<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
 </form>
 <div class="clearefix"></div>
			   </div>
               
               
	</div></div>