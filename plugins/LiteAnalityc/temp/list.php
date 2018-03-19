<?php
/**
LiteAnalityc v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
?>
 <div class="panel widget" id="LiteAnalityc" data-temp="LiteAnalityc-analityc">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="icon-graph"> </i> </span> <?php echo BCL('LiteAnalityc','atitle'); ?></h3>
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
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-file"></i> </span> <?php echo BCL('LiteAnalityc','all_article'); ?> </h3>
                  </div>
                  <div class="panel-body-list  table-responsive">
                    <table class="table table-striped table-hover no-head-border">
                      <thead class="vd_bg-green vd_white">
                        <tr>
                          <th>#</th>
                          <th><?php echo BCL('LiteAnalityc','atitle'); ?></th>
                          <th><?php echo BCL('LiteAnalityc','aview'); ?></th>
                          <th><?php echo BCL('LiteAnalityc','ana'); ?></th>
                        
                        </tr>
                      </thead>
                      <tbody>
					  <?php $al = $data['article_list'];
					  for($i=0;$i<count($al);$i++){
						  $article = $al[$i];
					  ?>
                        <tr id="al<?php echo $article->id; ?>">
                          <td> <?php echo $i+1; ?></td>
                          <td> <?php echo $article->title; ?></td>
                          <td class="center"><?php echo $article->view; ?></td>
                          <td class="center">
			<a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteAnalityc/articleanalisis/'.$article->id;?>"  class="btn btn-success btn-xs"><i class="icon-graph"></i> <?php echo BCL('LiteAnalityc','ana'); ?></span>
					  </td>
                        </tr>
					  <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget -->
                <br/>
            <ul class="pagination">
              <li><a href="<?php $bef =$data['pg'] ; echo PROX_URL_ADMIN.'/plugins/LiteAnalityc/article/'.$bef;?>">«</a></li>
			  <?php $curpg = $data['curpg']; $next =$data['pg'] +2; for($i=0;$i<5;$i++){ $num =$i+1;  ?>
              <li <?php echo $curpg[$i]; ?>><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteAnalityc/article/'.$num;?>"><?php echo $num; ?></a></li>
               <?php } ?>	
              <li><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteAnalityc/article/'.$next;?>">»</a></li>
            </ul>
              </div>
              <!-- col-md-12 --> 
            </div>
				   <!---end---></div>
                </div>				