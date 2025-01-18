<?php
// Inclure la connexion PDO
include '../database/fonctions.php';

// Vérifier si un ID est passé dans l'URL
if (isset($_GET['id'])) {
  $id = (int) $_GET['id']; // Assurez-vous que l'ID est un entier
  echo ($id);
  try {
    // Préparer et exécuter la requête de suppression
    $sql = "DELETE FROM Medicaments WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Vérification du succès de la suppression
    if ($stmt->rowCount() > 0) {
      header('Location:/medicaments'); // Redirection après succès
      exit;
    } else {
      echo "Erreur : aucun médicament trouvé avec cet ID.";
    }
  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
  }
}
