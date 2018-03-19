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
 <div class="row">
<div class="col-md-8 col-xs-7">
<h2><?php echo BCL('LiteAnalityc','menuvisitor'); ?> <?php echo BCL('LiteAnalityc','page'); ?></h2>
			<!-- Morris: Bar -->
										<div class="chart chart-md" id="morrisBar"></div>
										<script type="text/javascript">
						var morrisBarData = [<?php $pc = count($data['pagecounter']);
											for($i=0;$i<$pc;$i++){
												$ddc =$data['pagecounter'][$i];
												$oname = $ddc['pagetype'];
												
											?>{y: "<?php echo $oname;?>",a: <?php echo $ddc['tcounter'];?>,},<?php } ?>];
						
										</script>  </div>	<div class="col-xs-4"></div>										
						<div class="col-md-4  col-xs-7">
<h2><?php echo BCL('LiteAnalityc','perbanding'); ?> device</h2>

		<!-- Morris: Donut -->
										<div class="chart chart-md" id="morrisDonut"></div>
										<script type="text/javascript">
						
											var morrisDonutData = [
											<?php $dv = count($data['device']);
											for($i=0;$i<$dv;$i++){
												$ddc =$data['device'][$i];
													?>
											{label:'<?php echo $ddc['devicetype'];?>',value: <?php echo $ddc['tcounter'];?>},<?php } ?> 
											];
										</script>  </div>
										</div>	<!---end---></div>
					
                </div>
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
	
	/*
	Morris: Donut
	*/
	Morris.Donut({
		resize: true,
		element: 'morrisDonut',
		data: morrisDonutData,
		colors: ['#0088cc', '#734ba9', '#E36159']
	});
	
	/*
	Morris: Bar
	*/
	Morris.Bar({
		resize: true,
		element: 'morrisBar',
		data: morrisBarData,
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Kunjungan',],
		hideHover: true,
		barColors: ['#0088cc']
	});
</script>	