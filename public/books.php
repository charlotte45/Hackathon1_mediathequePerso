<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 22:34
 */

require_once 'api_init.php';

if (!empty($_POST['search'])) {
    $cleaned = htmlentities($_POST['search']);
    $results = $api_books->search($cleaned);

    var_dump($results);
}
