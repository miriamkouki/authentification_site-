<?php
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
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Requête pour vérifier si l'utilisateur existe
    $sql = "SELECT * FROM table_signup WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Connexion réussie
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirection vers le site biat2
        header("Location: BIAT2.html");
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

