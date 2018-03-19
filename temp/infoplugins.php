
			 <div class="panel vd_quick-press-widget widget">
    <div class="panel-heading vd_bg-blue">
        <h3 class="panel-title">
			<span class="menu-icon">
            	<i class="fa fa-cube"></i>
            </span>        
	            <?php echo $this->plug->pagetitle['title'];?> 
        </h3>
        <div class="vd_panel-menu">
 </div>
<!-- vd_panel-menu --> 
              
    </div>
    <div class="panel-body">
					    <div class="panel ">
                  <div class="panel-heading vd_bg-black">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-info-circle"></i> </span> 
					<?php echo BCL('px','about').' '.$this->plug->pagetitle['title']; ?> </h3>
                  </div>
				  <address>
                    <strong><?php echo BCL('px','name');?></strong><br>
                   <?php echo $this->plug->Meta->name; ?><br>
				   <strong><?php echo BCL('px','base_class');?></strong><br>
                   <?php echo $this->plug->Base_Class; ?><br>
				   <strong><?php echo BCL('px','typeapp');?></strong><br>
                   <?php echo BCL('px',$this->plug->Meta->type); ?><br>
				    <strong><?php echo BCL('px','version');?></strong><br>
                   <?php echo$this->plug->Meta->version; ?><br>
				    <strong>Developer</strong><br>
                   <?php echo $this->plug->Meta->developer->name; ?><br>
                   <?php echo $this->plug->Meta->developer->address; ?><br>
                   <?php echo $this->plug->Meta->developer->contact; ?><br>
                   <?php echo $this->plug->Meta->developer->email; ?><br>
                   <?php echo $this->plug->Meta->developer->url; ?><br>
                  </address>
<?php 
$fn  	=	str_replace('{$this->url}',PROX_Domain.'/plugins/'.$this->plug->Base_Class.'/',$this->plug->Meta->info);
$fn =  file_get_contents($fn);
echo nl2br($fn); ?>				  
			   </div>
			      <div class="panel ">
                  <div class="panel-heading vd_bg-black">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-gavel"></i> </span> 
					<?php echo BCL('px','license').' '.$this->plug->pagetitle['title']; ?> </h3>
                  </div>
<?php 
$fn  	=	str_replace('{$this->url}',PROX_Domain.'/plugins/'.$this->plug->Base_Class.'/',$this->plug->Meta->license);
$fn =  file_get_contents($fn);
echo nl2br($fn);
 ?>				  
			   </div>
               
               
	</div></div>