<?php
// lesson 1
$l1_a = 99;
$l1_b = 1;
echo $l1_a + $l1_b . "\n";

// lesson 2
$l2_d = "大五郎";
$l2_y = "山田";
echo $l2_y . $l2_d . "\n";

// lesson 3
$l3_a = 3.14;
$l3_b = 15;
echo floor($l3_a * $l3_b) . "\n";

// lesson 4
$l4 = 17;
function evenOrNot($l4_f) {
	if ($l4_f % 2 === 0) {
		echo $l4_f . "は偶数です";
	} else {
		echo $l4_f . "は奇数です";
	}
}
echo evenOrNot($l4) . "\n";

// lesson 5
function season($l5) {
	switch($l5) {
		case 3:
		case 4:
		case 5:
			echo "春";
			break;
		case 6:
		case 7:
		case 8:
			echo "夏";
			break;
		case 9:
		case 10:
		case 11:
			echo "秋";
			break;
		case 12:
		case 1:
		case 2:
			echo "冬";
			break;
	}
}
echo season(1) . "\n";
echo season(8) . "\n";

// lesson 6
$l6_m = array("男",26);
$l6_f = array("女",33);
function badYear($l6) {
	if ($l6[0] == "男") {
		switch ($l6[1]) {
			case 25: case 42: case 61:
				echo "厄年です";
				break;
			default:
				echo "厄年ではありません";
		}
	} else {
		switch ($l6[1]) {
			case 19: case 33: case 37:
				echo "厄年です";
				break;
			default:
				echo "厄年ではありません";
		}
	}
}
echo badYear($l6_m) . "\n";
echo badYear($l6_f) . "\n";

// lesson 7
$l7 = array("宮島","天橋立","松島");
var_dump($l7) . "\n";

// lesson 8
$l8 = array("残業" => "zanngyou", "財閥" => "zaibatu", "過労死" => "karoushi");
var_dump($l8) . "\n";

// lesson 9
$l9 = 0;
for($i = 1; $i <= 100; $i++) {
	$l9 += $i;
}
echo $l9 . "\n";

// lesson 10
for($i = 1; $i <= 31; $i++) {
	echo $i < 10 ? "   " . $i : "  " . $i; 
	if ($i % 7 == 0) {
		echo "\n";
	}
}
echo "\n";

// lesson 11
$l11_a = array();
for ($i = 0; $i <= 2; $i++) {
	$l11_a[$i] = rand(1, 10);
}
var_dump($l11_a);
echo "\n";

// lesson 12
$l12 = array("aaa","bbb","ccc");
foreach($l12 as $a) {
	echo $a . "\n";
}

// lesson 13
$l13 = array(6,5,9,7,8);
$b = 0;
foreach($l13 as $a) {	
	if ($a > $b) {
		$b = $a;
	}	
}
echo "最大値は" . $b . "です\n";

// lesson 14
$l14 = array("ccc","bbb","aaa");
var_dump($l14) . "\n";
$l14_f = $l14[0];
$l14_l = $l14[2];
$l14[0] = $l14_l;
$l14[2] = $l14_f;
var_dump($l14) . "\n";

// lesson 15
$l15 = array(6,5,9,7,8);
var_dump($l15) . "\n";
rsort($l15);
var_dump($l15) . "\n";

 

?>
