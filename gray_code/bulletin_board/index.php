<?php
const FILENAME = 'message.txt';
date_default_timezone_set('Asia/Tokyo');

// 変数の初期化
$file_handle = $now_date = $name = $message = $data = $split_data = $success_message = null;
$posts = [];

$data = null;
if (isset($_POST['btn_submit'])) {
	if ($file_handle = fopen(FILENAME, 'a')) {
		$now_date = date("Y-m-d H:i:s");
		$name = $_POST['view_name'];
		$message = $_POST['message'];
		$data = $name . ',' . $message . ',' . $now_date . "\n";
		fwrite($file_handle, $data);
		fclose($file_handle);
		$success_message = 'メッセージを書き込みました';
	}
}

if ($file_handle = fopen(FILENAME, 'r')) {
	while ($data = fgets($file_handle)) {
		$posts[] = explode(',', $data);
	}	
	fclose($file_handle);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ひと言掲示板</title>
<?php if (isset($success_message)): ?>
<p class="success_message"><?php echo $success_message; ?></p>
<?php endif ?>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<h1>ひと言掲示板</h1>
<form method='POST'>
<div>
<label for="view_name">表示名</label>
<input id="view_name" type="text" name="view_name">
</div>
<div>
<label for="message">一言メッセージ</label>
<textarea id="message" name="message"></textarea>
</div>
<input type="submit" name="btn_submit" value="書き込む">
</form>
<hr>
<section>
<?php if (!empty($posts)): ?>
<?php foreach ($posts as $post): ?>
<article>
<div class="info">
<h2><?php echo $post[0]; ?></h2>
<time><?php echo $post[2]; ?></time>
</div>
<p><?php echo $post[1]; ?></p>
</article>
<?php endforeach; ?>
<?php endif; ?>
<hr>
<section>
<!-- ここに投稿されたメッセージを表示 -->
</section>
</body>
</html>
