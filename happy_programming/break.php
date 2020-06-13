<?php
for ($i = 1; $i <= 10; $i++) {
	$num += $i;
	echo '合計は' . $num . 'です<br>';
	if ($num >= 20) {
		echo '20を超えました<br>';
		break;
	}
}

$list = ['P', 'R', 'O', 'G', 'R', 'A', 'M', 'I', 'N'];
foreach ($list as $name) {
	echo $name . '<br>';
	if ($name === 'A') {
		echo 'Aを見つけました';
		break;
	}
}
echo '<br>';

$num = 0;
while ($num <= 1000) {
	$num += 14;
	echo $num . '<br>';
	if ($num % 14 === 0 && $num % 15 === 0) {
		echo $num . 'は14と15の最小公倍数です<br>';
		break;
	}
}
