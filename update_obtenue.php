<?php
include('lib.php');

session_start(); // Démarrer la session pour vérifier l'utilisateur connecté

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['nom_compte'])) {
    // Vérifier si l'utilisateur connecté est "Enzo/Ewox-85"
    if ($_SESSION['nom_compte'] == 'Ewox_') {
        $conn = connexion();
        $id = $_POST['id_pkm'];

        // Récupération de la valeur actuelle de la colonne "obtenue"
        $stmt = $conn->prepare("SELECT obtenue FROM pkm WHERE id_pkm = :id_pkm");
        $stmt->bindParam(':id_pkm', $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $obtenue = $row['obtenue'];

        // Inversion de la valeur de la colonne "obtenue"
        $newObtenue = $obtenue == 1 ? 0 : 1;

        // Mise à jour de la colonne "obtenue"
        $stmt = $conn->prepare("UPDATE pkm SET obtenue = :obtenue WHERE id_pkm = :id_pkm");
        $stmt->bindParam(':obtenue', $newObtenue);
        $stmt->bindParam(':id_pkm', $id);
        $stmt->execute();
    } else {
        // Si l'utilisateur n'est pas autorisé, vous pouvez rediriger ou afficher un message d'erreur
        echo "Vous n'êtes pas autorisé à effectuer cette action.";
    }
} else {
    // Si la requête n'est pas POST ou si l'utilisateur n'est pas connecté, vous pouvez rediriger ou afficher un message d'erreur
    echo "Veuillez vous connecter pour effectuer cette action.";
}
?>
