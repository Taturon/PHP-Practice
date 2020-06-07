<?php
$name = "Taturon";
// heredoc
$text = <<<"EOT"
hello! $name
	this is loooooong
text!
EOT;

echo $text;
echo PHP_EOL;

// nowdoc
$text = <<<'EOT'
hello! $name
	this is loooooong
text!
EOT;

echo $text;
echo PHP_EOL;

// return
function sum($a, $b, $c) {
	echo $a + $b + $c;
}

// 文字列の連結となる
echo sum_r(100, 200, 300) + sum(300, 600, 900) . PHP_EOL;

function sum_r($a, $b, $c) {
	return $a + $b + $c;
}

// 数値の合計となる
echo sum_r(100, 200, 300) + sum_r(300, 600, 900) . PHP_EOL;

// 無名関数（クロージャー）
$sum = function ($a, $b, $c) {
	return $a + $b + $c;
};

echo $sum(2, 4, 6) . PHP_EOL;

// 配列
$scores = [
	90,
	100,
	80, // 最後の値にもカンマを入れることで記法の統一され入れ替えや追加を行い易くなる
];

echo $scores . PHP_EOL;

$moreScores = [
	55,
	73,
];

// 配列の展開
// 展開なし
$scores = [
	90,
	100,
	$moreScores,
	80,
];

print_r($scores);

// 展開あり
$scores = [
	90,
	100,
	// ...$moreScores,
	80,
];

print_r($scores);


