<?php

include_once '../database/fonctions.php';
require_once '../database/connexion.php';


// Récupération des données du formulaire
if (isset($_POST['Ajouter'])) {
  $nom = htmlspecialchars(trim($_POST['Nom']));
  $quantite = isset($_POST['Quantite']) ? (int)$_POST['Quantite'] : 0;
  $prix = isset($_POST['Prix']) ? (float)$_POST['Prix'] : 0.0;
  $date_expiration = $_POST['Date_Expiration'] ?? '';
  $Nomcategorie = htmlspecialchars(trim($_POST['Categorie']));

  // Vérification des champs
  if (!empty($nom) && $quantite > 0 && $prix > 0 && !empty($date_expiration) && !empty($Nomcategorie)) {
    try {

      $executed = addMedicament($nom, $quantite, $prix, $date_expiration, $Nomcategorie, $pdo);


      // Vérification du résultat
      if ($executed) {
        header('Location: /medicaments'); // Redirection après ajout
        exit;
      } else {
        echo "Erreur lors de l'ajout du médicament.";
      }
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  } else {
    echo "Veuillez remplir correctement tous les champs.";
  }
  


}
