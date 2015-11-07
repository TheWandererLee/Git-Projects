<?php
include_once("charts.php");

$num = array($_REQUEST['n'], $_REQUEST['a'], $_REQUEST['b']);

$chart[ 'chart_data' ] = array ( array ( "", "Normal", "Accel","Background"), array ( "", $num[0], $num[1], $num[2] ) );
$chart[ 'chart_grid_h' ] = array ( 'thickness'=>0 );
$chart[ 'chart_pref' ] = array ( 'rotation_x'=>60 ); 
$chart[ 'chart_rect' ] = array ( 'x'=>35, 'y'=>20, 'width'=>300, 'height'=>150, 'positive_alpha'=>0 );
$chart[ 'chart_transition' ] = array ( 'type'=>"spin", 'delay'=>.5, 'duration'=>.75, 'order'=>"category" );
$chart[ 'chart_type' ] = "3d pie";
$chart[ 'chart_value' ] = array ( 'color'=>"000000", 'alpha'=>65, 'font'=>"arial", 'bold'=>true, 'size'=>10, 'position'=>"inside", 'prefix'=>"", 'suffix'=>"", 'decimals'=>0, 'separator'=>"", 'as_percentage'=>true );

//$chart[ 'draw' ] = array ( array ( 'type'=>"text", 'color'=>"000000", 'alpha'=>4, 'size'=>40, 'x'=>-50, 'y'=>260, 'width'=>500, 'height'=>50, 'text'=>"Line Distribution", 'h_align'=>"center", 'v_align'=>"middle" )) ;

$chart[ 'legend_label' ] = array ( 'layout'=>"horizontal", 'bullet'=>"circle", 'font'=>"arial", 'bold'=>true, 'size'=>12, 'color'=>"000000", 'alpha'=>85 ); 
$chart[ 'legend_rect' ] = array ( 'x'=>0, 'y'=>20, 'width'=>50, 'height'=>150, 'margin'=>10, 'fill_color'=>"000000", 'fill_alpha'=>10, 'line_color'=>"000000", 'line_alpha'=>0, 'line_thickness'=>0 );  
$chart[ 'legend_transition' ] = array ( 'type'=>"dissolve", 'delay'=>0, 'duration'=>1 );

$chart[ 'series_color' ] = array ( "3333ff", "ff3333", "33ff33" ); 
$chart[ 'series_explode' ] = array ( 25, 0, 0 );

SendChartData($chart);
?>