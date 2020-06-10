<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'dotinstall');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE);

try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// beginTransaction();
	$db->beginTransaction();
	$db->exec("update users set score = score - 10 where name = 'Taturon'");	
	$db->exec("update users set score = score + 10 where name = 'Fujiko'");	
	$db->commit();

	// disconnect
	$db = null;
} catch (PDOException $e) {
	$db->rollback();
	echo $e->getMessage();
	exit;
}

