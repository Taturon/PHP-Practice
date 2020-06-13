<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'dotinstall');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE);

try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// insert
	// bindValue
	$stmt = $db->prepare('insert into users (name, score) values (?, ?)');
	
	$name = 'Taturon';
	$stmt->bindValue(1, $name, PDO::PARAM_STR);
	$score = 24;
	$stmt->bindValue(2, $score, PDO::PARAM_INT);
	$stmt->execute();
	echo 'inserted: ' . $db->lastInsertId() . PHP_EOL;
	$score = 44;
	$stmt->bindValue(2, $score, PDO::PARAM_INT);
	$stmt->execute();
	echo 'inserted: ' . $db->lastInsertId() . PHP_EOL;

	// disconnect
	$db = null;
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

