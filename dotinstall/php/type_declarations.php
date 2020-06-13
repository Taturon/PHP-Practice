<?php
// 下記一文を入れることで強い型付けとなる
// declareはスクリプトの先頭に記述する必要あり
// declare(strict_types=1);
function score(string $name, int $score) {
	echo $name . ":" . $score . PHP_EOL;
}

echo score("Taturon", 0) . PHP_EOL;
echo score("Taturon", "0") . PHP_EOL;

