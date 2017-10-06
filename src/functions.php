<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 06/10/17
 * Time: 03:00
 */

function cleanVar(string $input)
{
    return htmlentities(trim($input));
}

function getStateFromIds(PDO $pdo, string $id, int $category) : string
{
    $query = 'SELECT * FROM content WHERE api_id=:apiId AND api_category=:apiCategory AND user_id=:userId;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':apiId', $id);
    $prep->bindValue(':apiCategory', $category);
    $prep->bindValue(':userId', $_SESSION['user_id']);
    $prep->execute();

    $result = $prep->fetch();

    $state = 0;
    if (!empty($result)) {
        $state = $result['state'];
    }

    return $state;
}
