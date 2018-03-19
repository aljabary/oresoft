<div class="col-md-8"> 
<?php $Me->showHook($data['args'],$data['param'],'Body',1);?>
<?php $blog = $data['blog_single']; ?>
<div class="alert alert-success <?php if($_GET['msg'] !='oke'){ echo 'vd_hidden';}?>">
<span class="vd_alert-icon"><i class="fa fa-check vd_green"></i></span>
<strong><?php echo BCL('LiteTheme','contact_thenk');?></strong> <?php echo BCL('LiteTheme','contact_msg');?> </div>
<div class="alert alert-danger <?php if($_GET['msg'] !='error'){ echo 'vd_hidden';}?>">
<span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
<strong>Error!</strong> <?php echo BCL('LiteTheme','contact_er');?> </div>

             <div class="panel vd_quick-press-widget widget">
    <div class="panel-heading vd_bg-<?php echo $data['colheader'];?>">
        <h3 class="panel-title">
			<span class="menu-icon">
            	<i class="fa fa-envelope"></i>
            </span>        
	       Contact Us       
        </h3>
        <div class="vd_panel-menu">
 </div>
<!-- vd_panel-menu --> 
              
    </div>
    <div class="panel-body">
	<h2 class=""><i class="fa fa-envelope-o"></i> <?php echo $data['info_title'];?></h2>
	<?php echo $data['info_about'];?>
	<hr>
		<form role="form" action="<?php echo PROX_URL;?>contact/" method="post" class="form-horizontal">    
		<div class="form-group">
              <label class="col-sm-2 control-label">Name(*)</label>
              <div class="col-sm-10 controls">
                <input type="text" name="nm">
              </div>
            </div> 
			<div class="form-group">
              <label class="col-sm-2 control-label">Email(*)</label>
              <div class="col-sm-10 controls">
                <input type="text" name="email">
              </div>
            </div> 
			<div class="form-group">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10 controls">
                <input type="text" name="title">
              </div>
            </div> 
             <div class="form-group">
              	  <label class="col-sm-2 control-label">Message(*)</label>              
                  <div class="col-sm-10 controls">                                    
                         <textarea name="content" rows="3"></textarea>                                                
                  </div>                                 
            </div>
                      
            <div class="form-group">
              <div class="col-sm-2"></div>
			  <div class="col-sm-7 controls">
                  <button type="submit" class="btn vd_btn vd_bg-green vd_white"><i class="icon-ok"></i> Send</button>
			  </div>
            </div>               
          
                                      
        </form>     
    </div>
</div>
            <!-- Panel Widget --> 
            
          </div>
       