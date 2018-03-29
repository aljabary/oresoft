<div class="col-md-8"> 
<?php 
$Me->showHook($data['args'],$data['param'],'Body',1);
 $blog = $data['blog_single']; ?>
            <div class="panel widget light-widget panel-bd-top <?php echo $data['colheader'];?>">             
              <div class="panel-heading no-title"> </div>
              <div class="panel-body">
                <h1 class="mgtp--5 font-bold"> <?php echo $blog->title; ?></h1>
                <p class="vd_soft-grey">By: <a href="#"><?php echo $blog->User->name; ?></a></p>
                <hr>
                <div class="row blog-content">
                  <div class="col-xs-12">
                    <p class="text-center"> <?php if($blog->Photo->source !=""){?><img src="<?php echo $blog->Photo->source; ?>"  alt="<?php echo $blog->title; ?>"> <?php } ?></p>
					<?php echo $blog->content; ?>
					</div>
                </div>
                <hr>
				
                <div class="row blog-info">
                  <div class="col-sm-4 blog-date font-sm"><i class="icon-clock  append-icon"></i><span class="vd_soft-grey"> <?php echo $blog->date; ?></span></div>
                  <div class="col-sm-6 blog-tags font-sm"><i class="fa fa-tags append-icon"></i>
				  <?php $cat =count($blog->Category); 
						$isc=0;
						for($icc=0;$icc < $cat;$icc++){
							$arcat = $blog->Category[$icc];
						?>
				 <?php if(!empty($arcat->name)){?> <span class="vd_<?php echo $data['collinknav'];?>"> <a class="vd_<?php echo $data['collinknav'];?>" href="<?php echo $arcat->url;?>"><?php echo $arcat->name;?></a>,
				 <?php }} ?>
				  </div>
                </div><hr>
				<div class="row blog-content">
                  <div class="col-xs-12">
                    <h2>Comments</h2>
                    <br>
                    <div class="vd_comments">
                      <ul class="commentlist clearfix">
					  <?php $comcore = $data['comcore'];
					   $status='all';
					  if($Me->Setting->getVal('comment','show')=='on'){
						  $status=3;
					  }
					 $coms =  $comcore->getList($status,'article',$blog->id, 0, 10);
					 for($i=0;$i<count($coms);$i++){
						 $com = $coms[$i];
						 ?>
                        <li class="comment" id="li-comment-1">
                          <div id="comment-1" class="comment-wrap clearfix">
                            <div class="comment-meta">
                              <div class="comment-author"> <img src="<?php echo $com->User->photo;?>"> </div>
                            </div>
                            <div class="comment-content clearfix">
                              <div class="comment-author"><?php echo $com->User->name;?></div>
                              <div class="comment-date"><a href="javascript:;"><?php echo $com->date;?></a> </div>
                              <div class="comment-arrow"></div>
                              <p class="comment-word"><?php echo $com->content;?></p>
                            </div>
                            <div class="clear"></div>
                          </div>
                        </li>
					 <?php } ?>
                      </ul>
                    </div>
                    <!-- vd_comments -->
                    
                    <div class="vd_comments-form clearfix">
                      <h3><?php echo BCL('LiteTheme','leave_com')?></h3>
                      <form class="clearfix" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<input type="hidden" name="class" value="LiteTheme\MainClass"/>	
<input type="hidden" name="function" value="sendComment"/>	
<input type="hidden" name="plugins" value="1" />
					  <?php if($data['im']->id < 1 && $Me->Setting->getVal('comment','mod')=='on'){ ?>
                        <div class="row">
                          <div class="col-md-7">
                            <div class="form-group">
                              <label for="author">Name <span class="vc_red">*</span></label>
                              <div class="controls">
                                <input type="text" name="name" id="author" value="" size="22" tabindex="1">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-7">
                            <div class="form-group">
                              <label for="author-email">Email <span class="vc_red">*</span> <small>(will not be published)</small></label>
                              <div class="controls">
                                <input type="text" name="email" id="author-email" value="" size="22" tabindex="2">
                              </div>
                            </div>
                          </div>
                        </div>
					  <?php } ?>
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label for="comment">Comment</label>
                              <div class="controls">
							  <input type="hidden" name="article" value="<?php echo $blog->id?>" />
                                <textarea id="comment" name="comment" cols="58" rows="10" tabindex="4"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="vd_btn btn vd_bg-green">Submit Comment</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
				
            </div>
			 
            </div>
            <!-- Panel Widget --> 
            
          </div>
       