<?php
$data = file('popular-names.txt');
foreach ($data as $datum) {
	$array[] = explode("\t", $datum);
}
$population = array_column($array, 2);
array_multisort($population, SORT_DESC, $array);
var_dump($array);
