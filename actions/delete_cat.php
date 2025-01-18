<?php
// Inclure la connexion PDO
require_once '../database/connexion.php';

// Vérifier si un ID est passé dans l'URL
if (isset($_GET['id'])) {
  $id = (int) $_GET['id']; // Assurez-vous que l'ID est un entier

  try {
    // Préparer et exécuter la requête de suppression
    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Vérification du succès de la suppression
    if ($stmt->rowCount() > 0) {
      header('Location: /categories'); // Redirection après succès
      exit;
    } else {
      echo "Erreur : aucune catégorie trouvée avec cet ID.";
    }
  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
  }
} else {
  echo "Erreur : aucun ID fourni.";
}
?>
