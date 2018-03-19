<div class="col-md-4"> 

<?php 
/**
*	Widget lastest article
*/

if($data['w_lastest']){ $blog = $data['blog_lastest']; ?>
    <div class="panel widget light-widget panel-bd-top vd_bdt-yellow">
              <div class="panel-body">
                <h2 class=""><i class="fa fa-star append-icon vd_<?php echo $data['collabel'];?>"></i> <?php echo BCL('LiteTheme','w_bl_title');?></h2><hr>
                <div class="content-list content-image">
					  <ul class="list-wrapper no-bd-btm">
				 <?php for($ibl=0;$ibl<count($blog);$ibl++){
					  $article = $blog[$ibl];
					  ?>
                    <li> <a href="<?php echo $article->url;?>">
                      <div class="menu-icon"><img src="<?php echo $article->Photo->thumb[75];?>" style="width:45px;height:40px" alt="<?php echo $article->title;?>"></div>
                      <div class="menu-text pd-5">
                        <h5 class="mgbt-xs-0"><?php echo $article->title;?></h5>
                        <div class="menu-info">
                          <div class="menu-date font-xs">Posted: <?php echo $article->date;?> </div>
                        </div>
                      </div>
                      </a> </li>					      
		   <?php } ?>
                  </ul>
                </div>
              </div>
            </div>       
		   <?php } ?>	

<?php $Me->showHook($data['args'],$data['param'],'Body',3);?>
<?php if($data['w_tag']){ $blog = $data['blog_single']; ?>
    <div class="panel widget light-widget panel-bd-top vd_bdt-yellow">
              <div class="panel-body">
                <h2 class=""><i class="fa fa-tags append-icon vd_<?php echo $data['collabel'];?>"></i> Tags</h2><hr>
                <div class="content-list content-image">
<?php $tags = $blog->tags;
for($it=0;$it<count($tags);$it++){
	$tag = $tags[$it];
?>				
              <a href="<?php echo PROX_URL,'tag/'.$tag;?>"><span class="label vd_bg-<?php echo $data['collabel'];?>">#<?php echo $tag;?></span></a>
<?php } ?>
                </div>
              </div>
            </div>       
		   <?php } ?>
	   
<?php 
/**
*	Widget category list
*/

if($data['w_catlist']){ $catlist = $data['catlist'];//print_r($catlist); ?>
    <div class="panel widget light-widget panel-bd-top vd_bdt-yellow">
              <div class="panel-body">
                <h2 class=""><i class="fa fa-rss-square append-icon vd_<?php echo $data['collabel'];?>"></i> <?php echo BCL('LiteTheme','w_cl_title');?></h2><hr>
                <div class="content-list content-image">
					  <ul class="list-wrapper no-bd-btm">
				 <?php for($icl=0;$icl<count($catlist);$icl++){
					  $cat_list_ = $catlist[$icl];
					  $cat_list	= $cat_list_['category'];
					  if($cat_list->name !=''){
					  ?>
                    <li> <a href="<?php echo $cat_list->url;?>">
                      <div class="pd-5">
                        <h5 class="mgbt-xs-0"><?php echo $cat_list->name;?></h5>
                        <div class="menu-info">
                          <div class="menu-date font-xs"><?php echo $cat_list_['count'];?> Article</div>
                        </div>
                      </div>
                      </a> </li>					      
				 <?php }} ?>
                  </ul>
                </div>
              </div>
            </div>       
		   <?php } ?>
            <!-- Panel Widget --> 
            
          </div>
       