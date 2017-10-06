<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 06/10/17
 * Time: 12:26
 */

if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require 'connect.php';

$pdo = new PDO(DSN, USER,PASS);

//die('Jajoute');

if (!empty($_POST['category'])
    && !empty($_POST['id'])
    && !empty($_POST['state'])
    && !empty($_SESSION['user_id'])) {

    $query = 'SELECT * FROM content WHERE api_id=:apiId AND api_category=:apiCategory AND user_id=:userId;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':apiId', $_POST['id']);
    $prep->bindValue(':apiCategory', $_POST['category']);
    $prep->bindValue(':userId', $_SESSION['user_id']);
    $prep->execute();

    $result = $prep->fetch();

    $userId = $_SESSION['user_id'];
    $id = $_POST['id'];
    $cat = $_POST['category'];

    if (empty($result)) {
        $state = $_POST['state'];
        $sql = "INSERT INTO content (user_id, api_id, api_category, state) VALUES ('$userId', '$id', '$cat', '$state')";
        $newRow = $pdo->exec($sql);
    } else {
        $state = $_POST['state'];
        $idContent = $result['id'];

        $sql = "UPDATE content SET user_id = :userId, 
            api_id = :apiId, 
            api_category = :apiCategory, 
            state = :newState,
            WHERE id = :currentId";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $_POST['filmName']);
        $stmt->bindParam(':apiId', $_POST['id']);
        $stmt->bindParam(':apiCategory', $_POST['category']);
        $stmt->bindParam(':newState', $state);
        $stmt->bindParam(':currentId', $idContent);
        $stmt->execute();
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
