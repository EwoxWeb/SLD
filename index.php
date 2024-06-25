<?php include('header.php'); ?>
<body>
    <div class="accueil">
        <div class="info_SLD">
            <center><img class="logo" src="images/logo.png"></center>
            <h2>Définition</h2>
            <p>
                Un "Shiny Living Dex" est une collection complète de tous les Pokémon disponibles dans le jeu,
                mais avec une particularité : chaque Pokémon dans cette collection est un Pokémon chromatique.
                Cela signifie que chaque espèce de Pokémon est représentée par un spécimen avec une couleur différente.
            </p>
            <h2 style="margin-top: 1em;">Comparaison</h2>
            <div class="comparaisonShiny">
                <div>
                    <img src="images/Shiny/bulbizarre.png" width="280" height="280">
                    <p style="text-align: center;">Shiny</p>
                </div>
                <div>
                    <img src="images/bulbizarre.png" width="280" height="280">
                    <p style="text-align: center;">Non Shiny</p>
                </div>
            </div>
        </div>
        <div>
            <div class="info_avancement">
                <center><h3>Avancement De Mon</h3>
                <h1 style="margin-top: -0.5em;">Shiny Living Dex</h1></center>
                <?php
                $totalPKM1G = $conn->query("SELECT COUNT(*) AS total1G FROM pkm WHERE generation=1")->fetch();
                $totalPKM2G = $conn->query("SELECT COUNT(*) AS total2G FROM pkm WHERE generation=2")->fetch();
                $totalPKM3G = $conn->query("SELECT COUNT(*) AS total3G FROM pkm WHERE generation=3")->fetch();
                $totalPKM4G = $conn->query("SELECT COUNT(*) AS total4G FROM pkm WHERE generation=4")->fetch();
                $totalPKM5G = $conn->query("SELECT COUNT(*) AS total5G FROM pkm WHERE generation=5")->fetch();
                $totalPKM6G = $conn->query("SELECT COUNT(*) AS total6G FROM pkm WHERE generation=6")->fetch();
                $totalPKM7G = $conn->query("SELECT COUNT(*) AS total7G FROM pkm WHERE generation=7")->fetch();
                $totalPKM8G = $conn->query("SELECT COUNT(*) AS total8G FROM pkm WHERE generation=8")->fetch();
                $totalPKM9G = $conn->query("SELECT COUNT(*) AS total9G FROM pkm WHERE generation=9")->fetch();
                $totalPKMForme = $conn->query("SELECT COUNT(*) AS totalForme FROM pkm WHERE generation=0")->fetch();
                $totalPKM = $conn->query("SELECT COUNT(*) AS total FROM pkm")->fetch();
                $totalPKMObtenue1G = $conn->query("SELECT COUNT(*) AS totalObtenue1G FROM pkm WHERE obtenue =1 AND generation=1")->fetch();
                $totalPKMObtenue2G = $conn->query("SELECT COUNT(*) AS totalObtenue2G FROM pkm WHERE obtenue =1 AND generation=2")->fetch();
                $totalPKMObtenue3G = $conn->query("SELECT COUNT(*) AS totalObtenue3G FROM pkm WHERE obtenue =1 AND generation=3")->fetch();
                $totalPKMObtenue4G = $conn->query("SELECT COUNT(*) AS totalObtenue4G FROM pkm WHERE obtenue =1 AND generation=4")->fetch();
                $totalPKMObtenue5G = $conn->query("SELECT COUNT(*) AS totalObtenue5G FROM pkm WHERE obtenue =1 AND generation=5")->fetch();
                $totalPKMObtenue6G = $conn->query("SELECT COUNT(*) AS totalObtenue6G FROM pkm WHERE obtenue =1 AND generation=6")->fetch();
                $totalPKMObtenue7G = $conn->query("SELECT COUNT(*) AS totalObtenue7G FROM pkm WHERE obtenue =1 AND generation=7")->fetch();
                $totalPKMObtenue8G = $conn->query("SELECT COUNT(*) AS totalObtenue8G FROM pkm WHERE obtenue =1 AND generation=8")->fetch();
                $totalPKMObtenue9G = $conn->query("SELECT COUNT(*) AS totalObtenue9G FROM pkm WHERE obtenue =1 AND generation=9")->fetch();
                $totalPKMObtenueForme = $conn->query("SELECT COUNT(*) AS totalObtenueForme FROM pkm WHERE obtenue =1 AND generation=0")->fetch();
                $totalPKMObtenue = $conn->query("SELECT COUNT(*) AS totalObtenue FROM pkm WHERE obtenue =1")->fetch();
                ?>
                <p>Première génération : <?php echo $totalPKMObtenue1G['totalObtenue1G'] ?> / <?php echo $totalPKM1G['total1G'] ?></p>
                <p>Deuxième génération : <?php echo $totalPKMObtenue2G['totalObtenue2G'] ?> / <?php echo $totalPKM2G['total2G'] ?></p>
                <p>Troisème génération : <?php echo $totalPKMObtenue3G['totalObtenue3G'] ?> / <?php echo $totalPKM3G['total3G'] ?></p>
                <p>Quatrième génération : <?php echo $totalPKMObtenue4G['totalObtenue4G'] ?> / <?php echo $totalPKM4G['total4G'] ?></p>
                <p>Cinquième génération : <?php echo $totalPKMObtenue5G['totalObtenue5G'] ?> / <?php echo $totalPKM5G['total5G'] ?></p>
                <p>Sixième génération : <?php echo $totalPKMObtenue6G['totalObtenue6G'] ?> / <?php echo $totalPKM6G['total6G'] ?></p>
                <p>Septième génération : <?php echo $totalPKMObtenue7G['totalObtenue7G'] ?> / <?php echo $totalPKM7G['total7G'] ?></p>
                <p>Huitième génération : <?php echo $totalPKMObtenue8G['totalObtenue8G'] ?> / <?php echo $totalPKM8G['total8G'] ?></p>
                <p>Neufième génération : <?php echo $totalPKMObtenue9G['totalObtenue9G'] ?> / <?php echo $totalPKM9G['total9G'] ?></p>
                <p>Formes : <?php echo $totalPKMObtenueForme['totalObtenueForme'] ?> / <?php echo $totalPKMForme['totalForme'] ?></p>
                <h3>Toutes générations : <?php echo $totalPKMObtenue['totalObtenue'] ?> / <?php echo $totalPKM['total'] ?></h3>
            </div>
            <br>
            <div class="info_reseaux">
                <center><h1>Réseaux</h1>
                <a href="https://www.twitch.tv/ewox__"><img src="images/logotwitch.png"  width="100" height="100"></a></center>
            </div>
        </div>
    </div>
</body>
<?php include('footer.php'); ?>

