<?php
/**
LiteAnalityc v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/

/**
* @PanelView
* id = LiteAnalityc : Base Class
* data-tempa = LiteAnalityc-Editor : Base Class-Template hook name
*/
?>
 <div class="panel widget" id="LiteAnalityc" data-temp="LiteAnalityc-vchart">
   <div class="row">
   <div class="col-xs-6 ">
                    <div class="vd_status-widget vd_bg-red  widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
                                 
    <a class="panel-body vd_bg-red" href="#">                                
        <div class="clearfix">
            <span class="menu-icon">
                <i class="icon-bars"></i>
            </span>
            <span class="menu-value">
                <?php echo $data['vcounter'];?>
            </span>  
        </div>   
        <div class="menu-text clearfix">
         <?php echo  BCL('LiteAnalityc','vcounter');?>
        </div>  
     </a>                                                                
</div>                    </div>

   <div class="col-xs-6 ">
                    <div class="vd_status-widget vd_bg-blue  widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
                                 
    <a class="panel-body vd_bg-blue" href="#">                                
        <div class="clearfix">
            <span class="menu-icon">
                <i class="icon-pencil"></i>
            </span>
            <span class="menu-value">
                <?php echo $data['newarticle'];?>
            </span>  
        </div>   
        <div class="menu-text clearfix">
         <?php echo  BCL('LiteAnalityc','newarticle');?>
        </div>  
     </a>                                                                
</div>                    </div>
   </div>
   
                </div>
				