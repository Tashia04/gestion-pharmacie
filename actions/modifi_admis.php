<?php
include_once '../database/connexion.php';
include_once '../database/fonctions.php';

// Gérer la modification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
  // Récupérer les données envoyées via le formulaire
  $id = intval($_POST['id_user']) ?? null;
  $nom = $_POST['nom'] ?? null;
  $prenom = $_POST['prenom'] ?? null;
  $email = $_POST['email'] ?? null;
  $id_role = intval($_POST['id_role']) ?? null;
  
  if ($id && $nom && $prenom && $email && $id_role) {
    try {
      // Appeler la fonction pour mettre à jour l'utilisateur
      $executed = updateUtilisateur($id, $nom, $prenom, $email, $id_role, $pdo);
 
      if ($executed) {
        // Afficher un message de confirmation
       
       
        echo "<script>alert('L\'utilisateur a été mis à jour avec succès')</script>";
      } else {
        echo "<script>alert('La mise à jour a échoué.');</script>";
      }
    } catch (PDOException $e) {
      echo "<script>alert('Erreur lors de la mise à jour : " . htmlspecialchars($e->getMessage()) . "');</script>";
    }
  } else {
    echo "<script>alert('Veuillez remplir tous les champs du formulaire.');</script>";
  }
}

echo "<script>window.location.href='/admis'</script>"
?>

