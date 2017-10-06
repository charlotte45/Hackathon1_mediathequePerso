<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 22:33
 */

require_once 'api_init.php';
require_once '../src/functions.php';

if (!empty($_GET['search'])) {
    $cleaned = cleanVar($_GET['search']);
    $results = $api_movies->search($cleaned);

    var_dump($results);
} else if (!empty($_GET['id'])) {
    $cleaned = cleanVar($_GET['id']);
    $results = $api_movies->getInfosFromID($cleaned);

    var_dump($results);
}
