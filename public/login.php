<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/10/17
 * Time: 17:24
 */
include 'header.php'
?>

<div class="container-fluid title">
    <img src="logo.png" alt="logo" class="logo"/>
    <h1>--- Votre médiathèque personnelle ---</h1>
</div>

<div class="container login">
    <form action="" method="post">
        <fieldset class="form-group">
            <legend>CONNEXION</legend>
            <input type="text" class="form-control" name="user" id="user"
                   placeholder="Entrer votre nom d'utilisateur" value=""/>
            <input type="password" class="form-control" name="password" id="password"
                   placeholder="Entrer votre mot de passe"  value=""/>
            <button type="submit" class="btn">Se connecter</button>
        </fieldset>
    </form>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <fieldset class="form-group">
                            <legend class="inscription">INSCRIPTION</legend>
                        </fieldset>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <form action="" method="post">
                        <fieldset class="form-group">
                            <input type="text" class="form-control" name="userInscription" id="userInscription"
                                   placeholder="Entrer un nom d'utilisateur" value=""/>
                            <input type="password" class="form-control" name="passwordInscription" id="passwordInscription"
                                   placeholder="Entrer un mot de passe"  value=""/>
                            <button type="submit" class="btn">S'inscrire</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';