<?php

// lesson 1 
echo "なんだ君は？";
echo "\n";

// lesson 2
$l2_num1 = 4;
$l2_num2 = 5;
$l2_num3 = $l2_num1 + $l2_num2;
echo $l2_num1 . "+" . $l2_num2 . "=" . $l2_num3;
echo "\n";

// lesson 3
for ($i = 1; $i <= 50; $i++) {
	if ($i % 2 == 0) {
		echo $i;
		echo "\n";
	} else {
		continue;
	}
}
echo "\n";

// lesson 4
for ($i = 1; $i <= 50; $i++) {
	if ($i % 2 != 0) {
		echo $i;
		echo "\n";
	} else {
		continue;
	}
}
echo "\n";

// lesson 5
echo "2020年のオリンピック開催地は\"東京\"です。";
echo "\n";

// lesson 6
$l6_score = 70;
if ($l6_score < 50) {
	echo "不可";
} elseif ($l6_score >= 50 && $l6_score < 65) {
	echo "可";
} elseif ($l6_score >= 65 && $l6_score < 80) {
	echo "良";
} else {
	echo "優";
}
echo "\n";

// lesson 8
$l8_score = 60;
echo "結果は" . $l8_score . "です。";
switch ($l8_score) {
	case $l8_score >= 90:
		echo "パーフェクトです。";
		break;
	case $l8_score >= 70 && $l8_score < 90:
		echo "素晴らしい。";
		break;
	case $l8_score >= 50 && $l8_score < 70:
		echo "合格です。";
		break;
	default:
		echo "頑張りましょう！";
		break;
}
echo "\n";

// lesson 9
echo date("Y/m/d H:i:s");
echo "\n";

// lesson 10-1
$l10_1_horse = array("ディープインパクト", "トウカイテイオー", "スペシャルウィーク", "スーパークリーク", "メジロマックイーン", "ダイユウサク", "オグリキャップ", "ウォッカ", "ダイワスカーレット");
echo "出走馬は" . count($l10_1_horse) . "頭です。\n";
foreach ($l10_1_horse as $value) {
	echo "・" . $value . "\n";
}

// lesson 10-2
$l10_2_horse = array("ディープインパクト", "トウカイテイオー", "スペシャルウィーク", "スーパークリーク", "メジロマックイーン", "ダイユウサク", "オグリキャップ", "ウォッカ", "ダイワスカーレット");
echo "出走馬は" . count($l10_2_horse) . "頭です。\n";
for ($i = 0; $i <= count($l10_2_horse) - 1; $i++) {
	echo "・" . $l10_2_horse[$i] . "\n";
}

// lesson 10-3
$l10_3_horse = array("ディープインパクト", "トウカイテイオー", "スペシャルウィーク", "スーパークリーク", "メジロマックイーン", "ダイユウサク", "オグリキャップ", "ウォッカ", "ダイワスカーレット");
echo "出走馬は" . count($l10_3_horse) . "頭です。\n";
$i = 0;
while ($i <= count($l10_3_horse) - 1) {
	echo "・" . $l10_3_horse[$i] . "\n";
	$i++;
}

// lesson 11-1
$l11_1_horse = array("ディープインパクト" => "サンデーサイレンス", "トウカイテイオー" => "シンボリルドルフ",  "スペシャルウィーク" => "サンデーサイレンス", "スーパークリーク" => "ノーアテンション", "メジロマックイーン" => "メジロティターン", "ダイユウサク" => "ノノアルコ", "オグリキャップ" => "ダンシングキャップ", "ウォッカ" => "タニノギムレット", "ダイワスカーレット" => "アグネスタキオン");
echo "出走馬は" . count($l11_1_horse) . "頭です。\n";
foreach ($l11_1_horse as $key => $value) {
	echo "・" . $key . "\n";
	echo "\t父：" . $value . "\n";
}

// lesson 11-2
$l11_2_horse = array("ディープインパクト" => ["牡馬","サンデーサイレンス","ウインドインハーヘア"], "トウカイテイオー" => ["牡馬","シンボリルドルフ","トウカイナチュラル"],  "スペシャルウィーク" => ["牡馬","サンデーサイレンス","キャンペンガール"], "スーパークリーク" => ["牡馬","ノーアテンション","ナイスデイ"], "メジロマックイーン" => ["牡馬","メジロティターン","メジロオーロラ"], "ダイユウサク" => ["牡馬","ノノアルコ","クニノキヨコ"], "オグリキャップ" => ["牡馬","ダンシングキャップ","ホワイトナイトルビー"], "ウォッカ" => ["牝馬","タニノギムレット","タニノシスター"], "ダイワスカーレット" => ["牝馬","アグネスタキオン","スカーレットブーケ"]);
echo "出走馬は" . count($l11_2_horse) . "頭です。\n";
foreach ($l11_2_horse as $key => $value) {
	echo "・" . $key . "\n";
	echo "\t" . $value[0] . "\n";
	echo "\t父:" . $value[1] . "\n";
	echo "\t母:" . $value[2] . "\n";
}

// lesson 12
for ($i = 1; $i <= 10; $i++) {
	for ($j = 1; $j <= 10; $j++) {
		echo "金";
	}
	echo "\n";
} 

// lesson 13
for ($i = 1; $i <= 10; $i++) {
	echo "<tr>";
	for ($j = 1; $j <= 10; $j++) {
		$l13 = $i * $j;
		echo "<td>" .  $l13 . "</td>";
	}
	echo "</tr>";
}
echo "\n";

// lesson 14
$l14_price = 9876;
$l14_tax_ratio = 1.08;
$l14_total_price = $l14_price * $l14_tax_ratio;
echo floor($l14_total_price);
echo "\n";

// lesson 15
$l15_str = "有馬記念の優勝馬はUMAです。";
echo $l15_str . "\n";
$l15_replace = str_replace("UMA", "ディープインパクト", $l15_str); 
echo $l15_replace . "\n";

// lesson 17
$l17_dir = new DirectoryIterator('./');
foreach($l17_dir as $file) {
	if ($file->isFile()) {
		echo $file->getFileName() . "\n";
	}
}
echo "\n";

// lesson 18
$l18 = 1;
function plus($i) {
	echo ($i + 1);
}
plus($l18);
echo "\n";

// lesson 21
$l21_day = "記念";
$$l21_day = array("6月" => "宝塚", "9月" => "セントライト", "12月" => "有馬");
foreach (${$l21_day} as $key => $value) {
	echo $key . "は" . $value . $l21_day . "です\n";
}

?>
