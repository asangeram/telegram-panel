
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">

<?php

use App\ViewModels\DashboardViewModel;

/**
 * @var $ViewModel DashboardViewModel
 * 
 */
// $maps = $ViewModel->Map;
$pins = $ViewModel->Pin;

$maps = $ViewModel->Map;


?>
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-pins-tab" data-toggle="tab"><i class="fa fa-map-pin"></i></a></li>
        <li><a href="#control-sidebar-maps-tab" data-toggle="tab"><i class="fa fa-map"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-pins-tab">
            <h3 class="control-sidebar-heading">{{ trans('app.Pins') }}</h3>
            <ul class='control-sidebar-menu'>
                @foreach($pins as $pin)
                    <ul>
                    <li>{{$pin->name}}</li>
                    </ul>
                    @endforeach
            </ul><!-- /.control-sidebar-menu -->

        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-maps-tab">
            
                <h3 class="control-sidebar-heading">{{trans('app.Maps')}}</h3>
                <ul class='control-sidebar-menu'>
                @foreach($maps as $map)
                    <ul>
                    <li>{{$map->name}}</li>
                    </ul>
                    @endforeach
            </ul>
          
        </div><!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar

<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>