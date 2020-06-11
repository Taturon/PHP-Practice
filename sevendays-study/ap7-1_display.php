<?php


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
