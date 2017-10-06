<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/10/17
 * Time: 17:24
 */
?>
<?php
    require 'connect.php';
    //Connection
    $pdo = new PDO(DSN, USER,PASS);
?>

<div class="container-fluid title">
    <img src="assets/images/wildflix.png" alt="logo" class="logo" class="img-responsive"/>
    <p>--- Votre médiathèque personnelle ---</p>
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
    <?php
    if (!empty($_POST['user'])) {

    }
    $userName = $_POST['user'];
    $userPass = $_POST['password'];

    $query = 'SELECT * FROM user WHERE identifier=:identifier AND password=:password;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':identifier', $userName);
    $prep->bindValue(':password', $userPass);
    $prep->execute();

    $result = $prep->fetchAll();

    foreach ($result as $value) {
        if ($value['identifier'] == $userName
            && $value['password'] == $userPass) {
            header('Location: index.php');
        }
    } 
?>
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
                    <?php

                        $userName = $_POST['new_user'];
                        $userPass = $_POST['new_password'];

                        $query = "SELECT * FROM user WHERE identifier LIKE 'A%' AND password LIKE 'A%';";
                        $prep = $pdo->query($query);
                        $result = $prep->fetchAll();

                        $sql = "INSERT INTO user ('identifier', 'password') VALUES ('$userName', '$userPass')";
                        $newRow = $pdo->exec($sql);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
