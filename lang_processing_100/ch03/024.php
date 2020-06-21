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

// 正規表現を用いて検索し、書く値を配列に格納
$reg_exp = '/[a-zA-Z0-9-,è \']+(.jpg|.jpeg|.jpe|.png|.svg)/';
foreach ($contents as $content) {
	if (preg_match($reg_exp, $content, $file)) {
		$files[] = $file;
	}
}

var_dump($files);
