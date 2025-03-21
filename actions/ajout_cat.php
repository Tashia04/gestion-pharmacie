<?php

include_once '../database/fonctions.php';
require_once '../database/connexion.php';


// Récupération des données du formulaire
if (isset($_POST['Ajouter'])) {
  $nom = htmlspecialchars(trim($_POST['nom']));
  // Vérification des champs
  if (!empty($nom)) {
    try {

      $executed = addcategorie($nom, $pdo);

      // Vérification du résultat
      if ($executed) {
        header('Location: /categories'); // Redirection après ajout
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
echo "Erreur lors de l'ajout de la catégorie.";
