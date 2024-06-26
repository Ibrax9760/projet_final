<?php
require 'db_connection.php'; // Inclure le fichier de connexion PDO

 // session_start(); // Démarrer la session pour gérer l'état de connexion de l'utilisateur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe dans la base de données
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Authentification réussie, démarrer la session
        $_SESSION['user_id'] = $user['id'];
        header('Location: article_page.php'); // Rediriger vers une page sécurisée après connexion
        exit();
    } else {
        // Authentification échouée
        echo "Adresse e-mail ou mot de passe incorrect.";
    }
}
?>
