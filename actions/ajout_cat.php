<?php

include_once '../database/fonctions.php';


// Récupération des données du formulaire
if (isset($_POST['Ajouter'])) {
  $nom = htmlspecialchars(trim($_POST['Nom']));
  

  // Vérification des champs
  if (!empty($nom) ) {
    try {

      $executed = addcategorie($nom, );


      // Vérification du résultat
      if ($executed) {
        header('Location:./pages/affiche_cat.php'); // Redirection après ajout
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
