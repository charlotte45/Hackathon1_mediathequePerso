<?php
/**
 * Created by PhpStorm
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
    $results = $api_books->search($cleaned);
    $search = true;
} else if (!empty($_GET['id'])) {
    $cleaned = cleanVar($_GET['id']);
    $results = $api_books->getInfosFromID($cleaned);

    var_dump($results);
}

if (empty($results)) {
    if ($search) {
        ?><p class="annonce">Il n'y a aucun résultat pour votre recherche.</p>
        <?php
    } else {
        ?><p class="annonce">Vous n'avez pas encore ajouté d'éléments à cette catégorie.</p>
        <?php
    }
} else {
    echo 'bb4obs';
    ?>
    <div class="container category">
        <?php if ($search) : ?>
            <h1>Résultat(s) des livres</h1>
        <?php else : ?>
            <h1>Mes livres</h1>
        <?php endif; ?>
        <?php
        $total = 12;
        $count = 0;
        foreach ($results->docs as $obj) :
            if ($count == 0) : ?>
                <div class="row">
            <?php endif; ?>
            <div class="col-xs-6 col-md-3">
                <a href="#">
                    <figure class="thumbnail">
                        <img src="assets/images/livres.png" class="image">
                        <figcaption class="caption">
                            <p class="text-center"><?= property_exists($obj, 'title') ? $obj->title : '' ?></p>
                            <p class="text"><?= property_exists($obj, 'summary') ? $obj->summary : '' ?></p>
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
                </a>
            </div>
            <?php
            $count++;
            $total--;
            if ($count == 4) : ?>
                </div>
                <?php
                $count = 0;
            endif;
            if ($total == 0) {
                break;
            }
        endforeach; ?>
    </div>
    <?php
}
include 'footer.php';
?>
