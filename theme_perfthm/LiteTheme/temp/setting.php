<?php
/**
LiteTheme v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteCate : Base Class
* data-tempa = LiteTheme-setting : Base Class-Template hook name
*/
?>
 <div class="panel widget" id="LiteTheme" data-temp="LiteTheme-setting">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-gear"> </i> </span> <?php echo BCL('LiteTheme','title'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
  
  <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
			<?php // $Me->Setting->getVal('color', 'header'); ?>

			
<div class="col-sm-4 panel-body"><h4><?php echo BCL('LiteTheme','comment'); ?></h4></div>			
<div class="col-sm-6 panel-body">			
<form id="cateditor" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<input type="hidden" name="class" value="LiteTheme"/>	
<input type="hidden" name="function" value="UpdateSettingCom"/>	
<input type="hidden" name="plugins" value="1" />	
<div class="form-group" >
<label>
<input type="checkbox" name="icom" <?php if($Me->Setting->getVal('comment','mod')=='on'){echo 'checked'; }?> /> <?php echo BCL('LiteTheme','com_set'); ?></label>
</div>	
<div class="form-group" >
<label>
<input type="checkbox" name="icom" <?php if($Me->Setting->getVal('comment','show')=='on'){echo 'checked'; }?> /> <?php echo BCL('LiteTheme','com_set2'); ?></label>
</div>
<button class="btn btn-primary pull-right" type="submit" >Save</button>
</form></div><br>			
<div class="col-sm-4 panel-body"><h4><?php echo BCL('LiteTheme','color'); ?></h4></div>			
<div class="col-sm-6 panel-body">			
<form id="cateditor" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<input type="hidden" name="class" value="LiteTheme"/>	
<input type="hidden" name="function" value="UpdateSetting"/>	
<input type="hidden" name="plugins" value="1" />	
<div class="form-group" >
<label><?php echo BCL('LiteTheme','color_header'); ?></label>
<select class="form-control" name="col_header" >
<option value="<?php echo $Me->Setting->getVal('color','header');?>"><?php echo $Me->Setting->getVal('color','header');?></option>
<option value="green">Hijau</option><option value="blue">Biru</option>
<option value="googleplus">Merah</option><option value="black">Hitam</option><option value="red">Orange</option>
<option value="twitter">Biru Muda</option><option value="white">Putih</option></select>
</div>
<div class="form-group" >
<label><?php echo BCL('LiteTheme','color_button'); ?></label>
<select class="form-control" name="col_button" ><option value="<?php echo $Me->Setting->getVal('color','button');?>"><?php echo $Me->Setting->getVal('color','button');?></option>
<option value="green">Hijau</option><option value="blue">Biru</option>
<option value="googleplus">Merah</option><option value="black">Hitam</option><option value="red">Orange</option>
<option value="twitter">Biru Muda</option><option value="white">Putih</option></select>
</div>
<div class="form-group" >
<label><?php echo BCL('LiteTheme','color_label'); ?></label>
<select class="form-control" name="col_label" ><option value="<?php echo $Me->Setting->getVal('color','label');?>"><?php echo $Me->Setting->getVal('color','label');?></option>
<option value="green">Hijau</option><option value="blue">Biru</option>
<option value="googleplus">Merah</option><option value="black">Hitam</option><option value="red">Orange</option>
<option value="twitter">Biru Muda</option><option value="white">Putih</option><option value="yellow">Kuning</option>
</select>
</div>
<div class="form-group" >
<label><?php echo BCL('LiteTheme','color_linknav'); ?></label>
<select class="form-control" name="col_linknav" ><option value="<?php echo $Me->Setting->getVal('color','linknav');?>"><?php echo $Me->Setting->getVal('color','linknav');?></option>
<option value="green">Hijau</option><option value="blue">Biru</option>
<option value="googleplus">Merah</option><option value="black">Hitam</option><option value="red">Orange</option>
<option value="twitter">Biru Muda</option><option value="white">Putih</option></select>
</div>

<div class="form-group" >
<label><?php echo BCL('LiteTheme','color_footer'); ?></label>
<select class="form-control" name="col_footer" ><option value="<?php echo $Me->Setting->getVal('color','footer');?>"><?php echo $Me->Setting->getVal('color','footer');?></option>
<option value="green">Hijau</option><option value="blue">Biru</option>
<option value="googleplus">Merah</option><option value="black">Hitam</option><option value="red">Orange</option>
<option value="twitter">Biru Muda</option><option value="white">Putih</option></select>
</div>

<button class="btn btn-primary pull-right" type="submit" >Save</button>
</form></div><br>		
<div class="col-sm-4 panel-body"><h4><?php echo BCL('LiteTheme','social'); ?></h4></div>	
<div class="col-sm-6 panel-body">
		
<form id="cateditor" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<input type="hidden" name="class" value="LiteTheme"/>	
<input type="hidden" name="function" value="UpdateSettingSosial"/>	
<input type="hidden" name="plugins" value="1" />
<div class="row"><div class="col-sm-2 col-xs-2">
<a class="btn vd_btn vd_bg-facebook vd_round-btn btn-sm  mgr-10 "><i class="fa fa-facebook fa-fw "></i></a>
</div>
<div class="form-group col-sm-10 col-xs-10" >
<input type="text" class="form-color" name="fb" value="<?php echo $Me->Setting->getVal('social','facebook');?>" placeholder="https://facebook.com/yourfanspage" />
</div>
</div>
<div class="row"><div class="col-sm-2 col-xs-2">
 <a class="btn vd_btn vd_bg-googleplus vd_round-btn btn-sm  mgr-10"><i class="fa fa-google-plus fa-fw"></i></a>
</div>
<div class="form-group col-sm-10 col-xs-10" >
<input type="text" class="form-color"  name="gp" value="<?php echo $Me->Setting->getVal('social','googlplus');?>" placeholder="https://google.com/+yourgoogleplus/">
</div>
</div>
<div class="row"><div class="col-sm-2 col-xs-2">
 <a class="btn vd_btn vd_bg-twitter vd_round-btn btn-sm mgr-10"><i class="fa fa-twitter fa-fw "></i></a> 
</div>
<div class="form-group col-sm-10 col-xs-10" >
<input type="text" class="form-color"  name="tw" value="<?php echo $Me->Setting->getVal('social','twitter');?>"  placeholder="https://twitter.com/yourtwitter" />
</div>
</div> 
<button class="btn btn-primary pull-right" type="submit" >Save</button>
</form>                  
                   
</div>

<br>		
<div class="col-sm-4 panel-body"><h4><?php echo BCL('LiteTheme','logo'); ?></h4></div>	
<div class="col-sm-6 panel-body">
		
<form id="cateditor" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<input type="hidden" name="class" value="LiteTheme"/>	
<input type="hidden" name="function" value="UpdateSettingLogo"/>	
<input type="hidden" name="plugins" value="1" />

<label><?php echo BCL('LiteTheme','logo_h'); ?> x <?php echo BCL('LiteTheme','logo_w'); ?> + <?php echo BCL('LiteTheme','logo_m'); ?></label>
<div class="row">
<div class="form-group col-sm-4 col-xs-4" >
<input type="text" class="form-color" name="l_h" value="<?php echo $Me->Setting->getVal('logo','_h');?>"/>
</div>
<div class="form-group col-sm-4 col-xs-4" >
<input type="text" class="form-color" name="l_w" value="<?php echo $Me->Setting->getVal('logo','_w');?>" />
</div>
<div class="form-group col-sm-4 col-xs-4" >
<input type="text" class="form-color" name="l_m" value="<?php echo $Me->Setting->getVal('logo','_m');?>" />
</div>
</div>

<button class="btn btn-primary pull-right" type="submit" >Save</button>
</form>                  
                   
</div>	

					<!---end---></div>
                </div>