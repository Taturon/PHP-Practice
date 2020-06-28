<?php
const FILENAME = 'message.txt';
date_default_timezone_set('Asia/Tokyo');

if (isset($_POST['btn_submit'])) {
	if ($file_handle = fopen(FILENAME, 'a')) {
		$now_date = date("Y-m-d H:i:s");
		$name = $_POST['view_name'];
		$message = $_POST['message'];
		$data = $name . ',' . $message . ',' . $now_date . "\n";
		fwrite($file_handle, $data);
		fclose($file_handle);
	}

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
<!-- ここに投稿されたメッセージを表示 -->
</section>
</body>
</html>
