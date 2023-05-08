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
    <title>Accueil</title>
</head>

<body>
    <div class="container">
        <h2>Bienvenue <?php echo $_SESSION["pseudo"] ?></h2>
        <form action="index.php" method="post">
            <input type="submit" name="logout" value="Déconnexion">
        </form>

    </div>


</body>

</html>

<?php
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: connexion.php");
}
echo $_SESSION["pseudo"] . "<br>";
echo $_SESSION["mdp"] . "<br>";
?>