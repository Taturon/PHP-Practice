<?php
// $prefecture = array(0 => "選択下さい。", 1 => "北海道", 2 => "青森県", 3 => "岩手県", 4 => "宮城県", 5 => "秋田県", 6 => "山形県", 7 => "福島県", 8 => "茨城県", 9 => "栃木県", 10 => "群馬県", 11 => "埼玉県", 12 => "千葉県", 13 => "東京都", 14 => "神奈川県", 15 => "山梨県", 16 => "長野県", 17 => "新潟県", 18 => "富山県", 19 => "石川県", 20 => "福井県", 21 => "岐阜県", 22 => "静岡県", 23 => "愛知県", 24 => "三重県", 25 => "滋賀県", 26 => "京都府", 27 => "大阪府", 28 => "兵庫県", 29 => "奈良県", 30 => "和歌山県", 31 => "鳥取県", 32 => "島根県", 33 => "岡山県", 34 => "広島県", 35 => "山口県", 36 => "徳島県", 37 => "香川県", 38 => "愛媛県", 39 => "高知県", 40 => "福岡県", 41 => "佐賀県", 42 => "長崎県", 43 => "熊本県", 44 => "大分県", 45 => "宮崎県", 46 => "鹿児島県", 47 => "沖縄県"); 
// 
// $dsn = "mysql:host=localhost;dbname=prefecture;charset=utf8";
// $user = "root";
// $password = "root";
// try {
// 	$dbh = new PDO($dsn, $user, $password);
// 	$sql = "CREATE TABLE prefecture.prefectures (STATE_ID TINYINT(4) AUTO_INCREMENT PRIMARY KEY, STATE_NAME VARCHAR(30)";
// 	$stmt = $dbh->query($sql);
// } catch (PDOExpeption $e) {
// 	var_dump($e);
// 	echo "データベースに接続できませんでした" . $e->getMessage();
// 	exit;
// }
//$stmt = $dbh->query("INSERT INTO prefectures

// DBの作成
$dsn = "mysql:host=localhost;charset=utf8";
$user = "root";
$password = "root";
try {
	$db = new PDO($dsn, $user, $password);
	$db->exec("CREATE DATABASE IF NOT EXISTS prefecture DEFAULT CHARACTER SET utf82 COLLATE utf8_general_ci");
} catch (PDOExpeption $e) {
	echo "MySQLに接続できませんでした" . $e->getMessage();
	exit;
}

// tableの作成


	
?>
