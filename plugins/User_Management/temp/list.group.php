<?php
/**
User Management v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
?>
<div class="panel widget" id="User_Management" data-temp="User_Management-editor">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-users"> </i> </span> <?php echo BCL('User_Management','list_group'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
  <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				   <div class="row">
              <div class="col-md-12">
                <div class="panel">
                  
                  <div class="panel-body-list  table-responsive">
                    <table class="table table-striped table-hover no-head-border">
                      <thead class="vd_bg-green vd_white">
                        <tr>
                          <th>#</th>
                          <th><?php echo BCL('User_Management','group_name'); ?></th>
                          <th><?php echo BCL('User_Management','date'); ?></th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php $al = $data['group_list'];
					  for($i=0;$i<count($al);$i++){
						  $group = $al[$i];
					  ?>
                        <tr id="al<?php echo $group->id ?>">
                          <td> <?php echo $group->id; ?></td>
                          <td> <?php echo $group->title; ?></td>
                          <td class="center"><?php echo $group->view; ?></td>
                          <td class="center">
						  <?php if($group->status=='on'){?>
						  <a href="javascript:setStatus(<?php echo $group->id ?>);" stat="<?php echo $group->status ?>" id="art<?php echo $group->id ?>" class="btn btn-success btn-xs">Active</span>
					  <?php }else{ ?>
					  <a href="javascript:setStatus(<?php echo $group->id ?>);" stat="<?php echo $group->status ?>" id="art<?php echo $group->id ?>" class="btn btn-warning btn-xs">Off</span>
					  <?php } ?>
						  
						  </td>
                          <td class="menu-action rounded-btn"><a data-original-title="view" data-toggle="tooltip" data-placement="top" href="<?php echo $article->url; ?>" class="btn menu-icon vd_bg-grey"> <i class="fa fa-eye"></i> </a> <a data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-grey" href="<?php echo PROX_URL_ADMIN; ?>/plugins/BlogBooster/editor/<?php echo $article->id; ?>"> <i class="fa fa-pencil"></i> </a> <a href="javascript:deleteArt(<?php echo $article->id ?>);" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-grey"> <i class="fa fa-times"></i> </a></td>
                        </tr>
					  <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget -->
                <br/>
            <ul class="pagination">
              <li><a href="<?php $bef =$data['pg'] ; echo PROX_URL_ADMIN.'/plugins/BlogBooster/list/'.$bef;?>">«</a></li>
			  <?php $curpg = $data['curpg']; $next =$data['pg'] +2; for($i=0;$i<5;$i++){ $num =$i+1;  ?>
              <li <?php echo $curpg[$i]; ?>><a href="<?php echo PROX_URL_ADMIN.'/plugins/BlogBooster/list/'.$num;?>"><?php echo $num; ?></a></li>
               <?php } ?>	
              <li><a href="<?php echo PROX_URL_ADMIN.'/plugins/BlogBooster/list/'.$next;?>">»</a></li>
            </ul>
              </div>
              <!-- col-md-12 --> 
            </div>
				   <!---end---></div>
                </div>	