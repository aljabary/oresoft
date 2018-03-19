<?php
/**
Category v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
?>
<?php 
$page = $data['page'];
?>
 <div class="panel widget" id="LitePageManager" data-temp="LitePageManager-editor">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-pencil-square-o"> </i> </span> <?php echo BCL('LitePageManager','page_editor'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
  
  <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				   
<div class="alert alert-info alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
<i class="fa fa-info-circle"></i><strong> Info !</strong> <?php echo BCL('LitePageManager','editor_info'); ?> <a href="<?php echo $page->url; ?>"><b> <?php echo $page->name; ?> </b></a></div>
<form id="lpm_form" role="form" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<div class="alert alert-danger vd_hidden">
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong><?php echo BCL('LitePageManager','er_msg_req_title');?></strong> <?php echo BCL('LitePageManager','er_msg_req');?> </div>
<div class="alert alert-success vd_hidden" >
                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong><?php echo BCL('LitePageManager','suc_msg_title');?></strong> <?php echo BCL('LitePageManager','suc_msg');?> <a id="art_link" href=""><b><?php echo BCL('LitePageManager','suc_msg_click');?></b></a> </div>
<input type="hidden" name="class" value="LitePageManager"/>	
<input type="hidden" name="function" value="submit"/>	
<input type="hidden" name="plugins" value="1" />	
<input type="hidden" name="editid" id="edit_id" value="<?php echo $page->id;?>"/>	
<input type="hidden" class="form-control" name="bc_cat" id="acat" />

<div class="form-group" >
<label><?php echo BCL('LitePageManager','desc'); ?></label>
<textarea type="text" class="form-control " name="lpm_desc" id="lpm_des"  ><?php echo $page->description;?></textarea>
</div>
<div class="form-group" >
<label>Content Page</label>
<?php $bb = $data['bb'];
$bb->getEditor($page->content,"lpm_editor");
?>
</div>
<div class="form-group" >
<label><?php echo BCL('LitePageManager','keyword'); ?> </label>
<input type="text" id="lpm_kw" name="lpm_keyword" value="<?php echo $page->keyword;?>" />
</div>
<button class="btn btn-primary pull-right" type="submit" id="bc_btn" >Save</button>
</form>		
					<!---end---></div>
                </div>          
<script>
var aform = $("#lpm_form");
 var error_register = $('.alert-danger', aform);
 var success_register = $('.alert-success', aform);
function subm(){
	var options = { 
		type: 'POST',
		url:  $('#lpm_form').attr('action'),
		success: function(data) {
			isub=1;
			scrollTo(aform,-100);
			if(data.response==200){
			$('#bc_btn').removeClass('disabled').html('Save');
			success_register.fadeIn(500);
			$("#edit_id").val(data.page.id);
			$("#art_link").attr("href",data.page.url)
				error_register.fadeOut(500);
			}else{
			$('#bc_btn').removeClass('disabled').html('Save');
			error_register.fadeIn(500);
				success_register.fadeOut(500);
			}
			
		},
		error:function(){
			isub=1;
			scrollTo(aform,-100);
			$('#bc_btn').removeClass('disabled').html('Save');
			success_register.fadeOut(500);
			error_register.fadeIn(500);
		}
	};
		$("#lpm_form").ajaxSubmit(options);	
		
}
var isub =1;
</script>	
				