<?php
// DB接続定数の定義
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'board');

// タイムゾーンの設定
date_default_timezone_set('Asia/Tokyo');

// 変数の初期化
$file_handle = $now_date = $name = $message = $data = $split_data = $success_message = null;
$posts = $error_messages = $clean = [];

$data = null;
if (isset($_POST['btn_submit'])) {
	// 表示名のバリデーションとサニタイズ
	if (empty($_POST['view_name'])) {
		$error_messages[] = '表示名を入力して下さい';
	} else {
		$clean['view_name'] = htmlspecialchars($_POST['view_name'], ENT_QUOTES);
		$clean['view_name'] = preg_replace('/\\r\\n|\\n|\\r/', '', $clean['view_name']);
	}

	// メッセージのバリデーションとサニタイズ
	if (empty($_POST['message'])) {
		$error_messages[] = '一言メッセージを入力して下さい';
	} else {
		$clean['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES);
		$clean['message'] = preg_replace('/\\r\\n|\\n|\\r/', '<br>', $clean['message']);
	}

	if (empty($error_messages)) {

		// DB接続
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		// DB接続エラーの確認
		if ($mysqli->connect_errno) {
			$error_messages[] = 'DBへの書き込みに失敗しました エラー番号' . $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
		} else {
			$mysqli->set_charset('utf8');
			$now_date = date('Y-m-d H:i:s');
			$sql = "insert into message (view_name, message, post_date) values ('$clean[view_name]','$clean[message]','$now_date')";
			$res = $mysqli->query($sql);
		}

		if ($res) {
			$success_message = 'メッセージを書き込みました';
		} else {
			$error_messages[] = '書き込みに失敗しました';
		}

		$mysqli->close();
	}
}

// DB接続
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// DB接続エラーの確認
if ($mysqli->connect_errno) {
	$error_messages[] = 'DBへの読み込みに失敗しました エラー番号' . $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
} else {
	$sql = 'select view_name, message, post_date from message order by post_date desc';
	$mysqli->query('set names utf8mb4');
	$res = $mysqli->query($sql);

	if ($res) {
		$posts = $res->fetch_all(MYSQLI_ASSOC);
	}

	$mysqli->close();
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
<?php if (isset($success_message)): ?>
<p class="success_message"><?php echo $success_message; ?></p>
<?php endif ?>
<?php if (!empty($error_messages)): ?>
<ul class="error_messages">
<?php foreach ($error_messages as $error_message): ?>
<li>・<?php echo $error_message; ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
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
<h2><?php echo $post['view_name']; ?></h2>
<time><?php echo $post['post_date']; ?></time>
</div>
<p><?php echo $post['message']; ?></p>
</article>
<?php endforeach; ?>
<?php endif; ?>
</section>
</body>
</html>
