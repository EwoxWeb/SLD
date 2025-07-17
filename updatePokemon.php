<?php
include('lib.php');

session_start(); // Démarrer la session pour vérifier l'utilisateur connecté

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['nom_compte'])) {
    // Vérifier si l'utilisateur connecté est autorisé (vous pouvez modifier cette condition selon vos besoins)
    // Dans cet exemple, nous vérifions si le nom de compte est "Enzo/Ewox-85"
    if ($_SESSION['nom_compte'] == 'Ewox_') {
        $conn = connexion();
        $pokemon_id = $_POST['pokemon_id'];
        $methode_id = $_POST['methode'];
        $jeu_id = $_POST['jeu'];
        $compteur = $_POST['compteur'];

        // Récupération de la colonne "generation" du Pokémon
        $stmt_generation = $conn->prepare("SELECT generation FROM pkm WHERE id_pkm = :id_pkm");
        $stmt_generation->bindParam(':id_pkm', $pokemon_id);
        $stmt_generation->execute();
        $row = $stmt_generation->fetch();
        $generation = $row['generation'];

        // Mise à jour des informations dans la base de données
        $stmt = $conn->prepare("UPDATE pkm SET methode = :methode, compteur = :compteur, jeu = :jeu WHERE id_pkm = :id_pkm");
        $stmt->bindParam(':id_pkm', $pokemon_id);
        $stmt->bindParam(':compteur', $compteur);
        $stmt->bindParam(':methode', $methode_id);
        $stmt->bindParam(':jeu', $jeu_id);
        $stmt->execute();

        // Redirection vers la page 1g.php après la mise à jour
        header("Location:" .$generation."g.php");
        exit;
    } else {
        // Si l'utilisateur n'est pas autorisé, vous pouvez rediriger ou afficher un message d'erreur
        echo "Vous n'êtes pas autorisé à effectuer cette action.";
    }
} else {
    // Si la requête n'est pas POST ou si l'utilisateur n'est pas connecté, vous pouvez rediriger ou afficher un message d'erreur
    echo "Veuillez vous connecter pour effectuer cette action.";
}
?>
