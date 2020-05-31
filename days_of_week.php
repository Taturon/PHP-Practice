<html>
<head><title>今日は何曜日だっけ</title></head>
<body>
<h1>今日は何曜日だっけ</h1>
<?php
$week = array("日","月","火","水","木","金","土");
$day = $_POST['name'];
$date = new DateTime($day);
$w = (int)$date->format('w');
echo $day . "は" . $week[$w] . "曜日です\n";
?>
</body>
</html>
