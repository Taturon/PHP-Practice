<?php
$file = file('popular-names.txt');
$count = count($file);
$n = $count / trim(fgets(STDIN)) + 1;
$div = array_chunk($file, $n);

for($i = 0; $i < count($div[0]); $i++) {
	echo $div[0][$i];
}
