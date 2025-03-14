<?php

include_once '../database/fonctions.php';
require_once '../database/connexion.php';

// Récupération des données du formulaire
if (isset($_POST['Ajouter'])) {
  $id= $_POST['id'];
  $id_fourn = htmlspecialchars(trim($_POST['Nom_Fournisseur']));
  $date_commande = htmlspecialchars(trim($_POST['Date_Commande']));
  $statut = htmlspecialchars(trim($_POST['Statut']));
  $total = htmlspecialchars(trim($_POST['Total']));

  // Vérification des champs
  if (!empty($id_fourn) && !empty($date_commande) && !empty($statut) && !empty($total)) {
    try {
      $executed = addCommande($id,$id_fourn, $date_commande, $statut, $total , $pdo);

      // Vérification du résultat
      if ($executed) {
        header('Location: /commandes'); // Redirection après ajout
        exit;
      } else {
        echo "Erreur lors de l'ajout de la commande.";
      }
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  } else {
    echo "Veuillez remplir correctement tous les champs.";
  }
}