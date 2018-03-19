<?php
/**
Category v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
<script src="<?php echo PROX_URL;?>plugins/LiteCat/js/jstree.js" ></script>	
**/
?>
<div id="<?php echo $data['idel']; ?>"><?php  echo $Me->createTree($data["tree"],0,$data["article"]);?></div> <script>var c = <?php echo  count($data["tree"])+1; ?>;</script>	
<script>
 $(document).ready(function(){jstree<?php echo $data['idel']; ?>();});
 
function jstree<?php echo $data['idel']; ?>(){

	'use strict';
/*
	Checkbox
	*/
	tau.opt =$('#<?php echo $data['idel']; ?>').jstree({
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
</script>