<html>
<head>
<meta charset="utf-8">
</head>
<body>
<input type="text" value="こんにちは">
<input type="submit" value="押してみて">
<?php $a = "もう夜だ" ?>
<p><?php echo $a ?></p>
<?php
function tax($i) {
	$j = $i * 0.08;
	echo "消費税：" . floor($j) . "円";
}
echo tax(130) . "\n";
?>
<?php
$memo = "山田花子";
function textConvert($text) {
	$text = "山田太郎";
	echo $text;
}
echo $memo . "\n";
echo textConvert($memo) . "\n";
?>
</body>
</html>
