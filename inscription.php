<?php
include("database.php");
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="style.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
    <form action="inscription.php" method="post">
        <label>Pseudo: </label>
        <input type="text" name="pseudo"><br>

        <label>Mot de passe:</label>
        <input type="password" name="mdp"><br>

        <input type="submit" name="login" value="S'inscrire"><br>
    </form>
    </div>


</body>

</html>

<?php


if (isset($_POST["login"])) {

    if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"])) {
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        $hash = password_hash($mdp, PASSWORD_DEFAULT);

        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["mdp"] = $mdp;

        $sql = "INSERT INTO users (utilisateur, mdp) VALUES ('$pseudo', '$hash')";

        try {
            mysqli_query(mysqli_connect($db_server, $db_user, $db_pass, $db_name), $sql);
            echo "L'utilisateur {$pseudo} est enregistré. <br>";
        } catch (mysqli_sql_exception) {
            echo "Erreur lors de l'insert d'utilisateur. <br>";
        }
        mysqli_close( mysqli_connect($db_server, $db_user, $db_pass, $db_name));

        header("Location: index.php");
    } else {
        echo "Il y a un soucis avec votre identifiant et/ou votre mot de passe, merci de bien vouloir réssayer.";
    }
}

?>