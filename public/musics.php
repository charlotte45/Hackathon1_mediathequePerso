<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: wilder4
 * Date: 06/10/17
 * Time: 00:39
 */
include 'header.php';
require_once 'api_init.php';
require_once '../src/functions.php';

if (!empty($_GET['search'])) {
    $cleaned = htmlentities($_GET['search']);
    $results = $api_musics->search($cleaned);

    var_dump($results);
} else if (!empty($_GET['id'])) {
    $cleaned = cleanVar($_GET['id']);
    $results = $api_musics->getInfosFromID($cleaned);

    var_dump($results);
}

?>

<div class="container category">
    <h1>Mes musiques</h1>
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <a href="#">
                <figure class="thumbnail">
                    <img src="..." class="image">
                    <figcaption class="caption">
                        <p>titre</p>
                        <p>auteur</p>
                        <p>genre</p>
                        <p>
                        <form action="" method="post" class="formThumbnail">
                            <input type="hidden" name="id" value="id"/>
                            <input type="hidden" name="state" value="1"/>
                            <button type="submit" class="btn btn-danger">J'ai</button>
                        </form>
                        <form action="" method="post" class="formThumbnail">
                            <input type="hidden" name="id" value="id"/>
                            <input type="hidden" name="state" value="2"/>
                            <button type="submit" class="btn btn-danger">Je veux</button>
                        </form>
                        </p>
                    </figcaption>
                </figure>
            </a>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
