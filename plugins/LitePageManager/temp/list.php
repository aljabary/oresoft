<?php
/**
LitePageManager List Page v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
?>
 <div class="panel widget" id="LitePageManager" data-temp="LitePageManager-editor">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="icon-newspaper"> </i> </span> <?php echo BCL('LitePageManager','lisview'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
  
  <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				   <div class="row">
              <div class="col-md-12">
                <div class="panel ">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-file"></i> </span> <?php echo BCL('LitePageManager','all_page'); ?> </h3>
                  </div>
                  <div class="panel-body-list  table-responsive">
                    <table class="table table-striped table-hover no-head-border">
                      <thead class="vd_bg-green vd_white">
                        <tr>
                          <th>#</th>
                          <th><?php echo BCL('LitePageManager','name'); ?></th>
                          <th><?php echo BCL('LitePageManager','view'); ?></th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php $al = $data['page_list'];
					  for($i=0;$i<count($al);$i++){
						  $page = $al[$i];
					  ?>
                        <tr id="al<?php echo $page->id ?>">
                          <td> <?php echo $i+1; ?></td>
                          <td> <?php echo $page->name; ?></td>
                          <td class="center"><?php echo $page->view; ?></td>
                          <td class="center">
						  <?php if($page->status=='on'){?>
						  <a href="javascript:setStatus(<?php echo $page->id ?>);" stat="<?php echo $page->status ?>" id="art<?php echo $page->id ?>" class="btn btn-success btn-xs">Active</span>
					  <?php }else{ ?>
					  <a href="javascript:setStatus(<?php echo $page->id ?>);" stat="<?php echo $page->status ?>" id="art<?php echo $page->id ?>" class="btn btn-warning btn-xs">Off</span>
					  <?php } ?>
						  
						  </td>
                          <td class="menu-action rounded-btn"><a data-original-title="view" data-toggle="tooltip" data-placement="top" href="<?php echo $page->url; ?>" class="btn menu-icon vd_bg-grey"> <i class="fa fa-eye"></i> </a> <a data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-grey" href="<?php echo PROX_URL_ADMIN; ?>/plugins/LitePageManager/editor/<?php echo $page->id; ?>"> <i class="fa fa-pencil"></i> </a> <a href="javascript:deleteArt(<?php echo $page->id ?>);" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bg-grey"> <i class="fa fa-times"></i> </a></td>
                        </tr>
					  <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget -->
                <br/>
            <ul class="pagination">
              <li><a href="<?php $bef =$data['pg'] ; echo PROX_URL_ADMIN.'/plugins/LitePageManager/listview/'.$bef;?>">«</a></li>
			  <?php $curpg = $data['curpg']; $next =$data['pg'] +2; for($i=0;$i<5;$i++){ $num =$i+1;  ?>
              <li <?php echo $curpg[$i]; ?>><a href="<?php echo PROX_URL_ADMIN.'/plugins/LitePageManager/listview/'.$num;?>"><?php echo $num; ?></a></li>
               <?php } ?>	
              <li><a href="<?php echo PROX_URL_ADMIN.'/plugins/LitePageManager/listview/'.$next;?>">»</a></li>
            </ul>
              </div>
              <!-- col-md-12 --> 
            </div>
				   <!---end---></div>
                </div>				