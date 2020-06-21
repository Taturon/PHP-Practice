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
	if (strpos($content, '==') !== false) {
		$sections[] = $content;
	}
}

// '='の個数によってレベルを判定し、レベルとトリミングしたセクション名を多次元配列に格納
$i = 0;
foreach ($sections as $section) {
	switch (mb_substr_count($section, '=')) {
		case 4:
			$index[$i][0] = 1;
			$index[$i][1] = trim(ltrim(rtrim($section, '='), '='));
			break;
		case 6:
			$index[$i][0] = 2;
			$index[$i][1] = trim(ltrim(rtrim($section, '='), '='));
			break;
		case 8:
			$index[$i][0] = 3;
			$index[$i][1] = trim(ltrim(rtrim($section, '='), '='));
			break;
	}
	$i++;
}

var_dump($index);		
