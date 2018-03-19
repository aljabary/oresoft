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
                    <h3 class="panel-title"> <span class="menu-icon"><i class=" icon-user-add"> </i> </span> <?php echo $this->Plugin_Handler->Meta->name.' | '.BCL('px','role_level'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
   <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				  <?php echo BCL('px','ex_user_role');?>
				   				<!---end---></div>
                </div> 