<?php
/**
User Management v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
?>
<?php 
$article = $data['article'];
?>
 <div class="panel widget" id="User_Management" data-temp="User_Management-editor">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class=" icon-user-add"> </i> </span> <?php echo BCL('User_Management','add'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
   <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				   
<form id="aform" role="form" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<div class="alert alert-danger vd_hidden">
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong><?php echo BCL('User_Management','er_msg_req_title');?></strong> <p id="um_er"><?php echo BCL('User_Management','er_msg_req');?> </p></div>
<div class="alert alert-success vd_hidden" >
                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong><?php echo BCL('User_Management','suc_msg_title');?></strong> <?php echo BCL('User_Management','suc_msg');?> <a id="art_link" href=""><b><?php echo BCL('User_Management','suc_msg_click');?></b></a> </div>
<input type="hidden" name="class" value="User_Management"/>	
<input type="hidden" name="function" value="submit_add"/>	
<input type="hidden" name="plugins" value="1" />	
<input type="hidden" name="editid" id="edit_id" value="<?php echo $article->id;?>"/>	


<div class="form-group" >
<label><?php echo BCL('User_Management','name'); ?> (*)</label>
<input type="text" class="form-control required" name="um_name" id="atitle" value="<?php echo $article->title;?>" required/>
</div>
<div class="form-group" >
<label><?php echo BCL('User_Management','role'); ?> (*)</label></div>
<div class="form-group" >
<label>
<input type="radio"  name="um_role" id="atitle" class="required"  required/>
<?php echo BCL('User_Management','master'); ?>  
</label>                                        
<label>                                         
<input type="radio" name="um_role" id="atitle"  class="required" required/>
<?php echo BCL('User_Management','adm'); ?>      
</label>                                         
<label>                                          
<input type="radio" name="um_role" id="atitle"  class="required" required/>
<?php echo BCL('User_Management','editor'); ?>  
</label>                                        
<label>                                         
<input type="radio" name="um_role" id="atitle"  class="required" required/>
<?php echo BCL('User_Management','user'); ?></label>
</div>

<div class="form-group" >
<label><?php echo BCL('User_Management','email'); ?> (*)</label>
<input type="text" class="form-control required" name="um_mail" id="atitle" value="<?php echo $article->title;?>" required/>
</div>

<div class="form-group" >
<label><?php echo BCL('User_Management','password'); ?> (*)</label>
<input type="text" class="form-control required" name="um_password" id="atitle" value="<?php echo $article->title;?>" required/>
</div>

<div class="form-group" >
<label><?php echo BCL('User_Management','repassword'); ?> (*)</label>
<input type="text" class="form-control required" name="um_repassword" id="atitle" value="<?php echo $article->title;?>" required/>
</div>
		
<div class="form-group" >
<label><?php echo BCL('User_Management','bio'); ?></label>
<textarea type="text" class="form-control " name="um_bio" id="aheadline"  ><?php echo $article->headline;?></textarea>
</div>
<button class="btn btn-primary pull-right" type="button" onclick="subm()" id="bc_btn" >Save</button>
</form>		
					<!---end---></div>
                </div>          
<script>
var aform = $("#aform");
 var error_register = $('.alert-danger', aform);
 var success_register = $('.alert-success', aform);
 
function subm(){
	var options = { 
		type: 'POST',
		url:  $('#aform').attr('action'),
		success: function(data) {
			isub=1;
			scrollTo(aform,-100);
			if(data.response==200){
				$(".alert").hide();
				$('#bc_btn').removeClass('disabled').html('Save');
				success_register.fadeIn(500);
				$("#edit_id").val(data.article.id);
				$("#art_link").attr("href",data.article.url)
				error_register.fadeOut(500);
				
			}else{
				$(".alert").hide();
			$('#bc_btn').removeClass('disabled').html('Save');
			$("#um_er").html(data.msg);
			error_register.fadeIn(500);
				success_register.fadeOut(500);
			}
			
		},
		error:function(){
			$(".alert").hide();
			isub=1;
			scrollTo(aform,-100);
			$('#bc_btn').removeClass('disabled').html('Save');
			success_register.fadeOut(500);
			error_register.fadeIn(500);
		}
	};
		$("#aform").ajaxSubmit(options);					
					
		
}
</script>	

				