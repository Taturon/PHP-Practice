<?php
require_once '030.php';

// 解析結果から同士の表層形をキーとして抽出することで重複を削除
$morph = null;
foreach ($morphs as $morph) {
	if ($morph['pos'] === '動詞') {
		$varbs[$morph['surface']] = 1;
	}
}

echo implode("\n", array_keys($varbs));
