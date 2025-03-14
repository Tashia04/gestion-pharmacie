<?php
// Inclure la connexion PDO
include_once '../database/fonctions.php';
$host = 'localhost';
$dbname = 'inscription';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!$pdo) {
  die("Erreur de connexion à la base de données : ");
}


if (isset($_GET['id'])) {
  $id = (int) $_GET['id']; // Assurez-vous que l'ID est un entier
  echo ($id);
  try {
    // Préparer et exécuter la requête de suppression
    $sql = "DELETE FROM users WHERE id_user = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Vérification du succès de la suppression
    if ($stmt->rowCount() > 0) {
      header('Location:/admis'); // Redirection après succès
      exit;
    } else {
      echo "Erreur : aucun admis trouvé avec cet ID.";
    }
  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
  }
} else {
  echo "Erreur : aucun ID fourni.";
}
