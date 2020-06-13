<?php 
$ranking = 2;

switch ($ranking) {
	case 1:
		echo '金メダル';
		break;
	case 2:
		echo '銀メダル';
		break;
	case 3:
		echo '銅メダル';
		break;
	default:
		echo 'メダルなし';
}
echo '<br>';

$eng = 'south';
switch ($eng) {
	case 'north':
		echo '日本語で「北」です。';
		break;
	case 'south':
		echo '日本語で「南」です。';
		break;
	case 'east':
		echo '日本語で「東」です。';
		break;
	case 'west':
		echo '日本語で「西」です。';
		break;
}
echo '<br>';

for ($i = 1; $i <= 9; $i++) {
	switch ($i) {
		case ($i % 2 === 0):
			echo $i . 'は偶数です<br>';
			break;
		default:
			echo $i . 'は奇数です<br>';
			break;
	}
}
