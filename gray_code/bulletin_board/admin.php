<?php
// セッションの開始・再開
session_start();

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
<title>ひと言掲示板 管理ページ</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<h1>ひと言掲示板 管理ページ</h1>
<?php if (!empty($error_messages)): ?>
<ul class="error_messages">
<?php foreach ($error_messages as $error_message): ?>
<li>・<?php echo $error_message; ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
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
