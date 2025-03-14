<?php

include_once '../database/fonctions.php';


// Récupération des données du formulaire
if (isset($_POST['Ajouter'])) {
  $id= $_POST['id'];
  $description = $_POST['description'];
  $categorie = $_POST['categorie'];
  $nom_medicament = $_POST['nom_medicament'];
  $prix_unitaire = $_POST['prix_unitaire'];
  $date_expiration = $_POST['date_expiration'];
  $id_fourn = $_POST['id_fourn'];


  // Vérification des champs
  if (!empty($description) && !empty($categorie) && !empty($nom_medicament) && !empty($prix_unitaire) && !empty($date_expiration) && !empty($id_fourn)) {
    try {
      $executed = addStock( $description, $categorie, $nom_medicament, $prix_unitaire, $date_expiration, $id_fourn,$pdo); // Ajout du stock

      // Vérification du résultat
      if ($executed) {
        header('Location:/stock'); // Redirection après ajout
        exit;
      } else {
        echo "Erreur lors de l'ajout du stock.";
      }
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  } else {
    echo "Veuillez remplir correctement tous les champs.";
  }
}