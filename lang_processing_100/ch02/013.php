<?php
$col1 = file('col1.txt');
$col2 = file('col2.txt');
$count = count($col1);
$file = fopen('cols.txt', 'w');
for ($i = 0; $i < $count; $i++) {
	fwrite ($file, trim($col1[$i]) . "\t" . trim($col2[$i]) . PHP_EOL);
}
