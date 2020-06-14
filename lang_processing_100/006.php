<?php
require_once 'n_gram.php';

$str1 = 'paraparaparadise';
$str2 = 'paragraph';

$biGram1 = char_ngram($str1, 2);
$biGram2 = char_ngram($str2, 2);

$union = array_unique(array_merge($biGram1, $biGram2));
echo '----和集合----' . PHP_EOL;
var_dump($union);

$intersect = array_unique(array_intersect($biGram1, $biGram2));
echo '----積集合----' . PHP_EOL;
var_dump($intersect);

$diff = array_diff($biGram1, $biGram2);
echo '----差集合----' . PHP_EOL;
var_dump($diff);



