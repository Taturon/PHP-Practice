<?php
$str1 = 'Tom';
$str2 = 'Jerry';
$str3 = $str1 . ' and ' . $str2;
echo $str3;
echo '<br>';
$message = <<< EOF
一行目です。
二行目です。
三行目です。
EOF;
echo $message;
echo '<br>';
$item = 'テニス';
?>
私は<?= $item ?>が好きです。
