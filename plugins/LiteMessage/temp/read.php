<?php
/**
LiteMessage v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteMessage : Base Class
* data-tempa = LiteMessage-inbox : Base Class-Template hook name
*/

$msg = $data['message'];
?>
 <div class="panel widget" id="LiteMessage" data-temp="LiteMessage-inbox">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-envelope"> </i> </span> <?php echo BCL('LiteMessage','inbox'); ?> : <?php echo $data['title'];?></h3>
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
				<?php $site = new Site();
				$photo = $site->logo;
				
				//print_r($data['msgs']);
				$user = new User();
				$msgs = $data['msgs'];
				$i_=0;
				$i_=count($msgs);
				
				?>
<div class="content-list content-image content-menu" >	
<div class="alert alert-warning"> <span class="vd_alert-icon"><i class="fa fa-exclamation-triangle vd_yellow"></i></span><strong>Warning!</strong> Ini tidak otomatis mengirim email ke si pengirim pesan, jika anda ingin membalas dengan email silahkan download Modul Mailer atau balas dari email anda (Gmail, dll) </div>
           <div data-rel="scroll">
               <ul class="list-wrapper pd-lr-10" id="msg_list">
			   <?php 
			   $MC	=	$data['MC'];
			   for($ii=0;$ii<$i_;$ii++){ 
				$i__ = $i_-($ii+1);
			   $val = $msgs[$i__];
			      $align='right';
				  $bg='';
			   if($user->id == $val->User->id){
				   $align='left';
				   $bg = "style='background:#bef7df'";
			   }
			    $m_head = $val->email;
			   if($val->User->id > 0){
				   $m_head = $val->User->name;
			   }
			   if($val->User->photo !=''){
					$photo = $val->User->photo;
				}
				$val->status 	=	0;
				$MC->SwitchStatus($val, $data['me'], true);
			   ?>
                    <li class="align-<?php echo $align ?>" <?php echo $bg ?>>  
                    		<div class="menu-icon"><img  src="<?php echo $photo;?>"></div>  
                            <div class="menu-text">  <a href="javascript:void(0);"><?php echo $m_head?></a><br>
							<?php echo $val->content;?>
                            	<div class="menu-info">
                                    <span class="menu-date"><?php echo $val->date?> </span>                                                                         
                              
                            	</div>                            
                            </div> 
                    </li>   
<?php } ?>					
               </ul>
               </div>
               <div class="closing chat-area">
               	   <div class="chat-box">
                   	<textarea placeholder="write..." id="t_msg"></textarea>
					<a href="javascript:sendmsg();" class="vd_white btn vd_btn vd_bg-green  pull-right"><span class="append-icon"><i class="fa fa-send"></i></span>Send</a>
                   </div>
                  
               </div>                                                                       
           </div>	
		   
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
function sendmsg(){
	var msg =$("#t_msg").val();
	$.ajax({
		url:"<?php echo PROX_URL.'/ajax.php'?>",
		type:"POST",
		data:"messenger=<?php echo $data['mid'];?>&msg="+msg+"&class=LiteMessage&function=send&plugins=1",
		success:function(j){
			var m_head = j.email;
			if(j.user_id > 0){
				m_head = j.name;
			}
			var temp ='<li class="align-left" style="background:#bef7df" > '+ 
                    	'	<div class="menu-icon"><img  src="'+j.photo+'"></div>  '+
                        '    <div class="menu-text">  <a href="javascript:void(0);">'+m_head+'</a><br>'+
						j.content+
                         '   	<div class="menu-info">'+
                          '          <span class="menu-date">'+j.date+' </span>   '+                                                                      
                            '</div> </div>  </li> ';
							$("#msg_list").append(temp);
		}
	});
}

</script>			
