<?php
// Inclure la connexion à la base de données
session_start();

// Connexion à la base de données (remplacez avec vos informations)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "authentification";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hacher le mot de passe avant de le stocker dans la base de données pour plus de sécurité

    // Préparer et exécuter la requête d'insertion
    $sql = "INSERT INTO table_signup (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Inscription réussie !";
        // Rediriger vers la page de connexion
        header("Location: BIAT2.html");
    } else {
        echo "Erreur : " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>
