<?php
/**
Category v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteMedia : Base Class
* data-templat = LiteCate-galery : Base Class-Template hook name
*/
?>
	
 <div class="panel widget" id="LiteMedia" data-temp="LiteMedia-galery">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa <?php echo $data['picon'];?>"> </i> </span> <?php echo $data['ptitle'];?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
  <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>            <div class="panel-body">
				  <div class="vd_content-section clearfix">
				    <div class="content-list  content-image ">
                      <ul class="list-wrapper wrap-25">
         <?php $Me->View->Show("uploader",$data);?>   

				  <?php $photos = $data['photos']; 
				  for($i=0;$i<count($photos);$i++){
					  $p = $photos[$i];
				  ?>
				    <li id="lml<?php echo $p->id; ?>"> 
					<?php if($p->type=='sound'){ ?>
					<div class="menu-icon vd_green">
					<i class="fa fa-music"></i></div> 
					<?php }else if($p->type=='video'){ ?>
					<div class="menu-icon vd_red">
					<i class="fa fa-file-video-o"></i></div>
					<?php }else if($p->type=='document'){ ?>
					<div class="menu-icon vd_blue">
					<i class="fa fa-file-word-o"></i></div> 					
					<?php } ?>
                            <div class="menu-text"> <?php echo $p->title; ?> 
                            	<div class="menu-info">
                                    <span class="menu-date"><?php echo $p->source; ?></span>
<div class="btn-group-xs mgbt-xs-5 pull-right">
              <a href="<?php echo $p->source; ?>" target="_blank" class="btn btn-success">Open</a>
                   <a href="javascript:LMremove(<?php echo $p->id; ?>, '<?php echo $p->type; ?>');" class="btn btn-danger">Remove</a>
                    </div>
									
                            	</div>
                            </div> 
                     </li>
				  <?php } ?>	</ul>
      
            <div class="clearfix"></div>
            <br/> <?php if($data['pg']> 1){ //crete pagination xample?>
            <ul class="pagination">
              <li><a href="<?php $bef =$data['curpage'] -1; echo PROX_URL_ADMIN.'/plugins/LiteMedia/auvi/'.$bef;?>">«</a></li>
			  <?php $curpg = $data['curpg']; $next =$data['curpage'] +1; for($i=0;$i<5;$i++){ $num =$i+1;  ?>
              <li <?php echo $curpg[$num]; ?>><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteMedia/auvi/'.$num;?>"><?php echo $num; ?></a></li>
               <?php } ?>	
              <li><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteMedia/auvi/'.$next;?>">»</a></li>
            </ul>
			 <?php } ?>	
          </div>
         </div>
									
			
                  
					<!---end---></div>
                </div>
				


		
				