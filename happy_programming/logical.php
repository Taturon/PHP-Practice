<?php
$result1 = true;
$result2 = true;
if ($result1 && $result2) {
	echo '正解です。';
} else {
	echo '不正解です。';
}
echo '<br>';

$num = 30;
if ($num >= 20 && $num < 40) {
	echo '範囲内です。';
} else {
	echo '範囲外です。';
}
echo '<br>';

$num = 1;
if (!($num >= 100)) {
	echo '100以上ではありません';
} else {
	echo '100以上です';
}

