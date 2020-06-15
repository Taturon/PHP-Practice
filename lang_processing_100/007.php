<?php
$input = explode(' ', trim(fgets(STDIN)));
function answer($time, $str, $int) {
	return "${time}時の${str}は${int}";
}
echo answer($input[0], $input[1], $input[2]) . PHP_EOL;
