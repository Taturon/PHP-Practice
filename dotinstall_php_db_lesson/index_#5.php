<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'dotinstall');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE);

try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	/*
	(1)	exec():		結果を返さない、安全なSQL
	(2)	query():	結果を返す、安全、何回も実行されないSQL
	(3) prepare():	結果を返す、安全対策が必要、複数回実行されるSQL
	*/

	// insert
	$stmt = $db->prepare('insert into users (name, score) values (?, ?)');
	$stmt->execute(['Taturon', 40]);
	echo 'inserted: ' . $db->lastInsertId();

	// disconnect
	$db = null;
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

