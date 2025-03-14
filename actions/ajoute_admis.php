<?php

include_once '../database/fonctions.php';
require_once '../database/connexion.php';

// Récupération des données du formulaire
if (isset($_POST['Ajouter'])) {
  $nom = htmlspecialchars(trim($_POST['nom']));
  $prenom = htmlspecialchars(trim($_POST['prenom']));
  $email = htmlspecialchars(trim($_POST['email']));
  $nom_role = htmlspecialchars(trim($_POST['nom_role']));

  // Vérification des champs
  if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($nom_role)) {
    try {
      $executed = addUtilisateur($nom, $prenom, $email, $nom_role, $pdo);

      // Vérification du résultat
      if ($executed) {
        header('Location: /admis'); // Redirection après ajout
        exit;
      } else {
        echo "Erreur lors de l'ajout de l'utilisateur.";
      }
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  } else {
    echo "Veuillez remplir correctement tous les champs.";
  }
}
echo "Erreur lors de l'ajout de l'utilisateur.";