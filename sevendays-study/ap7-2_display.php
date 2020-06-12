<?php
define('DB_DATABASE', 'prefectuers');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'pref');
define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname=' . DB_DATABASE);

$select = $_POST['show_method'];

try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	switch ($select) {
		case 'all':
			$stmt = $db->query('select * from state_master');
			$prefs = $stmt->fetchAll(PDO::FETCH_ASSOC);
			break;
		case 'metropolice':
			$stmt = $db->prepare('select * from state_master where STATE_NAME like ?');
			$stmt->execute(['%都']);
			$prefs = $stmt->fetchAll(PDO::FETCH_ASSOC);
			break;
		case 'do':
			$stmt = $db->prepare('select * from state_master where STATE_NAME like ?');
			$stmt->execute(['%道%']);
			$prefs = $stmt->fetchAll(PDO::FETCH_ASSOC);
			break;
		case 'urban':
			$stmt = $db->prepare('select * from state_master where STATE_NAME like ?');
			$stmt->execute(['%府%']);
			$prefs = $stmt->fetchAll(PDO::FETCH_ASSOC);
			break;
		case 'pref':
			$stmt = $db->prepare('select * from state_master where STATE_NAME like ?');
			$stmt->execute(['%県%']);
			$prefs = $stmt->fetchAll(PDO::FETCH_ASSOC);
			break;
		default:
			$stmt = $db->query('select * from state_master');
			$prefs = $stmt->fetchAll(PDO::FETCH_ASSOC);
			break;
	}

	// disconnect
	$db = null;

} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta lang="ja">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<title>都道府県一覧</title>
</head>
<body>
<h4>都道府県の表示</h4>
<form action="" method="POST">
<select name="show_method" size="1">
<option value="all">全ての都道府県を表示</option>
<option value="metropolice">都を表示</option>
<option value="do">道を表示</option>
<option value="urban">府を表示</option>
<option value="pref">県を表示</option>
</select>
<input type="submit" value="表示">
<table>
<tr>
<th id="id">ID</th>
<th id="name">都道府県名</th>
</tr>
<?php foreach ($prefs as $pref): ?>
<tr>
<td><?php echo $pref['STATE_ID']; ?></td>
<td><?php echo $pref['STATE_NAME']; ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
