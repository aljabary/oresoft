<?php
/**
Category v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteMedia : Base Class
* data-temp = LiteCate-galery : Base Class-Template hook name
*/
?>
<div class="panel widget" id="LiteMedia" data-temp="LiteMedia-galery">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-picture-o"> </i> </span> Photo</h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
  
  <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				    	 
          <div class="vd_content-section clearfix">
            
         <?php $Me->getUploader($data['url']); //show uploader by call Local API?>   

				  <div class="popup-gallery row">
				  <?php $photos = $data['photos']; 
				  for($i=0;$i<count($photos);$i++){
					  $p = $photos[$i];
				  ?>
			  <a class="col-sm-3 col-xs-3" href="<?php echo $p->source; ?>" title="<?php echo $p->title; ?>" style="padding:0px">
											<div class="img-responsive">
												<img src="<?php echo $p->thumb[150]; ?>"style="width:100%;height:170px">
											</div>
										</a>
				  <?php } ?>										
										</div>
        
		
            <div class="clearfix"></div>
            <br/> <?php if($data['pg']> 1){ //crete pagination xample?>
            <ul class="pagination">
              <li><a href="<?php $bef =$data['curpage'] -1; echo PROX_URL_ADMIN.'/plugins/LiteMedia/photo/'.$bef;?>">«</a></li>
			  <?php $curpg = $data['curpg']; $next =$data['curpage'] +1; for($i=0;$i<5;$i++){ $num =$i+1;  ?>
              <li <?php echo $curpg[$num]; ?>><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteMedia/photo/'.$num;?>"><?php echo $num; ?></a></li>
               <?php } ?>	
              <li><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteMedia/photo/'.$next;?>">»</a></li>
            </ul>
			 <?php } ?>	
          </div>
                  
					<!---end---></div>
                </div>
				