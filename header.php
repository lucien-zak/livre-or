<?php
date_default_timezone_set('Europe/Paris');
require 'fonctions.php';
deconnection();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/styles.css">
    <title>Connexion</title>
</head>

<body>
    <header>
        <nav>
            <ul id="barnav">
                <?php if (estconnect() == false) { ?>
                    <li>
                        <form action="" method="post"><input type="hidden" name="conn"><input type="submit" value="Se Connecter"></form>
                    </li>
                    <li><a href="./inscription.php">Inscription</a></li>
                <?php };
                if (estconnect()) { ?>
                    <li>Bonjour <?php echo ucfirst($_SESSION['user']) ?><form action="" method="post"><input type="hidden" name="deconn"><input type="submit" value="Se Deconnecter"></form>
                    <li><a href="./index.php">Page acceuil</a></li>
                    <li><a href="./profil.php">Profil</a></li>
                    <li><a href="./commentaire.php">Ajout commentaires</a></li>
                    </li>
                <?php } ?>
                <li><a href="./livre-or.php">Livre d'or</a></li>
            </ul>
        </nav>
    </header>