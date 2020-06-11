<?php
if (isset($_POST['num1']) && isset($_POST['num2'])) {
	$num1 = $_POST['num1'];
	$num2 = $_POST['num2'];
	$symbol = $_POST['symbol'];

	switch($symbol) {
		case "+":
			$result = $num1 + $num2;
			break;
		case "-":
			$result = $num1 - $num2;
			break;
		default:
			break;
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Calculator</title>
</head>
<body>
<h1>Calculator</h1>
<form method="POST" action="applied_practice_prob7_form.php">
<input type="number" name="num1">
<select name="symbol" size="1"> 
<option value="+">+</option>
<option value="-">-</option>
<input type="number" name="num2">
<input type="submit" value="=">
<input type="text" name="result" value="<?php echo $result; ?>">
</form>
</body>
</html>
