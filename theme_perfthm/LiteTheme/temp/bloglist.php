<div class="col-md-8"> 
<?php $Me->showHook($data['args'],$data['param'],'Body',1);?>
<?php $blog = $data['blog']; ?>
            <div class="panel widget light-widget panel-bd-top <?php echo $data['colheader'];?>">
              <div class="panel-heading no-title"> </div>
              <div class="panel-body">
                <div class="content-list content-blog-large">
                  <ul class="list-wrapper">
				  <?php for($i=0;$i<count($blog);$i++){
					  $article = $blog[$i];
					  ?>
                    <li>
                      <div class="menu-icon"> <img alt="<?php echo $article->title; ?>" src="<?php echo $article->Photo->thumb[250]; ?>"> </div>
                      <div class="menu-text">
                        <h2 class="blog-title font-bold letter-xs"><a href="<?php echo $article->url; ?>" title="<?php echo $article->title; ?>"> <?php echo $article->title; ?> </a></h2>
                        <div class="menu-info">
                          <div class="menu-date font-xs"><?php echo $article->date; ?> </div>
                        </div>
                        <div class="menu-tags  mgbt-xs-15">
						<?php $cat =count($article->Category); 
						$isc=0;
						for($icc=0;$icc < $cat;$icc++){
							$arcat = $article->Category[$icc];
						if(!empty($arcat->name) && $isc ==0){$isc=1;
						?>
						<a href="<?php echo $arcat->url; ?>"><span class="label vd_bg-<?php echo $data['collabel'];?>"><?php echo $arcat->name; ?></span></a>
						<?php }}?></div>
                        <p><?php echo $article->headline; ?></p>
                        <a class="btn vd_btn vd_bg-<?php echo $data['colbutton'];?> btn-sm" href="<?php echo $article->url; ?>">Read More</a> </div>
                    </li>
     
				  <?php }?>
                  </ul>
                </div>
				<br/>
            <ul class="pagination"><?php $pageobj = $data['pageobj'];?>
              <li><a href="<?php $bef =$data['pg'] ; echo PROX_URL.$data['slug'].'/'.$bef;?>">«</a></li>
			  <?php $curpg = $data['curpg']; $next =$data['pg'] + 2; for($i=0;$i<5;$i++){ $num =$i+1;  ?>
              <li <?php echo $curpg[$i]; ?>><a href="<?php echo PROX_URL.$data['slug'].'/'.$num;?>"><?php echo $num; ?></a></li>
               <?php } ?>	
              <li><a href="<?php echo PROX_URL.$data['slug'].'/'.$next;?>">»</a></li>
            </ul>
              </div>
            </div>
            <!-- Panel Widget --> 
            
          </div>
       