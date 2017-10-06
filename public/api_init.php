<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 17:40
 */
require '../vendor/autoload.php';

use Wcs\API;

$api_types = ['books', 'games', 'movies', 'musics'];

$games_headers = [ 'user-key' => '17593f176568f6e3e29c4d8f2e314903'];
$api_games = new API('https://api-2445582011268.apicast.io', NULL, NULL, $games_headers);
$api_musics = new API('http://ws.audioscrobbler.com/2.0/', 'd89820b9a2dbc5f5a70259c5b25f5704', 'api_key');
$api_movies = new API('http://api.betaseries.com/', '34a52cff97b5', 'key');
//$books_headers = [ 'Accept' => 'application/json'];
$api_books = new API('http://openlibrary.org/api/');

// prepare search urls
$api_games->setSearchUri('/games/?search=%THERM%&fields=*');
$api_musics->setSearchUri('?method=track.search&track=%THERM%');
$api_movies->setSearchUri('search/all?query=%THERM%&limit=15');
$api_books->setSearchUri('search.json?q=%THERM%');

// prepare get urls from theirs id
$api_games->setGetUriFromId('/games/?id=%ID%&fields=*');
$api_musics->setGetUriFromId('?method=track.getInfo&id=%ID%');
$api_movies->setGetUriFromId('movies/movie?id=%ID%');
$api_books->setGetUriFromId('books?bibkeys=%ID%&jscmd=data&format=json');
