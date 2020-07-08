<?php
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ひと言掲示板</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<h1>お問い合わせフォーム</h1>
<form method="POST">
<div class="element_wrap">
<label for="name">氏名</label>
<input id="name" type="text" name="name" value="">
</div>
<div class="element_wrap">
<label for="email">メールアドレス</label>
<input id="email" type="text" name="email" value="">
</div>
<input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>
</body>
</html>
