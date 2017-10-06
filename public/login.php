<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/10/17
 * Time: 17:24
 */

require 'connect.php';
//Connection
//$pdo = new PDO(DSN, USER,PASS);

if (!empty($_POST['user'])) {
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

            // TODO: Connecter à la session
        }
    }
} else if (!empty($_POST['new_user']) && !empty($_POST['new_password'])) {
    $userName = $_POST['new_user'];
    $userPass = $_POST['new_password'];

    $query = "SELECT * FROM user WHERE identifier LIKE 'A%' AND password LIKE 'A%';";
    $prep = $pdo->query($query);
    $result = $prep->fetchAll();

    $sql = "INSERT INTO user (identifier, password) VALUES ('$userName', '$userPass')";
    $newRow = $pdo->exec($sql);

    // TODO: Connecter à la session
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

<div class="container-fluid title">
    <img src="assets/images/wildflix.png" alt="logo" class="logo img-responsive center-block" height="20%" width="20%"/>
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
                            <legend class="inscription">INSCRIPTION <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </legend>
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
?>
