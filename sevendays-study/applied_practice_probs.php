<?php
echo "prob.1-1\n";
$str1 = "あいう,かきく";
$str2 = explode(",", "あいう,かきく");
var_dump($str2);
echo $str1 . "\n" . $str2[0] . "\n" . $str2[1] . "\n";
?>
<br>
<?php
echo "prob.1-2\n";
$int = sprintf("%05d", 568);
echo $int . "\n";
?>
<br>
<?php
echo "prob.1-3\n";
$str = "Momotaro born from peach";
echo str_replace("Momotaro", "Momoko", $str) . "\n";
?>
<br>
<?php
echo "prob.1-4\n";
$str = "Momotaro born from peach";
$reg_exp = "/^[A-Za-z\s]+$/";
if (preg_match($reg_exp, $str)) {
	echo "半角英字です";
} else {
	echo "違います";
}
echo "\n";
?>
<br>

