<?php

function connexion() {
    $host = 'localhost'; 
    $dbname = 'sld';
    $username = 'root';
    $password = '';
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
        die();
    }
}

function hashPassword($password) {
    return hash('sha256', $password);
}

?>
