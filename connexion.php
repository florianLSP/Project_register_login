<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h2>Se connecter</h2>
        <form action="connexion.php" method="post">
            <label>Pseudo: </label>
            <input type="text" name="pseudo"><br>

            <label>Mot de passe:</label>
            <input type="password" name="mdp"><br>

            <a href="inscription.php">Créer un compte</a><br>

            <input type="submit" name="login" value="Se connecter"><br>


        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST["login"])) {

    if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"])) {

        $_SESSION["pseudo"] = $_POST["pseudo"];
        $_SESSION["mdp"] = $_POST["mdp"];

        header("Location: index.php");

        echo $_SESSION["pseudo"] . "<br>";
        echo $_SESSION["mdp"] . "<br>";
    } else {
        echo "Il y a un soucis avec votre identifiant et/ou votre mot de passe, merci de bien vouloir réssayer.";
    }
}
?>