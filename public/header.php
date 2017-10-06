<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/10/17
 * Time: 16:39
 */

require 'connect.php';

session_start();

$pdo = new PDO(DSN, USER,PASS);

if (empty($_SESSION['user'])) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Page Index">
        <title>WildFlix</title>

        <!-- Bootstrap core CSS -->
        <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Font Awesome -->
        <link href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    </head>

    <body>
        <header>
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Wildflix</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <form method="post" action="search.php" class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" name="therm" class="form-control" placeholder="Recherche">
                            <select class="form-control" name="type">
                                <option value="games">Jeux vidéo</option>
                                <option value="musics">Musique</option>
                                <option value="books">Livres</option>
                                <option value="movies">Films/Séries</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><?= empty($_SESSION['user']) ? '' : $_SESSION['user'] ?></a></li>
                        <li><a href="logout.php">Se déconnecter</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </header>
