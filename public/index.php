<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/10/17
 * Time: 16:38
 */
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12"><h1 class="bibliotheque">Ma Médiathèque</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6"><a href="books.php"><img src="assets/images/livres.png" alt="Livres" class="img-responsive shrink" /></a>
        </div>
        <div class="col-md-6"><a href="#"><img src="assets/images/casque.png" alt="Musique" class="img-responsive shrink" /></a>
        </div>
    </div>
    <div class="row vignette">
        <div class="col-md-6"><a href="movies.php"><img src="assets/images/video.png" alt="Film" class="img-responsive shrink" /></a>
        </div>
        <div class="col-md-6"><a href="games.php"><img src="assets/images/manette.png" alt="Jeux" class="img-responsive shrink" /></a>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
</body>
</html>
