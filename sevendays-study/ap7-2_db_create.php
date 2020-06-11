<?php
define('DB_NAME', 'prefectuers');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_CHARACTER', 'utf8');
define('DB_COLLATE', 'utf8_general_ci');
define('PDO_DSN', 'mysql:host=localhost;charset=utf8');

try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// drop
	$db->exec("create database " . DB_NAME . " character set " . DB_CHARACTER . " collate " . DB_COLLATE);
	echo "created database 'prefectuers'" . PHP_EOL;

	// disconnect
	$db = null;

} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}


?>
