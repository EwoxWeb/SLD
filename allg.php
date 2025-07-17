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
    <link rel="shortcut icon" href="Images/logo en haut à gauche.png" type="image/x-icon" /> 
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
<body>
    <?php
    $pkm = $conn->query("SELECT * FROM pkm order by id_pkm");
    ?>
    <?php include('navGeneration.php') ?> 
    <center><table class="SLD">
        <?php
        $td_count = 0;
        while ($row = $pkm->fetch()) {
            $path = 'images/Shiny/' . $row['img'];
            $pokemonClass = $row['obtenue'] == 1 ? 'pokemon-container red-column' : 'pokemon-container';
            if ($td_count % 9 == 0) {
                echo "<tr>";
            }
        ?>
            <td>
                <div class="<?php echo $pokemonClass; ?>" onclick="toggleObtenue(<?php echo $row['id_pkm']; ?>)">
                    <center><img src="<?php echo $path; ?>" alt="Image" width="100" height="100"></center>
                    <p class="pokemon-name"><?php echo $row['nom_pkm'] . "&nbsp #" . $row['numero']; ?></p>
                </div>
                <?php 
                    $methode = $conn->query("SELECT nom_methode FROM methode WHERE id_methode =" . $row['methode'])->fetch();
                    $jeu = $conn->query("SELECT nom_jeu FROM jeux WHERE id_jeu =" . $row['jeu'])->fetch(); 
                ?>
                <div class="info">
                    <b><?php echo $methode['nom_methode']; ?></b> <br/>en <b><?php echo $row['compteur'] ?></b> <br/>sur <b><?php echo $jeu['nom_jeu'];?></b><?php
                    if (isset($_SESSION['nom_compte'])) {
                        if ($_SESSION['nom_compte'] == 'Ewox_') {
                    ?>
                    <a href="editShiny.php?id=<?php echo $row['id_pkm']; ?>"><i class="fas fa-pencil-alt" style="text-align:right; color: white;"></i></a>
                    <?php } }?>
                </div>
            </td>
        <?php
            $td_count++;
            if ($td_count % 9 == 0) {
                echo "</tr>";
            }
        }
        ?>
    </table></center>
    <?php include('footer.php'); ?>
</body>
</html>
<script>
    function toggleObtenue(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_obtenue_all.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Réponse reçue du serveur, vous pouvez mettre à jour l'interface utilisateur si nécessaire
            location.reload(); // Recharge la page pour afficher les mises à jour
        }
    };
    xhr.send("id_pkm=" + id);
}

function editInfo(pkmId, methodName, counter) {
    alert("Modifier les informations pour le Pokémon avec l'ID: " + pkmId + "\nMéthode: " + methodName + "\nCompteur: " + counter);
}

</script>