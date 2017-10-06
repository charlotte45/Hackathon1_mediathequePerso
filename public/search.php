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
            echo 'books';
            header('Location: books.php?search=' . $cleaned);
            break;
        case 'games':
            echo 'games';
            header('Location: games.php?search=' . $cleaned);
            exit;
            break;
        case 'musics':
            echo 'musics';
            header('Location: movies.php?search=' . $cleaned);
            break;
        case 'movies':
            echo 'movies';
            header('Location: musics.php?search=' . $cleaned);
            break;
    }
    echo 'flouz';
    exit;
}
