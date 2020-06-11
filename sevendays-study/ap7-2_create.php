<?php
define('DB_DATABASE', 'prefectuers');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'pref');
define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname=' . DB_DATABASE);

try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// drop
	$db->exec("create table if not exists prefectuers.state_master (STATE_ID tinyint(4) not null auto_increment primary key, STATE_NAME varchar(30))");
	echo "created table 'state_master'" . PHP_EOL;

	// disconnect
	$db = null;

} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}


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
// $dsn = "mysql:host=localhost;charset=utf8";
// $user = "root";
// $password = "root";
// try {
// 	$db = new PDO($dsn, $user, $password);
// 	$db->exec("CREATE DATABASE IF NOT EXISTS prefecture DEFAULT CHARACTER SET utf82 COLLATE utf8_general_ci");
// } catch (PDOExpeption $e) {
// 	echo "MySQLに接続できませんでした" . $e->getMessage();
// 	exit;
// }

// tableの作成


	
?>
