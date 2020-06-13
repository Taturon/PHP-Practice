<?php
$num = 1;
while ($num <= 5) {
	echo $num . '回目の処理です。<br>';
	$num++;
}

$num = 10;
while ($num >= 5) {
	echo $num . '<br>';
	$num--;
}

$num = 2;
do {
	echo $num . '<br>';
	$num += 2;
} while ($num < 10);
