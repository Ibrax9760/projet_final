<?php
require 'db_connection.php'; // Inclure le fichier de connexion PDO
session_start();

if (!isset($_SESSION['user_id'])) {
    // Vérifier si l'utilisateur est connecté
    die("Vous devez être connecté pour soumettre un article.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    // Insérer l'article dans la base de données
    $stmt = $pdo->prepare('INSERT INTO articles (user_id, title, content) VALUES (?, ?, ?)');
    $stmt->execute([$user_id, $title, $content]);

    echo "Article soumis avec succès.";
}
?>
