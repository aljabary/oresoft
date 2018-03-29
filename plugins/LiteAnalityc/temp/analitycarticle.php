<?php
/**
Category v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Proxtrasoft Moslem Opensource License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteAnalityc : Base Class
* data-tempa = LiteAnalityc-Editor : Base Class-Template hook name
*/
$art = $data['article'];
?>
    <link href="<?php echo TEMP;?>plugins/morris/morris.css" rel="stylesheet" type="text/css">	
 <div class="panel widget" id="LiteAnalityc" data-temp="LiteAnalityc-analityc">
                  <div class="panel-heading vd_bg-red">
                    <h3 class="panel-title"> <span class="menu-icon"><i class="icon-pie"> </i> </span> <?php echo BCL('LiteAnalityc','menu1'); ?></h3>
                    <div class="vd_panel-menu">
  <div data-action="minimize" data-original-title="Minimize" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-minus3"></i> </div>
  <div data-action="refresh"  data-original-title="Refresh" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
  <div data-action="close" data-original-title="Close" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon"> <i class="icon-cross"></i> </div>
</div>
</div>
                  <div class="panel-body">
				  <div class="row">
				  	<!-- Morris: Area -->
				<div class="col-md-12 col-xs-7">	
<h2><?php echo BCL('LiteAnalityc','graphic'); ?> <span class="font-semibold"> <?php echo BCL('LiteAnalityc','menuvisitor'); ?></span> <em class="vd_soft-grey"> <?php echo BCL('LiteAnalityc','fortime'.$data['ft']); ?></em> </h2>
<a href="<?php echo PROX_URL_ADMIN.'/plugins/LiteAnalityc/articleanalisis/'.$art->id;?>/30" class="btn vd_bg-red vd_white pull-right"><?php echo BCL('LiteAnalityc','ana').' '.BCL('LiteAnalityc','d30'); ?></a>
<h4><?php echo $art->title; ?></h4>
				<div class="chart chart-md" id="morrisArea"></div>
										<script type="text/javascript">
						
											var morrisAreaData = [
											<?php $dc = count($data['dailycounter']);
											for($i=0;$i<$dc;$i++){
												$ddc =$data['dailycounter'][$i];
											?>
											{
												y: '<?php echo $ddc['date'];?>',
												a: <?php echo $ddc['tcounter'];?>,
											},<?php } ?> ];
											
										</script>
										</div></div>		
                </div></div>
<script src="<?php echo TEMP;?>plugins/raphael/raphael.min.js" ></script>		
<script src="<?php echo TEMP;?>plugins/morris/morris.min.js" ></script>			
<script>
Morris.Area({
		resize: true,
		element: 'morrisArea',
		data: morrisAreaData,
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Kunjungan', ],
		lineColors: ['#0088cc'],
		fillOpacity: 0.7,
		hideHover: true
	});
	
	
</script>	