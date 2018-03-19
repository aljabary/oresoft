<?php if($_GET['status']=='cancel_install'){
					  ?>
					 <div class="alert alert-warning"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_yellow"></i></span><strong><?php echo BCL('px','ps_warning');?></strong>
				  <?php echo BCL('px','ps_cancel_install_msg');?></div>
				 <?php } ?>
	<?php if($_GET['status']=='success_install'){
					  ?>
					 <div class="alert alert-success"> <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong><?php echo BCL('px','ps_success');?></strong>
				  <?php echo BCL('px','ps_success_install_msg');?></div>
				 <?php } ?>		
<?php if($_GET['status']=='uninstall'){
					  ?>
					 <div class="alert alert-warning"> <span class="vd_alert-icon"><i class="fa fa-check-circle vd_yellow"></i></span><strong><?php echo BCL('px','ps_success');?></strong>
				  <?php echo BCL('px','ps_uninstall_msg');?></div>
				 <?php } ?>						 
			 <div class="panel vd_quick-press-widget widget">
    <div class="panel-heading vd_bg-blue">
        <h3 class="panel-title">
			<span class="menu-icon">
            	<i class="fa fa-cube"></i>
            </span>        
	            <?php echo BCL('px','apps');?>
        </h3>
        <div class="vd_panel-menu">
 </div>
<!-- vd_panel-menu --> 
              
    </div>
    <div class="panel-body">
	  <div class="panel"><form enctype="multipart/form-data" method="post" action="<?php echo PROX_URL;?>ajax.php">
			  <input type="hidden"  name="class" value="apps" />
			   <input type="hidden"  name="function" value="uploadpackage" />
				  <div class="form-group col-sm-4"></div>
               <div class="form-group">
                        <div class="col-sm-4 controls">
                          <div class="input-group"><input type="file" name="lmfiles"  class="form-controls">
                            <div class="input-group-btn">
                              <button type="submit" class="btn  vd_bg-green vd_white" ><i class="fa fa-cloud-upload"></i> Upload (install)</button>
                            </div>
                            <!-- /btn-group --> 
                          </div>
                          <!-- /input-group --> 
                        </div> <label class="col-sm-4 control-label"></label>
                      </div> 	</form>	</div><br><br>
					    <div class="panel ">
                  <div class="panel-heading vd_bg-black">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-cubes"></i> </span> 
					<?php echo BCL('px','apps').' '.BCL('px','installed'); ?> </h3>
                  </div>
 <div class="content-list content-blog-small">
                  <ul class="list-wrapper">
				  <?php
				$pl = $this->getAllplugins();
				$db = Xcon();
				  foreach($pl as $key=>$val){
				$g=  $pl[$key];
				$fol ='plugins';
			if($g['p_type'] == 'theme'){
				$fol = 'theme_perfthm';
			}
			$pn = str_replace(' ','-',$g['base_class']);
			$pn = $pn;
			$fol = 'plugins';
			if($g['p_type']=='theme'){
				$fol ='theme_perfthm';
			}
			parent::setFolPn($fol,$pn);
			$file = PROX_Domain.'/'.$fol.'/'.$g['base_class'].'/init.php';
			if(is_file($file) && !class_exists($g['base_class'])){include(PROX_Domain.'/'.$fol.'/'.$g['base_class'].'/init.php');
			}
		$param 			= array("this"=>"PERMISSION");
		$plug 			= new $pn(null,$param);
		
		$mv = $plug->View->getKeystore();		
		$meta = $plug->Meta;
		$url = PROX_URL.$fol.'/'.$g['base_class'].'/';
					  ?>
                    <li>
                      <div class="menu-icon" > <img style="max-width:205px;max-height:205px" src="<?php echo $url.$meta->logo; ?>"> </div>
                      <div class="menu-text">
                        <h2 class="blog-title font-bold letter-xs"><a href="<?php echo PROX_URL_ADMIN.'/plugins/'.$g['base_class'] ?>" title="<?php echo $article->title; ?>"> <?php echo $g['name']; ?> </a></h2>
 <p><?php echo $meta->description;?></p>                       
					   <div class="menu-info">
						  <div class="menu-date font-xs"><a href="<?php echo $arcat->url; ?>"><span class="label vd_bg-red">
						<?php echo $g['p_type']; ?></span></a> <?php echo BCL('px','version').': '.$meta->version; ?> by Developer: <a href="<?php echo $meta->developer->url; ?>" target="_blank"><?php echo $meta->developer->name; ?></a></div>
                        </div>
                        <div class="menu-tags  mgbt-xs-15">
						
						
						</div>
                       <?php if($g['status']==1){?>
                        <a href="javascript:setStatus(<?php echo $g['id']; ?>);" stat="<?php echo $g['status']; ?>" id="plug<?php echo $g['id']; ?>" class="btn vd_btn vd_bg-green btn-sm"><i class="fa fa-bolt"></i> <?php echo BCL('px','active'); ?></a> 
					   <?php }else{?> <a href="javascript:setStatus(<?php echo $g['id']; ?>);" stat="<?php echo $g['status']; ?>" id="plug<?php echo $g['id']; ?>" class="btn vd_btn vd_bg-yellow btn-sm" ><?php if($meta->type=='theme'){ echo BCL('px','use_theme');}else{ echo 'Off';}?> </a> 
					    <?php }?>
						<a href="<?php echo PROX_URL_ADMIN."/plugins/info/".$g['base_class'];?>"class="btn vd_btn vd_bg-twitter btn-sm" ><i class="fa fa-info"></i> <?php echo BCL('px','info'); ?></a> 
						<a href="<?php echo PROX_URL_ADMIN."/plugins/setting/".$g['base_class'];?>" class="btn vd_btn vd_bg-linkedin btn-sm" ><i class="fa fa-gear"></i> <?php echo BCL('px','setting'); ?></a> 
						<?php if($mv->price > 0 &&!$plug->isLicensed()){ ?>
						<a href="<?php echo PROX_URL_ADMIN."/plugins/install_activation/?bc=".$g['base_class'].'&metatype='.$g['p_type'];?>" class="btn vd_btn vd_bg-googleplus btn-sm" ><i class="fa fa-key"></i> <?php echo BCL('px','activation'); ?></a> 
						 <?php }?>
						</div>
                    </li>
     
				  <?php }?>
                  </ul>
                </div> 
 <ul class="pagination">
              <li><a href="<?php $bef =$bef_; echo PROX_URL_ADMIN.'/plugins/?page='.$bef;?>">«</a></li>
			  <?php  $next =$bef_ +2; for($i=0;$i<5;$i++){ $num =$i+1;  ?>
              <li <?php echo $curpg[$i]; ?>><a href="<?php echo PROX_URL_ADMIN.'/plugins/?page='.$num;?>"><?php echo $num; ?></a></li>
               <?php } ?>	
              <li><a href="<?php echo PROX_URL_ADMIN.'/plugins/?page='.$next;?>">»</a></li>
            </ul>				
			   </div>
               
               
	</div></div>