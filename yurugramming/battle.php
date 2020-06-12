<?php
$hands = array('グー', 'チョキ', 'パー');
$playerHand = $_POST['playerHand'];
$key = array_rand($hands);
$pcHand = $hands[$key];

if ($playerHand == $pcHand) {
	$result = 'あいこ';
} else {
	switch ($playerHand) {
		case 'グー':
			if ($pcHand == 'チョキ') {
				$result = '勝ち';
			} else {
				$result = '負け';
			}
			break;
		case 'チョキ':
			if ($pcHand == 'パー') {
				$result = '勝ち';
			} else {
				$result = '負け';
			}
			break;
		case 'パー':
			if ($pcHand == 'グー') {
				$result = '勝ち';
			} else {
				$result = '負け';
			}
			break;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>じゃんけん</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">
<header>
<div class="header-logo">ゆるグラミング講座</div>
</header>
<main>
<h1>結果は・・・</h1>
<div class="result-box">
<p class="result-word"><?= $result ?>！</p>

あなた：<?= $playerHand ?><br>
コンピューター：<?= $pcHand ?><br>

<p><a class="red" href="index.php">>>もう一回勝負する</a></p>
</div>
</main>
<footer>
<small>&copy;yurugramming!!</small>
</footer>
</div>
</body>
</html>

