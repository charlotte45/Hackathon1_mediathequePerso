<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 06/10/17
 * Time: 00:39
 */
include 'header.php';
?>

<div class="container category">
    <h1>Mes livres</h1>
        <div class="row">
            <div class="col-xs-6 col-md-3">
                <figure class="thumbnail">
                    <img src="..." class="image">
                    <figcaption class="caption">
                        <p>titre</p>
                        <p>auteur</p>
                        <p>édition</p>
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
            </div>
        </div>
</div>

<?php
include 'footer.php';
?>