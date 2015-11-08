<?php
include_once("charts.php");

$num = array($_REQUEST['1'], $_REQUEST['2'], $_REQUEST['3'], $_REQUEST['4'], $_REQUEST['5'], $_REQUEST['6'], $_REQUEST['7'], $_REQUEST['8'], $_REQUEST['9'], $_REQUEST['10'], $_REQUEST['11'], $_REQUEST['12'], $_REQUEST['13'], $_REQUEST['14']);

$chart[ 'axis_category' ] = array ( 'size'=>10, 'color'=>"000000", 'alpha'=>75, 'skip'=>0 ,'orientation'=>"diagonal_up" ); 
$chart[ 'axis_ticks' ] = array ( 'value_ticks'=>false, 'category_ticks'=>false );
$chart[ 'axis_value' ] = array ( 'alpha'=>0 );

$chart[ 'chart_border' ] = array ( 'top_thickness'=>0, 'bottom_thickness'=>0, 'left_thickness'=>0, 'right_thickness'=>0 );
$chart[ 'chart_data' ] = array ( array ( "", "Tracks","Comments","Previews","Deleted","Managers","SOLs" ), array ( "Size (in KB)", $num[7],$num[8],$num[9],$num[10],$num[11],$num[12] ) );//, array ( "Size", $num[7],$num[8],$num[9],$num[10],$num[11],$num[12] ) );
$chart[ 'chart_grid_h' ] = array ( 'thickness'=>0 );
$chart[ 'chart_grid_v' ] = array ( 'thickness'=>0 );
$chart[ 'chart_rect' ] = array ( 'x'=>0, 'y'=>0, 'width'=>640, 'height'=>128, 'positive_alpha'=>0 );
$chart[ 'chart_pref' ] = array ( 'rotation_x'=>0, 'rotation_y'=>0 ); 
$chart[ 'chart_transition' ] = array ( 'type'=>"drop", 'delay'=>0, 'duration'=>2, 'order'=>"series" );
$chart[ 'chart_type' ] = "3d column" ;
$chart[ 'chart_value' ] = array ( 'hide_zero'=>true, 'color'=>"000000", 'alpha'=>80, 'size'=>12, 'position'=>"cursor", 'prefix'=>"", 'suffix'=>"", 'decimals'=>0, 'separator'=>"", 'as_percentage'=>true );

$chart[ 'legend_label' ] = array ( 'layout'=>"horizontal", 'bullet'=>"circle", 'font'=>"arial", 'bold'=>true, 'size'=>12, 'color'=>"000000", 'alpha'=>80 ); 
$chart[ 'legend_rect' ] = array ( 'x'=>16, 'y'=>16, 'width'=>200, 'height'=>50, 'margin'=>20, 'fill_color'=>"000000", 'fill_alpha'=>0, 'line_color'=>"000000", 'line_alpha'=>0, 'line_thickness'=>0 ); 
$chart[ 'legend_transition' ] = array ( 'type'=>"dissolve", 'delay'=>0, 'duration'=>1 );

$chart[ 'series_color' ] = array ("cc6666"); 
$chart[ 'series_gap' ] = array ( 'bar_gap'=>0, 'set_gap'=>20) ; 

SendChartData($chart);
?>