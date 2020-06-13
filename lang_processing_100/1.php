<?php
// 00
$str = 'stressed';
$result = strrev($str);
echo $result . "\n";

// 01
$str = 'パタトクカシーー';
$ans = '';
for ($i = 0; $i <= strlen($str); $i += 2) {
	$ans .= mb_substr($str, $i, 1);
}
echo $ans . "\n";

// 02
$str1 = 'パトカー';
$str2 = 'タクシー';
$ans = '';
for ($i = 0; $i <= strlen($str1); $i++) {
	$ans .= mb_substr($str1, $i, 1) . mb_substr($str2, $i, 1);
}
echo $ans . "\n";

// 03
$sentence = 'Now I need a drink, alcoholic of course, after the heavy lectures involving quantum mechanics.';
$str = str_word_count($sentence, 1);
$ans = '';
$ans = implode(array_map('strlen', $str));
echo $ans . "\n";

