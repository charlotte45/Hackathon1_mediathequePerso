<!DOCTYPE html>
<html>
<head>
	<title>inscription</title>
</head>
<body>
	<?php
	require 'connect.php';
	//Connection
	$pdo = new PDO(DSN, USER,PASS);
?>

<form action="#" method="POST">
	<input type="text" name="new_user">
	<input type="text" name="new_password">
	<button type="submit">submit</button>

<?php

	$userName = $_POST['new_user'];
	$userPass = $_POST['new_password'];

	$query = "SELECT * FROM user WHERE identifier LIKE 'A%' AND password LIKE 'A%';";
	$prep = $pdo->query($query);
	$result = $prep->fetchAll();
	var_dump($result);

	$sql = "INSERT INTO user ('identifier', 'password') VALUES ('$userName', '$userPass')";
	$newRow = $pdo->exec($sql);

?>

</form>
</body>
</html>