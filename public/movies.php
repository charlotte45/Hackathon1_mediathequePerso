<?php
/**
 * Created by PhpStorm.

 * User: wilder4
 * Date: 06/10/17
 * Time: 00:39
 */

include 'header.php';

require_once 'api_init.php';
require_once '../src/functions.php';

$search = false;
$results = '';
if (!empty($_GET['search'])) {
    $cleaned = cleanVar($_GET['search']);
    $results = $api_movies->search($cleaned);
    $search = true;
    $results = $results->movies;

    var_dump($results);
} else if (!empty($_GET['id'])) {
    $cleaned = cleanVar($_GET['id']);
    $results = $api_movies->getInfosFromID($cleaned);

    var_dump($results);
}

if (empty($results)) {
    if ($search) {
// TODO: Metre un message 'pas de résultats pour la recherche' en html
    } else {
// TODO: Metre un message 'pas de résultats dans votre bibliothèque' en html
    }
} else {
    ?>
    <div class="container category">
        <?php if ($search) : ?>
            <h1>Résultat(s) des films</h1>
        <?php else : ?>
            <h1>Mes films</h1>
        <?php endif; ?>
        <?php
        $count = 0;
        foreach ($results as $obj) :
            if ($count == 0) : ?>
                <div class="row">
            <?php endif; ?>
            <div class="col-xs-6 col-md-3">
                <figure class="thumbnail">
                    <img src="<?= $obj->cover->url ?>" class="image">
                    <figcaption class="caption">
                        <p class="text-center"><?= $obj->name ?></p>
                        <p><?= $obj->summary ?></p>
                        <div>
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
                        </div>
                    </figcaption>
                </figure>
            </div>
            <?php
            $count++;
            if ($count == 3) : ?>
                </div>
                <?php
                $count = 0;
            endif;
        endforeach; ?>
    </div>
    <?php
}
include 'footer.php';
?>

