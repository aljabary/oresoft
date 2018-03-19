<?php
/**
LiteMessage v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteMessage : Base Class
* data-tempa = LiteMessage-inbox : Base Class-Template hook name
*/
?>
 <div class="panel widget" id="LiteMessage" data-temp="LiteMessage-inbox">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-envelope"> </i> </span> <?php echo BCL('LiteMessage','inbox'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
  
  <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				  
				  
				  <div class="vd_navbar vd_nav-width vd_navbar-email vd_bg-black-80  vd_navbar-style-2 col-sm-1" style="position:relative">
	<div class="navbar-tabs-menu clearfix">
			<span class="expand-menu" data-action="expand-navbar-tabs-menu">
            	<span class="menu-icon menu-icon-left">
            		<i class="fa fa-ellipsis-h"></i>
                    <span class="badge vd_bg-red">
                        20
                    </span>                    
                </span>
            	<span class="menu-icon menu-icon-right">
            		<i class="fa fa-ellipsis-h"></i>
                    <span class="badge vd_bg-red">
                        20
                    </span>                    
                </span>                
            </span>  
            <div class="menu-container">               
        		 <div class="navbar-search-wrapper">
    <div class="navbar-search vd_bg-black-30">
        <span class="append-icon"><i class="fa fa-search"></i></span>
        <input type="text" placeholder="Search" class="vd_menu-search-text no-bg no-bd vd_white width-70" name="search">
        <div class="pull-right search-config">                                
            <a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle"><span class="prepend-icon vd_grey"><i class="fa fa-cog"></i></span></a>
            <ul role="menu" class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>                                    
        </div>
    </div>
</div>  
            </div>        
                                                 
    </div>
	<div class="navbar-menu clearfix">
    	<h3 class="menu-title hide-nav-medium hide-nav-small">
		<a href="email-compose.html" class="btn vd_btn vd_bg-red"><span class="append-icon"><i class="icon-feather"></i></span><?php echo BCL('LiteMessage','write'); ?></a></h3>
        <div class="vd_menu">
        	<ul>
	<li class="line vd_bd-grey">
    </li>
 	<li>
    	<a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteMessage/inbox/'?>">
        	<span class="menu-icon entypo-icon"><i class="icon-mail"></i></span> 
            <span class="menu-text">Inbox</span> 
			
            <span class="menu-badge"><span class="badge vd_bg-red"><?php echo $data['ib_unread']?>+</span></span>
       	</a> 
    </li> 
           
                               
</ul>
<!-- Head menu search form ends -->   
      </div>  

            
    </div>
    <div class="navbar-spacing clearfix">
    </div>
</div>

				<div class="col-sm-8 panel-body  table-responsive">
				<form id="flminbox" action="<?php echo PROX_URL;?>ajax.php" method="POST" />
				<input type="hidden" id="lmact" name="act" />
				<input type="hidden" name="class" value="LiteMessage" />
				<input type="hidden" name="function" value="doaction" />
				<input type="hidden" name="plugins" value="1" />
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th> <div class="vd_checkbox">
                          <input type="checkbox" id="checkbox-0">
                          <label for="checkbox-0"></label>
                        </div>
                      </th>
					 
                      <th colspan="3"> 
                      <div class="mgr-20 menu-btn"><a role="button" onclick="$('#lmact').val('delete');$('#flminbox').submit()"><i class="icon-trash append-icon vd_green"></i> <?php echo BCL('LiteMessage','delete'); ?></a></div> 
                      <div class="mgr-20 menu-btn"><a role="button" onclick="$('#lmact').val('read');$('#flminbox').submit()"><i class="fa fa-eye vd_green"></i> <?php echo BCL('LiteMessage','isread'); ?></a></div> 
                       
                        </div> </th>
                    </tr>
                  </thead>
                  <tbody>
		<?php $msgs = $data['msgs'];
		$my = new User();
		for($im =0;$im<count($msgs);$im++){
			$msg  = $msgs[$im];
			$name = $msg->User->name;
			$tl = explode('|',$msg->title);
			
			if($msg->User->name == $my->name || $name==""){
				$name = $tl[0];
			}
			$title = $tl[1];
			if(empty($tl[1])){
				$title ='Subject';
			}
			?>		  
                    <tr class="">
                      <td><div class="vd_checkbox">
                          <input type="checkbox" id="checkbox-<?php echo $msg->id; ?>" name="icheck[]" value="<?php echo $msg->id; ?>" class="checkbox-group">
                          <label for="checkbox-<?php echo $msg->id; ?>"></label>
                        </div></td>
                      
                      <td><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteMessage/read/?msg='.$msg->messenger?>"><?php echo $name; ?></a></td>
                      <td><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteMessage/read/?msg='.$msg->messenger?>"><strong><?php echo $title; ?></strong></a> 
					  </td>
                      <td class="text-right"><strong><?php echo $msg->date; ?></strong></td>
					  
                    </tr>
		<?php } ?>
                   </tbody>
                </table></form>
               
 <ul class="pagination">
 <?php $bef_=$data['curpage'];
 $curpg	=	$data['curpage_class'];
 ?>
              <li><a href="<?php $bef =$bef_; echo PROX_URL_ADMIN.'/plugins/LiteMessage/inbox/?page='.$bef;?>">«</a></li>
			  <?php  $next =$bef_ +1; for($i=0;$i<5;$i++){ $num =$i+1;  ?>
              <li <?php echo $curpg[$i+1]; ?>><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteMessage/inbox/?page='.$num;?>"><?php echo $num; ?></a></li>
               <?php } ?>	
              <li><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteMessage/inbox/?page='.$next;?>">»</a></li>
            </ul>
              </div>	<!---end---></div>
                </div>
<script>

$(function () {
	"use strict";
	$('#checkbox-0').click(function() {
    if($(this).is(':checked'))
        $('.checkbox-group').prop('checked', true).closest("tr").addClass('row-warning');
    else
        $('.checkbox-group').prop('checked', false).closest("tr").removeClass('row-warning');
	});
	
	$('.checkbox-group').click(function() {
    if($(this).is(':checked'))
		$(this).closest("tr").addClass('row-warning');
    else
		$(this).closest("tr").removeClass('row-warning')        
	});	
});

</script>			
