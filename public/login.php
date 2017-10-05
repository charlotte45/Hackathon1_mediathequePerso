<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/10/17
 * Time: 17:24
 */
?>
<div class="container-fluid title">
    <img src="logo.png" alt="logo" class="logo"/>
    <p>Votre médiathèque personnelle</p>
</div>
<div class="container">
    <form action="" method="post">
        <fieldset class="form-group">
            <legend>CONNEXION</legend>
            <input type="text" class="form-control" name="user" id="user"
                   placeholder="Entrer votre nom d'utilisateur" value=""/>
            <input type="password" class="form-control" name="password" id="password"
                   placeholder="Entrer votre mot de passe"  value=""/>
            <button type="submit" class="btn btn-success">Se connecter</button>
        </fieldset>
    </form>
</div>

<div class="container">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <fieldset class="form-group">
                            <legend>INSCRIPTION</legend>
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
                            <button type="submit" class="btn btn-success">S'inscrire</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>