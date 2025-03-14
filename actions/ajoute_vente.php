<?php

include_once '../database/fonctions.php';
require_once '../database/connexion.php';

// Récupération des données du formulaire
if (isset($_POST['Ajouter'])) {
  
  $montant = htmlspecialchars(trim($_POST['montant']));
  $dateVente = htmlspecialchars(trim($_POST['dateVente']));
  // var_dump($_POST);
  
  // Vérification des champs
  if (!empty($montant) && !empty($dateVente)) {
    try {
      $executed = addVent($montant, $dateVente, $pdo, $additionalArgument);

      // Vérification du résultat
      if ($executed) {
        header('Location: /ventes'); // Redirection après ajout
        exit;
      } else {

        echo "Erreur lors de l'ajout de la vente.";
      }
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  } else {
    echo "Veuillez remplir correctement tous les champs.";
  }
} else {
  echo "Erreur lors de l'ajout de la vente.";
}