<?php
require_once '030.php';

// 三つの引数から条件に合致する文章があればそれを返す関数を定義
function make_phrase($word1, $word2, $word3) {
	if ($word1['pos'] === '名詞' && $word2['surface'] === 'の' && $word3['pos'] === '名詞') {
		return $word1['surface'] . $word2['surface'] . $word3['surface'];
	} else {
		return false;
	}
}

// 上記の関数を使い、解析結果から抽出
for ($i = 0; $i < count($morphs) - 2; $i++) {
	if (($phrase = make_phrase($morphs[$i], $morphs[$i + 1], $morphs[$i + 2])) !== false) {
		$phrases[$phrase] = 1;
	}
}

// 抽出結果の表示
$phrases = array_keys($phrases);
echo implode("\n", $phrases);
