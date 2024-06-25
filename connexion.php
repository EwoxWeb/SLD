<?php
include('header.php');

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données saisies par l'utilisateur
    $nom_compte = $_POST['nom_compte'];
    $mdp = $_POST['mdp'];
    
    // Hachez le mot de passe entré par l'utilisateur
    $mdp_hash = hashPassword($mdp);
    
    // Vérification des informations de connexion dans la base de données
    $conn = connexion();
    $stmt = $conn->prepare("SELECT * FROM compte WHERE nom_compte = :nom_compte AND mdp = :mdp");
    $stmt->bindParam(':nom_compte', $nom_compte);
    $stmt->bindParam(':mdp', $mdp_hash); // Utilisez le mot de passe hashé
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Si les informations de connexion sont valides, créer une session et rediriger l'utilisateur
    if ($row) {
        session_start();
        $_SESSION['nom_compte'] = $nom_compte;
        header("Location: index.php");
        exit();
    } else {
        // Si les informations de connexion sont invalides, afficher un message d'erreur
        echo "<p>Identifiants incorrects. Veuillez réessayer.</p>";
    }
}
?>

<body>
    <div class="container">
        <h2>Connexion</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label>Nom de compte:</label>
                <input type="text" name="nom_compte" class="form-control">
            </div>
            <div class="form-group">
                <label>Mot de passe:</label>
                <input type="password" name="mdp" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Se connecter">
            </div>
        </form>
    </div>
</body><br><br><br><br><br><br><br><br><br>

<?php include('footer.php'); ?>
