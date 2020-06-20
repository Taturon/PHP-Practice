<?php
// データの取得及び整形
$data = file('popular-names.txt');
foreach ($data as $datum) {
	$array[] = explode("\t", $datum);
}

// 1列目の値取得
$names = array_column($array, 0);

// 各値のカウント及び降順にソート
$count = array_count_values($names);
arsort($count);

// ソートされたキーの配列
$keys = array_keys($count);

// 元の配列からソートしたキーで検索し、結果に追加
foreach ($keys as $key) {
	$indexes = array_keys($names, $key);
	foreach ($indexes as $index) {
		$result[] = $array[$index];
	}
}

// 結果の表示
var_dump($count);
