<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Problem 5</title>
</head>
<body>
<h1>Problem 5-1</h1>
<table border="2">
<?php for ($i = 1; $i <= 9; $i++) { ?>
<tr>
<?php for ($j = 1; $j <= 9; $j++) { ?>
<?php $k = $i * $j ?>
<td><?php echo $i . "×" . $j . "=" . $k ?></td> 
<?php } ?>
</tr>
<?php } ?>
</table>
<br>
<table border="2">
<?php for ($i = 1; $i <= 9; $i++) { ?>
<tr>
<?php for ($j = 1; $j <= 9; $j++): ?>
<?php $k = $i * $j ?>
<?php if ($k % 2 != 0): ?>
<td style="background: gray;"><?php echo $i . "×" . $j . "=" . $k ?></td> 
<?php elseif ($k == 18): ?>
<td style="color: red;"><?php echo $i . "×" . $j . "=" . $k ?></td> 
<?php else: ?>  
<td><?php echo $i . "×" . $j . "=" . $k ?></td> 
<?php endif; ?>
<?php endfor; ?>
</tr>
<?php } ?>
</table>
</body>
</html>
