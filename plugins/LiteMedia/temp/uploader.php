<?php
/**
LiteMedia v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteMedia : Base Class
* data-tempa = LiteCate-Editor : Base Class-Template hook name
*/
?><div class="panel  light-widget">
              <div class="panel-heading no-title"></div>
              <div class="panel-body">
			  <h2 class="pd-15 mgtp--5"><strong>Upload</strong> <em class="vd_soft-grey">Photo, Video, Sound & File</em> </h2>
			  <form enctype="multipart/form-data" method="post" action="<?php echo PROX_URL;?>ajax.php">
			  <input type="hidden"  name="class" value="LiteMedia" />
			   <input type="hidden"  name="function" value="upload" />
			    <input type="hidden" name="plugins" value="1" />
				<input type="hidden" name="url" value="<?php echo $data['url'];?>" />
				  <div class="form-group col-sm-4">
<input type="text" name="lmtitle" class="controls  " placeholder="<?php echo BCL('LiteMedia','desc');?>">
</div>
               <div class="form-group">
                        <div class="col-sm-4 controls">
                          <div class="input-group"><input type="file" name="lmfiles"  class="form-controls">
                            <div class="input-group-btn">
                              <button type="submit" class="btn  vd_bg-green vd_white" ><i class="fa fa-cloud-upload"></i> Upload</button>
                            </div>
                            <!-- /btn-group --> 
                          </div>
                          <!-- /input-group --> 
                        </div> <label class="col-sm-4 control-label"></label>
                      </div> 	
				
</form>					  
			   </div>
		    </div>