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
$message_id = null;
$mysqli = null;
$sql = null;
$res = null;
$error_messages = [];
$message_data = [];

// 管理者でない場合
if (empty($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true) {

	// ログインページへリダイレクト
	header('Location: ./admin.php');
}

if (!empty($_GET['message_id']) && empty($_POST['message_id'])) {
	$message_id = (int)htmlspecialchars($_GET['message_id'], ENT_QUOTES);

	// DB接続
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// 接続エラーの確認
	if ($mysqli->connect_errno) {
		$error_messages[] = 'DB接続に失敗しました。エラー番号' . $mysqli->connect_errno . ' : ' . $mysqli->connect_err;
	} else {

		// データの読み込み
		$mysqli->set_charset('utf8');
		$sql = "select * from message where id = $message_id";
		$res = $mysqli->query($sql);

		if ($res) {
			$message_data = $res->fetch_assoc();
		} else {

			// データが読み込めなかった場合は一覧に戻る
			header('Location: ./admin.php');
		}

		$mysqli->close();
	}
} elseif (!empty($_POST['message_id'])) {

	$message_id = (int)htmlspecialchars($_POST['message_id'], ENT_QUOTES);

	// DB接続
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// 接続エラーの確認
	if ($mysqli->connect_errno) {
		$error_messages[] = 'DB接続に失敗しました。エラー番号' . $mysqli->connect_errno . ' : ' . $mysqli->connect_errno;
	} else {
		$sql = "delete from message where id = $message_id";
		$res =$mysqli->query($sql);
	}

	$mysqli->close();

	// 更新に成功したら一覧に戻る
	if ($res) {
		header('Location: ./admin.php');
	}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ひと言掲示板 管理ページ 投稿の削除</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<h1>ひと言掲示板 管理ページ 投稿の削除</h1>
<?php if (!empty($error_messages)): ?>
<ul class="error_messages">
<?php foreach ($error_messages as $error_message): ?>
<li>・<?php echo $error_message; ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<p class="text-confirm">以下の投稿を削除します<br>よろしければ「削除」ボタンを押して下さい</p>
<form method='POST'>
<div>
<label for="view_name">表示名</label>
<input id="view_name" type="text" name="view_name" value="<?php
if (!empty($message_data['view_name'])) echo $message_data['view_name'];
?>" disabled>
</div>
<div>
<label for="message">一言メッセージ</label>
<textarea id="message" name="message" disabled><?php
if (!empty($message_data['message'])) echo $message_data['message'];
?></textarea>
</div>
<a class="btn_cancel" href="admin.php">キャンセル</a>
<input type="submit" name="btn_submit" value="削除">
<input type="hidden" name="message_id" value="<?php echo $message_data['id']; ?>">
</form>
</body>
</html>
