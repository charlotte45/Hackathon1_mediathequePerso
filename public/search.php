<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 22:39
 */

require 'api_init.php';

if (!empty($_POST['therm'])
    && !empty($_POST['type'])
    && in_array($_POST['type'], $api_types)) {
    echo 'here';
    $cleaned = htmlentities($_POST['therm']);
    switch ($_POST['type']) {
        case 'books':
            header('Location: books.php?search=' . $cleaned);
            exit;
            break;
        case 'games':
            header('Location: games.php?search=' . $cleaned);
            exit;
            break;
        case 'musics':
            header('Location: musics.php?search=' . $cleaned);
            exit;
            break;
        case 'movies':
            header('Location: movies.php?search=' . $cleaned);
            exit;
            break;
    }

    header('Location: index.php');
    exit;
}
