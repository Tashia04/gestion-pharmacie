<?php

include_once '../database/fonctions.php';
require_once '../database/connexion.php';



// Récupération des données du formulaire
if (isset($_POST['Ajouter'])) {
  $nom = htmlspecialchars(trim($_POST['nom']));
  $adresse = htmlspecialchars(trim($_POST['adresse']));
  $telephone = htmlspecialchars(trim($_POST['telephone']));
  $email = htmlspecialchars(trim($_POST['email']));
  $produits_fournis = htmlspecialchars(trim($_POST['produits_fournis']));
  
  

  // Vérification des champs
  if (!empty($nom) && !empty($adresse) && !empty($telephone) && !empty($email) && !empty($produits_fournis)) {
    try {

      $executed = addFournisseur($nom, $adresse, $telephone, $email, $produits_fournis, $pdo);


      // Vérification du résultat
      if ($executed) {
        header('Location:/fournisseurs'); // Redirection après ajout
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
