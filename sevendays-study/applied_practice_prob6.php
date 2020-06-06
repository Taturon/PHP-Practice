<?php
echo "prob.6-1\n";
try {
	$dbh = new PDO('mysql:host=localhost;dbname=greetings;charset=utf8', 'root', 'root');
    foreach($dbh->query('SELECT * from greeting') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "エラー!: " . $e->getMessage();
    die();
}
?>
<br>
<?php
echo "prob.6-2,6-3\n";
$dsn = "mysql:host=localhost;dbname=greetings;charset=utf8";
$user = "root";
$password = "root";
try {
	$dbh = new PDO($dsn, $user, $password);
	$sql = "SELECT * FROM greeting WHERE id = 2";
	$stmt = $dbh->query($sql);
	foreach ($stmt as $row) {
		echo "挨拶:" . $row['text'] . "\nNo:" . $row['number'];
	}
} catch (PDOExpeption $e) {
	echo "データベースに接続できませんでした" . $e->getMessage();
	exit;
}
?>
