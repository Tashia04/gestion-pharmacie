<?php
require_once '../database/connexion.php';

// Gérer la modification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
  // Récupérer les données envoyées via le formulaire
  $idCategorie = $_POST['id'] ?? null; // Correction de $_POSTT -> $_POST
  $nomCategorie = $_POST['NomCategorie'] ?? null;

  if ($idCategorie && $nomCategorie) {
    try {
      // Appeler la fonction pour mettre à jour la catégorie
      $executed = updateCategorie($idCategorie, $nomCategorie);

      if ($executed) {
        // Afficher un message de confirmation
        echo "<script>
                          alert('La catégorie a été mise à jour avec succès. Dernier NomCategorie : " . htmlspecialchars($nomCategorie) . "');
                          window.location.href = '../pages/affiche_cat.php';
                      </script>";
      } else {
        echo "<script>alert('La mise à jour a échoué.');</script>";
      }
    } catch (PDOException $e) {
      echo "<script>alert('Erreur lors de la mise à jour : " . htmlspecialchars($e->getMessage()) . "');</script>";
    }
  } else {
    echo "<script>alert('Veuillez remplir tous les champs du formulaire.');</script>";
  }
}
