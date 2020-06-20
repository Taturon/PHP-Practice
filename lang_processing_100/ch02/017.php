<?php
$data = file('popular-names.txt');

foreach ($data as $datum) {
	$str = explode("\t", $datum);
	$names[] = $str[0];
}

$result = array_unique($names);
sort($result);
var_dump($result);
