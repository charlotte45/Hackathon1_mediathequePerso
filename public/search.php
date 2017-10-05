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
    $cleaned = htmlentities($_POST['search']);
    switch ($_POST['type']) {
        case 'books':
            header('Location books.php?search=' . $cleaned);
            break;
        case 'games':
            header('Location games.php?search=' . $cleaned);
            break;
        case 'musics':
            header('Location movies.php?search=' . $cleaned);
            break;
        case 'movies':
            header('Location musics.php?search=' . $cleaned);
            break;
    }
}
