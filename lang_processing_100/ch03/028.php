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

// 正規表現により基本情報を抽出し、余分な文字をトリミングして連想配列として格納
$reg_exp = '/^\|[a-zA-Zぁ-んァ-ヶー一-龠]+ +=/u';
$markups = [
	"'" => '',
	'[' => '',
	']' => '',
	'|' => ' ',
	'#' => ' ',
	'{' => '',
	'}' => ''
];
$search = array_keys($markups);
$replace = array_values($markups);
foreach ($contents as $content) {
	if (preg_match($reg_exp, $content)) {
		$values = explode(' =', $content);
		$index = trim(ltrim($values[0], '|'));
		$value = trim(str_replace($search, $replace, $values[1]));
		$basic_info[$index] = $value;
	}
}

var_dump($basic_info);
