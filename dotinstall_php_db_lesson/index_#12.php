<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'dotinstall');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE);

try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// update
	$stmt = $db->prepare('update users set score = :score where name = :name');
	$stmt->execute([
		':score' => 100,
		':name' => 'Taturon'
	]);
	echo 'row updated: ' . $stmt->rowCount() . PHP_EOL;

	// delete
	$stmt = $db->prepare('delete from users where name = :name');
	$stmt->execute([
		':name' => 'Taturon'
	]);
	echo 'row deleted: ' . $stmt->rowCount() . PHP_EOL;

	// disconnect
	$db = null;
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

