<?php
$host = 'localhost';
$db   = 'terps_only';
$user = 'terpsonly';
$pass = ''; // À adapter avec le mot de passe réel
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
  die("Erreur de connexion : " . $e->getMessage());
}
?>