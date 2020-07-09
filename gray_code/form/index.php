<?php
var_dump($_POST);

// 変数の初期化
$page_flg = 0;

if (!empty($_POST['btn_confirm'])) {
	$page_flg = 1;
} elseif (!empty($_POST['btn_submit'])) {
	$page_flg = 2;
}
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
<?php if ($page_flg === 1): ?>
<form method="POST">
<div class="element_wrap">
<label for="name">氏名</label>
<p id="name"><?php echo $_POST['name']; ?></p>
</div>
<div class="element_wrap">
<label for="email">メールアドレス</label>
<p id="email"><?php echo $_POST['email']; ?></p>
</div>
<input type="submit" name="btn_back" value="戻る">
<input type="submit" name="btn_submit" value="送信">
<input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
</form>
<?php elseif ($page_flg === 2): ?>
<p>送信が完了しました</p>
<?php else: ?>
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
<?php endif; ?>
</body>
</html>
