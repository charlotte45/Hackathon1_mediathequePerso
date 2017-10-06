<!DOCTYPE html>
<html>
<head>
	<title>requete</title>
</head>
<body>
	<?php
	require 'connect.php';
	//Connection
	$pdo = new PDO(DSN, USER,PASS);
?>

	<form action="#" method="POST">
		<input type="text" name="user_name">
		<input type="text" name="user_password">
		<button type="submit">submit</button>
	</form>

<?php

	$userName = $_POST['user_name'];
	$userPass = $_POST['user_password'];

	$query = 'SELECT * FROM user WHERE identifier=:identifier AND password=:password;';
	$prep = $pdo->prepare($query);
	$prep->bindValue(':identifier', $userName);
	$prep->bindValue(':password', $userPass);
	$prep->execute();

	$result = $prep->fetchAll();

	foreach ($result as $value) {
		if ($value['identifier'] == $userName
			&& $value['password'] == $userPass) {
			header('Location: index.php');
			exit();
		}
	}
?>

</body>
</html>




