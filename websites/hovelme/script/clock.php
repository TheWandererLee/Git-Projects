#!/usr/bin/php
<?php
// Do not execute this file through a web server...
// inspired by http://stackoverflow.com/questions/3324301/code-golf-digital-clock
// If you trim this down to match the task in this thread you get about 240 bytes

$parts=str_split("  | _ |_| _||_ | |    . 152600134133620143142100122123677666",3);

echo PHP_EOL;

while (true) {
echo str_repeat(PHP_EOL,100);
$time=date('H:i:s')." ".sprintf("%3d",round((microtime(true)-time())*1000));

//$s="12:34567 89990";
$s=$time;
$l=array();
foreach (str_split($s) as $c) {
	if($c==":") $c=10;
	if($c==" ") $c=11;
	for($i=0;$i<3;$i++){
		@$l[$i].=$parts[ $parts[$c+8][$i] ];
	}
}

echo implode(PHP_EOL,$l);

echo PHP_EOL;
usleep(500);
}
