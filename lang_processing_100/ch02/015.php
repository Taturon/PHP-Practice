<?php
$file = file('popular-names.txt');
$count = count($file);
$num = $count - trim(fgets(STDIN));

for ($i = $num; $i < $count; $i++) {
	echo $file[$i];
}
