<?php
// ファイルを開いて、各行ごとにデコード
$lines = file('jawiki-country.json');
foreach ($lines as $line) {
	$data[] = json_decode($line);
}

// タイトルがイギリスの値となっているキーを取得
foreach ($data as $key => $datum) {
	if ($datum->title == 'イギリス') {
		$i = $key;
	}
}

// 取得したキーにより本文を抽出し各行毎に配列に格納
$text = $data[$i]->text;
$contents = explode("\n", $text);

// 文字列内にcategoryが含まれている行を配列に格納
foreach ($contents as $content) {
	if (strpos($content, 'Category') !== false) {
		$categories[] = $content;
	}
}
var_dump($categories);
