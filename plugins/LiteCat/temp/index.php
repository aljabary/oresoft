<?php
/**
Category v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteCate : Base Class
* data-tempa = LiteCate-Editor : Base Class-Template hook name
*/
?>
 <div class="panel widget" id="LiteCat" data-temp="LiteCat-Editor">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-pencil-square-o"> </i> </span> <?php echo BCL('LiteCat','menu1'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
  
  <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				  
									
			<div class="panel widget light-widget panel-bd-left">
                  <div class="panel-heading no-title">
   Category <?php echo BCL("LiteCat","dnd");?>
  </div>
  <div class="panel-body"><div id="treeCheckbox">
										<?php echo $Me->createTree($data["tree"],0);?>
									</div>
                     </div>
</div>
                  
			<?php 
			$to = date('Y-m-d-H-i-s');
			
			?>
<form id="cateditor" action="<?php echo PROX_URL.'ajax.php'; ?>" method="post">	
<input type="hidden" name="class" value="LiteCat\MainClass"/>	
<input type="hidden" name="function" value="addnew"/>	
<input type="hidden" name="plugins" value="1" />	
<input type="hidden" name="editid" id="edit_id"/>	
<input type="hidden" name="parent" id="parent_id"/>
<div class="form-group" id="lcp" style="display:none;" >
<label><?php echo BCL('LiteCat','parent'); ?></label>
<input type="text" class="form-control" name="name" id="lcparentname" disabled/>
</div>
<div class="form-group" >
<label><?php echo BCL('LiteCat','create'); ?></label>
<input type="text" class="form-control" name="name" id="lcname"/>
</div>
<div class="form-group" >
<label><?php echo BCL('LiteCat','create_desc'); ?></label>
<textarea type="text" class="form-control" name="desc" id="lcdesc"></textarea>
</div>
<div class="form-group" >
<label><?php echo BCL('LiteCat','create_key'); ?></label>
<textarea type="text" class="form-control" name="keywords" id="lckey"></textarea>
</div>
<button class="btn btn-primary pull-right" type="submit" >Save</button>
</form>		
					<!---end---></div>
                </div>
<script>
var Category =[];
<?php
$CL = $data['tree'];
 for($i=0;$i<count($CL);$i++){
				$cat = $CL[$i];
				echo 'Category['.$cat->id.']={name:"'.$cat->name.'",desc:"'.$cat->description.'",key:"'.$cat->keyword.'"};';
}
				?>
 $(document).ready(function(){jstree();});
function LCedit(n){
	$("#lcp").hide();
	var lcate = Category[n];
	$("#edit_id").val(n);
	$("#lcname").val(lcate.name);
	$("#lcdesc").val(lcate.desc);
	$("#lckey").val(lcate.key);
	$("#parent_id").val(0);
}
function LCchild(n){	
var lcate = Category[n];
	$("#lcp").show();
	$("#edit_id").val(0);
	$("#parent_id").val(n);
	$("#lcparentname").val(lcate.name);
}
var tau={opt:null,pin:null,obj:[],obt:[],prt:null,child:null,
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
		data: "class=LiteCat.MainClass&function=updateparent&plugins=1&parent="+par+"&child="+tau.child.li_attr.catid,
	});
}
};

function jstree(){

	'use strict';
/*
	Checkbox
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
		'plugins': ['types','dnd','sort','wholerow']
	});
}
/*
var dk = tau.opt.data();
var m = dk.jstree._model.data;
*/


</script>			

<script src="<?php echo PROX_URL;?>plugins/LiteCat/js/jstree.js" ></script>	
				