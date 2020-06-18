<?php
$num = trim(fgets(STDIN)) - 1;
$file = file('popular-names.txt');

for ($i = 0; $i <= $num; $i++) {
	echo $file[$i];
}
