<?php
$ret = file('popular-names.txt');
foreach ($ret as $str) {
	$sentence[] = str_replace("\t", ' ', $str);
}
var_dump($sentence);

