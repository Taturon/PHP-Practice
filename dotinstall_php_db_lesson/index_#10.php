<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'dotinstall');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE);

try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// select
	$stmt = $db->prepare("select score from users where score > ?");
	$stmt->execute([20]);
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($users as $user) {
		var_dump($user);
	}
	echo $stmt->rowCount() . ' records found.' . PHP_EOL;

	$stmt = $db->prepare("select name from users where name like ?");
	$stmt->execute(['%T%']);
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($users as $user) {
		var_dump($user);
	}
	echo $stmt->rowCount() . ' records found.' . PHP_EOL;

	$stmt = $db->prepare("select score from users order by score desc limit ?");
	$stmt->bindValue(1, 1, PDO::PARAM_INT);
	$stmt->execute();
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($users as $user) {
		var_dump($user);
	}
	echo $stmt->rowCount() . ' records found.' . PHP_EOL;

	// disconnect
	$db = null;
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

