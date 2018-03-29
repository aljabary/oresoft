<?php
/**
Category v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LitePageManager : Base Class
* data-tempa = LitePageManager-Editor : Base Class-Template hook name
*/
$page = $data['page'];
echo $data['lc']->getCss();
?>
 <div class="panel widget" id="LitePageManager" data-temp="LitePageManager-Editor">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-pencil-square-o"> </i> </span> <?php echo BCL('LitePageManager','menu1'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
 <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				  
<div class="alert alert-danger alert-dismissable" <?php echo$data['showerror']; ?>> <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
<i class="fa fa-warning append-icon"></i><strong>Error !</strong> <?php echo BCL('LitePageManager','slug_error'); ?></div>
									
			<div class="panel light-widget panel-bd-left">
                  <div class="panel-heading no-title">
   <?php echo BCL("LitePageManager","dnd");?>
  </div>
  <div class="panel-body"><div id="treeCheckbox">
										<?php echo $Me->createTree($data["tree"],0);?>
									</div>
<a href="" id="lpm_btn" class="btn btn-success pull-right" style="display:none"><i class="fa fa-pencil"></i> Edit Content</a>									
                     </div>
</div>
                  
<form id="cateditor" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<input type="hidden" name="class" value="LitePageManager\MainClass"/>	
<input type="hidden" name="function" value="addnew"/>	
<input type="hidden" name="plugins" value="1" />	
<input type="hidden" name="editid" id="edit_id"/>	
<input type="hidden" name="parent" id="parent_id"/>
<input type="hidden" name="lpm_cat" id="lpm_catid"/>
<div class="form-group" id="lcp" style="display:none;" >
<label><?php echo BCL('LitePageManager','parent'); ?></label>
<input type="text" class="form-control" name="lpm_parentname" id="lpm_parentname" disabled/>
</div>
<div class="form-group" >
<label><?php echo BCL('LitePageManager','create'); ?></label>
<input type="text" class="form-control" name="lpm_name" id="lpm_nameid"/>
</div>

<div class="form-group" >
<label><?php echo BCL('LitePageManager','pgtype'); ?></label>
                          <div class="vd_radio radio-success">
                            <input type="radio" onchange="showcat(1)" value="dinamic" name="lpm_tp" id="yes">
                            <label for="yes"><?php echo BCL('LitePageManager','dinamic'); ?></label>
                          </div>
						 
                          <div class="vd_radio radio-success">
                            <input type="radio" onchange="showcat(0)" value="static" name="lpm_tp" id="no">
                            <label for="no"><?php echo BCL('LitePageManager','static'); ?></label>
                          </div>
                        </div>
 <div class="form-group" style="display:none" id="lpm_cls">
						  <label><?php echo BCL('LitePageManager','selcat'); ?></label>
<select class="form-group" name="lpm_category" id="lpm_categoryid">
<?php $catlist = $data['catlist'];
for($icl=0;$icl<count($catlist);$icl++){
	$cate = $catlist[$icl];
?>
<option value="<?php echo $cate->id;?>" id="cl<?php echo $cate->id;?>"><?php echo $cate->name;?></option><?php } ?></select>						  
</div>						
<div class="form-group" >
<label><?php echo BCL('LitePageManager','slug'); ?></label>
<div class="row">
<div class="alert alert-warning alert-dismissable"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
<i class="fa fa-warning append-icon"></i><strong>Peringatan !</strong> <?php echo BCL('LitePageManager','slug_warning'); ?></div>
<div class="col-sm-2 col-md-2" style="padding:0px"><b><?php echo PROX_URL ?></b></div>
<div class="col-sm-8 col-md-b">
<input type="text" class="form-control" name="lpm_slug" id="lpm_slugid" />
</div></div>
<div class="form-group" >
<button class="btn btn-primary pull-right" type="submit" >Save</button>
</form>	
 </div> </div>	
					<!---end---></div>
                </div>
<script>
var lpm_page =[];
<?php
$CL = $data['tree'];
 foreach($CL as $cat){
				//$cat = $CL[$i];
			echo 'lpm_page['.$cat->id.']={name:"'.$cat->name.'",slug:"'.$cat->slug.'",pagetype:"'.$cat->type.'",category:"'.$cat->Category->name.'",cat_id:"'.$cat->Category->id.'"};';
}
				?>
 $(document).ready(function(){jstree();});
function LCedit(n){
	
	$("#lcp").hide();
	var lcate = lpm_page[n];
	if(lcate.name){
	$("#edit_id").val(n);
	$("#lpm_nameid").val(lcate.name);
	$("#lpm_slugid").val(lcate.slug);
	$("#parent_id").val(0);
	$("#cl"+lcate.cat_id).remove();
	var newcat = '<option id="cl'+lcate.cat_id+'" value="'+lcate.cat_id+'">'+lcate.category+'</option>';
	var catsel = $("#lpm_categoryid").html();
	$("#lpm_categoryid").html(newcat+catsel);console.log(lcate.pagetype);
	$("#lpm_btn").attr("href","<?php echo PROX_URL_ADMIN;?>/plugins/LitePageManager/editor/"+n)
	$("#lpm_btn").show()
	if(lcate.pagetype =='dinamic'){
		$("#yes").attr("checked","checked");
		$("#no").removeAttr("checked");
		$("#lpm_cls").show();
	}else{
		$("#no").attr("checked","checked");
		$("#yes").removeAttr("checked");$("#lpm_cls").hide();				
	}
	}
}
function LCchild(n){	
var lcate = lpm_page[n];
	$("#lcp").show();
	$("#edit_id").val(0);
	$("#parent_id").val(n);
	$("#lpm_parentname").val(lcate.name);
}
var tau={opt:null,pin:null,obj:[],obt:[],prt:null,child:null,opt:null,
toform:function(){
	LCedit(tau.pin.li_attr.catid);
},
setparent:function(){
	var par ="0";
	if(tau.prt.id !="#"){
		par =tau.prt.li_attr.catid;
	}
	$.ajax({
		url:"<?php echo PROX_URL;?>ajax.php",
		data: "class=LitePageManager.MainClass&function=updateparent&plugins=1&parent="+par+"&child="+tau.child.li_attr.catid,
	});
},

selcat:function(){
var dk = tau.opt.data();
var m = dk.jstree._model.data;
	var ct="";
for(var i =1;i<c;i++){
	var cat = m[i];
	//console.log(cat.state.selected.toString());
	if(cat.state.selected){
		ct += cat.li_attr.catid+",";console.log(ct);
	}
}
$("#lpm_nameid").val(ct);//setTimeout("subm()",500);
},
};

function jstree(){

	'use strict';
/*
	Checkbox
	*/
	$('#treeCheckbox').jstree({
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
		'plugins': ['types','dnd','sort','wholerow']
	});
}
function showcat(n){
	if(n > 0){
		$("#lpm_cls").show();
	}else{
		$("#lpm_cls").hide();		
	}
}
/*
var dk = tau.opt.data();
var m = dk.jstree._model.data;
*/


</script>			

<script src="<?php echo PROX_URL;?>plugins/LiteCat/js/jstree.js" ></script>	
				