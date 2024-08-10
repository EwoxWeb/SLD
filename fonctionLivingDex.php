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
                <?php $methode = $conn->query("SELECT nom_methode FROM methode WHERE id_methode =" . $row['methode'])->fetch(); ?>
                <div class="info">
                    <?php echo $methode['nom_methode']; ?> <br/>En <?php echo $row['compteur'];
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