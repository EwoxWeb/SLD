<?php
session_start();
include('lib.php');
$conn = connexion();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>SLD</title>
</head>
<header>
    <div id="header">
        <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
        <div class="menu">
            <li><a href="1g.php">Shiny Living Dex</a></li>
            <li><a href="infoligne.php">Statistiques</a></li>
            <?php
            if (isset($_SESSION['nom_compte'])) {
                echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
            } else {
                echo '<li><a href="connexion.php">Connexion</a></li>';
            }
            ?>
        </div>
    </div>
</header>