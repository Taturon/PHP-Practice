<?php
// セッションの開始・再開
session_start();

// DB接続定数の定義
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'board');

// 変数の初期化
$csv_data = null;
$sql = null;
$res = null;
$posts = [];

if (!empty($_SESSION['admin_login'] && $_SESSION['admin_login'] === true)) {

	// 出力の設定
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename=投稿データ.csv');
	header('Content-Transfer-Encoding: binary');

	// DB接続
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// DB接続エラーの確認
	if (!$mysqli->connect_errno) {
		$mysqli->set_charset('utf8');
		$sql = 'select * from message order by post_date asc';
		$res = $mysqli->query($sql);
		if ($res) {
			$posts = $res->fetch_all(MYSQLI_ASSOC);
		}
		$mysqli->close();
	}

	// CSVデータの作成
	if (!empty($posts)) {

		// 1行目のラベル作成
		$csv_data .= '"ID","表示名","メッセージ","投稿日時"'."\n";

		foreach ($posts as $post) {
			$csv_data .= '"' . $post['id'] . '","' . $post['view_name'] . '","' . $post['message'] . '","' . $post['post_date'] . "\"\n";
		}
	}

	// ファイルを出力
	echo $csv_data;
} else {

	// ログインページへリダイレクト
	header('Location: ./admin.php');
}

return;
