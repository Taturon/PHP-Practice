<?php
$ret = file('popular-names.txt');

$file1 = fopen('col1.txt', 'w');
$file2 = fopen('col2.txt', 'w');
foreach ($ret as $str) {
	$word = str_word_count($str, 1);
	fwrite ($file1, $word[0] . "\n");
	fwrite ($file2, $word[1] . "\n");
}
