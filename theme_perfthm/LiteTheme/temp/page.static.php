
<div class="col-md-8"> 
<?php $Me->showHook($data['args'],$data['param'],'Body',1);?>
<?php $pageobj = $data['pageobj']; ?>
            <div class="panel widget light-widget panel-bd-top <?php echo $data['colheader'];?>">             
              <div class="panel-heading no-title"> </div>
              <div class="panel-body">
                            <div class="row blog-content">
                  <div class="col-xs-12">
                   <?php echo $pageobj->content; ?>
					</div>
                </div>
                <hr>
				
                <div class="row blog-info">
                  <div class="col-sm-4 blog-date font-sm"><i class="icon-clock  append-icon"></i><span class="vd_soft-grey"> <?php echo $pageobj->date; ?></span></div>
                 
                </div>
            </div>
			 
            </div>
            <!-- Panel Widget --> 
            
          </div>
       