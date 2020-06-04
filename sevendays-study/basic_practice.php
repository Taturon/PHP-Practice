<?php
// prob.1-1
echo "今日は晴れるといいな";

// prob.1-2
$abc = "今日は晴れるといいな";
echo $abc;

// prob.1-3
define("XYZ", "今日は晴れるといいな");
echo XYZ;

// prob.1-4
$a = 1;
$b = 2;
echo $a + $b;

// prob.1-5
echo "こん" . "にちは";

// prob.2-1
$a = 1;
if ($a == 1) {
	echo "こんにちは";
} else {
	echo "さようなら";
}

// prob.2-2
$a = 1;
if ($a == 1) {
	echo "おはよう";
} elseif ($a == 2) {
	echo "こんばんわ";
} else {
	echo "さようなら";
}

// prob.2-3
$a = 3;
switch ($a) {
	case 1:
		echo "おはよう";
		break;
	case 2:
		echo "こんにちは";
		break;
	case 3:
		echo "こんばんわ";
		break;
	default:
		echo "さようなら";
}

// prob.2-4
$a = 3;
switch ($a) {
	case $a >= 3:
		echo "こんにちは";
		break;
	case 1:
		echo "今日は良い天気だね";
		break;
	case 2:
		echo "今日は寒いね";
		break;
	case 3:
		echo "今日は湿度が高いね";
		break;
	default:
		echo "さようなら";
}

// prob.2-5
$a = 2;
if ($a != 3) {
	echo "こんにちは";
}

// prob.3-1
$a = array(500, 600, 700);
var_dump($a);

// prob.3-2
$a = array(5 => 300, 10 => 900, 15 => 230);
var_dump($a);

// prob.3-3
$a = array("tiger" => "おはよう", "rabbit" => "こんにちは", "cow" => "こんばんわ");
var_dump($a);

// prob.3-4
array_splice($a, 2, 1);
$a[2] = 300;
var_dump($a);

// prob.3-5
$a = array();
for ($i = 1; $i <= 10; $i++) {
	array_push($a, $i);
}
foreach ($a as $b) {
	echo $b . "\n";
}

?>
