<?php
$myAnswer = 11;
echo '5+7はいくつですか？<br>';
echo $myAnswer . 'です。<br>';
if ($myAnswer === 11) {
	echo '正解です。';
} else {
	echo '不正解です。';
}
echo '<br>';
$str = 'C';
if ($str === 'C') {
	echo '正解です。';
} elseif ($str === 'B') {
	echo '正解はその次のアルファベットです。';
} elseif ($str === 'D') {
	echo '正解はその前のアルファベットです。';
} else {
	echo '不正解です。';
}


