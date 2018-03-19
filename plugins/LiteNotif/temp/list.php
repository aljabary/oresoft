<?php
/**
LiteNotif v.1.1.0
@Proxtrasoft v.1.1.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
?>
 <div class="panel widget" id="LiteNotif" data-temp="LiteNotif-notiflist">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="fa fa-info-circle"> </i> </span> <?php echo BCL('LiteNotif','list'); ?></h3>
                  
</div>
                  <div class="panel-body">
				  <div class="content-list content-image">
           	   <div  data-rel="scroll">	
              <ul class="list-wrapper pd-lr-10">
 <?php
$ib = $data['notiflist'];
$site = new Site();
 for($i=0;$i<count($ib);$i++){ 
$notif = $ib[$i];
		$photo = $notif->icon;
		$styl = 'style="background: rgba(4, 142, 243, 0.35);"';
		if($notif->icon ==''){
        $photo = $site->logo;
		}
		if($notif->status==0){
			$styl = '';
		}
		?>		 <li <?php echo $styl;?> id="lnotif<?php echo $notif->id ;?>"> 	<a href="<?php echo PROX_URL;?>ajax.php?plugins=1&class=LiteNotif&function=directo&not=<?php echo $notif->id ?>"><div class="menu-icon"><img src="<?php echo $photo ?>"></div> 
                            <div class="menu-text"><?php echo $notif->content ?>
                            	<div class="menu-info">
                                    <span class="menu-date"><?php echo $notif->date ?></span> 
<div class="btn-group btn-group-sm pull-right mgbt-xs-5">
								      <a href="javascript:btn_click(<?php echo $notif->id; ?>,'remove');" class="btn btn-danger btn-sm">
								   <span class="menu-action-icon" title="Remove"> <i class="fa fa-trash-o"></i> 
								   </span> </a>
								 </div>  
                            	</div>
                            </div> </a>
                    </li>
<?php } ?>                                                           
                    
              </ul>
			 </div>
			 </div>
                <!-- Panel Widget -->
                <br/>
            <ul class="pagination">
              <li><a href="<?php $bef =$data['pg'] ; echo PROX_URL_ADMIN.'/plugins/LiteNotif/readall?page='.$bef;?>">«</a></li>
			  <?php $curpg = $data['curpg']; $next =$data['pg'] +2; for($i=0;$i<5;$i++){ $num =$i+1;  ?>
              <li <?php echo $curpg[$i]; ?>><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteNotif/readall?page='.$num;?>"><?php echo $num; ?></a></li>
               <?php } ?>	
              <li><a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteNotif/readall?page='.$next;?>">»</a></li>
            </ul>
              <!-- col-md-12 --> 
            </div>
				   <!---end---></div>
 <script>
function btn_click(id,act){
	$.ajax({
		url:"<?php echo PROX_URL;?>ajax.php",
		data:"plugins=1&class=LiteNotif&function=Btn_Click&not="+id+"&action="+act,
		success:function(){
			if(act=='remove'){
				$("#lnotif"+id).remove();
			}else{
				$("#lnotif"+id).attr("style","");
			}
		}
	});
}
</script> 