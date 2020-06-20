<?php
$lines = file('jawiki-country.json');
foreach ($lines as $line) {
	$data[] = json_decode($line, true);
}
$key = array_search('イギリス', array_column($data, 'title'));
$text = $data[$key]['text'];
var_dump($text);
