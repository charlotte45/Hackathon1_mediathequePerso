<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 22:32
 */

require 'api_init.php';
require_once '../src/functions.php';

if (!empty($_GET['search'])) {
    $cleaned = htmlentities($_GET['search']);
    $results = $api_games->search($cleaned);

    var_dump($results);
} else if (!empty($_GET['id'])) {
    $cleaned = cleanVar($_GET['id']);
    $results = $api_games->getInfosFromID($cleaned);

    var_dump($results);
}
