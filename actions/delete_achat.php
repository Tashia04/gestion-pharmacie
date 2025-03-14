<?php
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

// Vérifier si un ID est passé dans l'URL
if (isset($_GET['id'])) {
  $id = (int) $_GET['id']; // Assurez-vous que l'ID est un entier

  try {
    // Préparer et exécuter la requête de suppression
    $sql = "DELETE FROM achats WHERE id_achat = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Vérification du succès de la suppression
    if ($stmt->rowCount() > 0) {
      header('Location: /achats'); // Redirection après succès
      exit;
    } else {
      echo "Erreur : aucun achat trouvé avec cet ID.";
    }
  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
  }
} else {
  echo "Erreur : aucun ID fourni.";
}
