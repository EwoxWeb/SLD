<?php
include('header.php');
if(isset($_GET['id'])) {
    $pokemon_id = $_GET['id'];
    $pokemon_info = $conn->query("SELECT * FROM pkm WHERE id_pkm = $pokemon_id")->fetch();
    $pokemon_nom = $pokemon_info['nom_pkm'];
    $methode_id = $pokemon_info['methode'];
    $jeu_id = $pokemon_info['jeu'];
    $compteur = $pokemon_info['compteur'];
?>
<body>
    <div class="editShiny">
        <h1>Modifier <?php echo $pokemon_nom; ?> Shiny</h1>
        <form action="updatePokemon.php" method="post">
            <input type="hidden" name="pokemon_id" value="<?php echo $pokemon_id; ?>">
            <div class="form-group">
                <label for="methode">Méthode</label>
                <select name="methode" id="methode">
                    <?php
                    $methodes = $conn->query("SELECT * FROM methode order by nom_methode");
                    while ($methode = $methodes->fetch()) {
                        if ($methode['id_methode'] == $methode_id) {
                            echo '<option value="' . $methode['id_methode'] . '" selected>' . $methode['nom_methode'] . '</option>';
                        } else {
                            echo '<option value="' . $methode['id_methode'] . '">' . $methode['nom_methode'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="compteur">Compteur</label>
                <input type="number" name="compteur" id="compteur" value="<?php echo $compteur; ?>">
            </div>
            <div class="form-group">
                <label for="jeu">Jeu</label>
                <select name="jeu" id="jeu">
                    <?php
                    $jeux = $conn->query("SELECT * FROM jeux order by id_jeu");
                    while ($jeu = $jeux->fetch()) {
                        if ($jeu['id_jeu'] == $jeu_id) {
                            echo '<option value="' . $jeu['id_jeu'] . '" selected>' . $jeu['nom_jeu'] . '</option>';
                        } else {
                            echo '<option value="' . $jeu['id_jeu'] . '">' . $jeu['nom_jeu'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enregistrer">
            </div>
        </form>
    </div>
</body>
<?php
} else {
    echo "Erreur : Aucun identifiant de Pokémon spécifié.";
}
include('footer.php');
?>
