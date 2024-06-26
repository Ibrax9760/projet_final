<?php
// Paramètres de connexion
$host = 'localhost';
$dbname = 'esgi_final';
$port = '3306';
$charset = 'utf8mb4';
$username = 'ibrahim976';
$password = '';

// DSN (Data Source Name)
$dsn = "mysql:host={$host};dbname={$dbname};port={$port};charset={$charset}";

// Options PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activer les exceptions PDO
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$charset}", // Définir le charset
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Mode de récupération par défaut
];

try {
    // Connexion PDO
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Connexion établie avec succès.";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
