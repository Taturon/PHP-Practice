<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'dotinstall');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE);

class User {
	// PDO::FETCH_CLASSモードではカラムを自動的にクラスのpublicプロパティにセットするので以下は省略可能
	/*
	public $id;
	public $name;
	public $score;
	*/
	public function show() {
		echo "$this->name ($this->score)" . PHP_EOL;
	}
}

try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// select
	// FETCH_CLASS
	$stmt = $db->query("select * from users");
	$users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
	foreach ($users as $user) {
		$user->show();	
	}
	echo $stmt->rowCount() . ' records found.' . PHP_EOL;

	// disconnect
	$db = null;
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

