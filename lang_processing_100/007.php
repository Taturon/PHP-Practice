<?php
$input = explode(' ', trim(fgets(STDIN)));
function answer($time, $str, $int) {
	echo $time . '時の' . $str . 'は' . $int;
}
answer($input[0], $input[1], $input[2]);
echo PHP_EOL;

