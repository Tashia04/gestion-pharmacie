<?php
// Inclure la connexion PDO
require_once '../database/connexion.php';
require_once '../database/connexion.php';

// Vérifier si un ID est passé dans l'URL
if (isset($_GET['id_fourn'])) {
  $id = (int) $_GET['id_fourn']; // Assurez-vous que l'ID est un entier
  echo ($id);
  try {
    // Préparer et exécuter la requête de suppression
    $sql = "DELETE FROM Fournisseurs WHERE id_fourn = :id_fourn";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_fourn' => $id]);

    // Vérification du succès de la suppression
    if ($stmt->rowCount() > 0) {
      header('Location: /fournisseurs'); // Redirection après succès
      exit;
    } else {
      echo "Erreur : aucun fournisseur trouvé avec cet ID.";
    }
  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
  }
}
