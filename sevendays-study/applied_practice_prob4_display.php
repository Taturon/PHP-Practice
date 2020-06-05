<!DOCTYPE html>
<?php
session_start();
$_SESSION['text1'] = $_POST['text1'];
$text1 = $_POST['text1'];
$text2 = $_GET['text2'];
?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>display</title>
</head>
<body>
<p>POSTメソッド：入力した値は「<?php echo $text1 ?>」です</p>
<p>GETメソッド：入力した値は「<?php echo $text2 ?>」です</p>
<a href="applied_practice_prob4_session.php">セッション値の確認</a>
</body>
</html>
