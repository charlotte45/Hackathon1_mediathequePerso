<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 22:34
 */

require_once 'api_init.php';

if (!empty($_GET['search'])) {
    $cleaned = htmlentities($_GET['search']);
    $results = $api_musics->search($cleaned);

    var_dump($results);
}
