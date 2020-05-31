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
 
?>
