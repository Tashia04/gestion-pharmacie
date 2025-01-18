<?php
include_once 'fonctions.php';



// Gérer la modification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
  var_dump($_POST);
  $id = $_POST['id'];
  $nom = $_POST['Nom'];
  $quantite = $_POST['Quantite'];
  $prix = $_POST['Prix'];
  $date_expiration = $_POST['Date_Expiration'];
  $categorie = $_POST['Categorie'];

  try {
    $executed = updateMedicament($id, $nom, $quantite, $prix, $date_expiration, $categorie);

    if ($executed) {
      echo "<script>alert('Le médicament a été mis à jour avec succès.');window.location.href='../pages/affiche_Med.php';</script>";
    }
  } catch (PDOException $e) {
    echo "Erreur lors de la mise à jour : " . $e->getMessage();
  }
}
