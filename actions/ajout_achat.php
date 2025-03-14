<?php

include_once '../database/fonctions.php';
require_once '../database/connexion.php';


// Récupération des données du formulaire
if (isset($_POST['Ajouter'])) {
  $id_fourn = htmlspecialchars(trim($_POST['id_fournisseur']));
  $date_achat = htmlspecialchars(trim($_POST['date_achat']));
  $total= htmlspecialchars(trim($_POST['total']));

  // Vérification des champs
  if (!empty($id_fourn) && !empty($date_achat) && !empty($total)) {
    try {
      $executed = addAchat($id_fourn, $date_achat,$total, $pdo);

      // Vérification du résultat
      if ($executed) {
        header('Location:/achats'); // Redirection après ajout
        exit;
      } else {
        echo "Erreur lors de l'ajout de l'achat.";
      }
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  } else {
    echo "Veuillez remplir correctement tous les champs.";
  }
} else {
  echo "Erreur lors de l'ajout de l'achat.";
}
?>