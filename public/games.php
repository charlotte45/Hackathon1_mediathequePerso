<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 22:32
 */

require 'api_init.php';

if (!empty($_POST['search'])) {
    $cleaned = htmlentities($_POST['search']);
    $results = $api_games->search($cleaned);

    var_dump($results);
}