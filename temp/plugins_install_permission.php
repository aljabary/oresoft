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
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-warning"></i> </span> 
					<?php echo BCL('px','permission').' '?><?php echo $this->plug->Meta->name;?>  </h3>
                  </div>
				  <br>
				  <div class="alert alert-info"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong><?php echo BCL('px','ps_warning');?></strong>
				  <?php echo BCL('px','ps_permission_msg').BCL('px','term').' '.BCL('px','and').' '.BCL('px','privacy');?></div>
				 
               <div class="content-list content-image">
                      <ul class="list-wrapper pd-lr-10">
					  <?php 
					  $app = new Apps();
					  $per = $this->plug->Meta->permission;
					  for($i=0;$i<count($per);$i++){
					  ?>
                        <li>
                          <div class="menu-icon vd_blue"><i class="fa  <?php echo BCL('px','pericon_'.$per[$i]);?>"></i></div>
                          <div class="menu-text"> <?php echo $app->perName($per[$i]);?>
                            <div class="menu-info">
                              <?php echo BCL('px','perinfo_'.$per[$i]);?>
                            </div>
                          </div>
                        </li>
					  <?php } ?>	
                      </ul>
                    </div>
					
					  <?php 
					  $app = new Apps();
					  $per = $this->plug->Meta->requirement->apps;
					  if(count($per)>0){
					  ?>
					<h3><?php echo BCL('px','ps_requirement');?></h3>
					 <div class="alert alert-info"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong><?php echo BCL('px','ps_warning');?></strong>
				  <?php echo BCL('px','ps_requirement_msg');?></div>
				 <?php } ?>	
					  <div class="content-list content-image">
                      <ul class="list-wrapper pd-lr-10">
					  <?php 

					  $aval=true;
					  for($i=0;$i<count($per);$i++){
						  $ck =$app->cekApps($per[$i]);
						  $ap_msg = $ck['msg'];
						  $vd_c='vd_red'; $vd_ic = 'fa-times-circle';$aval=false;
						  if($ck['avaliable']){
						  $vd_c='vd_green';
						  $vd_ic = 'fa-check-circle';  $aval=true;
						  }
					  ?>
                        <li>
                          <div class="menu-icon <?php echo $vd_c;?>"><i class="fa <?php echo $vd_ic;?>"></i></div>
                          <div class="menu-text <?php echo $vd_c;?>"> <?php echo $per[$i];?>
                            <div class="menu-info <?php echo $vd_c;?>">
                              <?php echo $ap_msg;?>
                            </div>
                          </div>
                        </li>
					  <?php } ?>	
                      </ul>
                    </div>
					 <div class="content-list content-image">
                      <ul class="list-wrapper pd-lr-10">
					  <?php 

					  $lib = $this->plug->Meta->requirement->lib;
					  $pcl = new Plugins_Core();
					  for($i=0;$i<count($lib);$i++){
						  $ck =$pcl->UseLib($lib[$i]);
						   $ap_msg = BCL('px','ex_lib').' '.$lib[$i];
						  $vd_c='vd_red'; $vd_ic = 'fa-times-circle';$aval=false;
						  if($ck){
						  $vd_c='vd_green';
						  $vd_ic = 'fa-check-circle';  $aval=true;
						  $ap_msg = BCL('px','apps_need_ok');
						  }
					  ?>
                        <li>
                          <div class="menu-icon <?php echo $vd_c;?>"><i class="fa <?php echo $vd_ic;?>"></i></div>
                          <div class="menu-text <?php echo $vd_c;?>"> <?php echo $lib[$i];?>
                            <div class="menu-info <?php echo $vd_c;?>">
                              <?php echo $ap_msg;?>
                            </div>
                          </div>
                        </li>
					  <?php } ?>	
                      </ul>
                    </div>
					
					<a href="<?php echo PROX_URL_ADMIN.'/plugins/permission_cb/?cb=yes&bc='.$this->plug->Base_Class.'&metatype='.$_GET['metatype'];?>" class="btn btn-success pull-right <?php if(!$aval){ echo 'disabled';}?>" ><i class=" icon-checkmark"></i> <?php echo BCL('px','next');?></a>
		
		<a href="<?php echo PROX_URL_ADMIN.'/plugins/permission_cb/?cb=no&bc='.$this->plug->Base_Class.'&metatype='.$_GET['metatype'];?>" class="btn btn-danger pull-right mgr-10" ><i class="fa fa-ban"></i> <?php echo BCL('px','cancel');?></a>
			
               
	</div></div>
	</div>