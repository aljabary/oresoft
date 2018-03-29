<?php
/**
Category v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
?>
<?php 
$article = $data['article'];
?>
 <div class="panel widget" id="BlogBooster" data-temp="BlogBooster-editor">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-pencil-square-o"> </i> </span> <?php echo BCL('Blog_Booster','art_write'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
   <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				   
<form id="aform" role="form" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<div class="alert alert-danger vd_hidden">
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong><?php echo BCL('Blog_Booster','er_msg_req_title');?></strong> <?php echo BCL('Blog_Booster','er_msg_req');?> </div>
<div class="alert alert-success vd_hidden" >
                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong><?php echo BCL('Blog_Booster','suc_msg_title');?></strong> <?php echo BCL('Blog_Booster','suc_msg');?> <a id="art_link" href=""><b><?php echo BCL('Blog_Booster','suc_msg_click');?></b></a> </div>
<input type="hidden" name="class" value="BlogBooster\MainClass"/>	
<input type="hidden" name="function" value="submit"/>	
<input type="hidden" name="plugins" value="1" />	
<input type="hidden" name="editid" id="edit_id" value="<?php echo $article->id;?>"/>	
<input type="hidden" class="form-control" name="bc_cat" id="acat" />

<div class="form-group" >
<label><?php echo BCL('Blog_Booster','title'); ?> (*)</label>
<input type="text" class="form-control required" name="bc_title" id="atitle" value="<?php echo $article->title;?>" required/>
</div>
<div class="form-group" >
<a href="javascript:void(0);" onclick="PXMedia.browser(selectphoto,'photo')" class="btn btn-info" data-toggle="modal" data-target="#PXMediaBrowser"><?php echo BCL('Blog_Booster','upload_photo'); ?> </a>
</div>	
<div class="form-group" >
<img src="<?php echo $article->Photo->thumb[250];?>" id="aimg" style="width:220px;height:220;px"/>
<input type="hidden" class="form-control required" name="bc_photo" id="aphoto" value="<?php echo $article->Photo->id;?>" />
</div>			
<div class="form-group" >
<label><?php echo BCL('Blog_Booster','headline'); ?></label>
<textarea type="text" class="form-control " name="bc_headline" id="aheadline"  ><?php echo $article->headline;?></textarea>
</div>
<div class="form-group" >
<textarea type="text" class="form-control " name="bc_editor" id="aeditor"  ><?php echo $article->content;?></textarea>
</div>
<div class="form-group" >
<label><?php echo BCL('Blog_Booster','sel_cat'); ?></label>
<?php 
$LC = $data['lc'];
$LC->CatOption($article, 'treeCheckbox');
?>
</div>
<div class="form-group" >
<label><?php echo BCL('Blog_Booster','keyword'); ?> </label>
<input type="text" id="akeyword" name="bc_keyword" value="<?php echo $article->keyword;?>" />
</div>
<div class="form-group" >
<label><?php echo BCL('Blog_Booster','sel_tag'); 
$ct = $article->tags;
for($i=0;$i<count($ct);$i++){;
	$tag .=$ct[$i].',';
}
?></label>
<input type="text" id="atags" name="bc_tag" value="<?php echo $tag;?>"/>
</div>
<button class="btn btn-primary pull-right" type="submit" id="bc_btn" >Save</button>
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
			$('#bc_btn').removeClass('disabled').html('Save');
			success_register.fadeIn(500);
			$("#edit_id").val(data.article.id);
			$("#art_link").attr("href",data.article.url)
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
		$("#aform").ajaxSubmit(options);					
					
		
}
var Category =[];
var tau={opt:null,pin:null,obj:[],obt:[],prt:null,child:null,
toform:function(){//	LCedit(tau.pin.li_attr.catid);
},
selcat:function(form){
var dk = tau.opt;
var m = dk._model.data;
	var ct="";
for(var i =1;i<c;i++){
	var cat = m[i];
	//console.log(cat.state.selected.toString());
	if(cat.state.selected){
		ct += cat.li_attr.catid+",";
	}
}
$("#acat").val(ct);setTimeout("subm()",500);
},

};

function jstree(){
	'use strict';
/*	Checkbox
	*/
	tau.opt =$('#treeCheckbox').jstree({
		'core' : {
			'check_callback' :  function (operation, node, node_parent, node_position, more) {
		tau.prt =node_parent;tau.child =node;		 
		 },		
			'themes' : {
				'responsive': true
			}
		},
		 'onclick':function (options, parent) {
		 console.log("oke");	},
		'types' : {
			'default' : {
				'icon' : 'fa fa-folder'
			},
			'file' : {
				'icon' : 'fa fa-file'
			}
		},
		'plugins': ['types','dnd','sort','wholerow','checkbox']
	});
}
var isub =1;var mdc;
function selectphoto(id,src){
	$("#aimg").attr("src",src);
	$("#aphoto").val(id);
}
var mdc;
$(document).ready(function(){
 mdc = new PX.Media();
});
</script>	

<script src="<?php echo PROX_URL;?>plugins/LiteCat/js/jstree.js" ></script>	
				