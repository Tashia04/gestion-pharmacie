<?php
include_once '../database/connexion.php';
include_once '../database/fonctions.php';

// Gérer la modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données envoyées via le formulaire
  $id = $_POST['id'] ?? null;
  $id_fourn = $_POST['id_fourn'] ?? null;
  $statut = $_POST['statut'] ?? null;
  $total = $_POST['total'] ?? null;

  if ($idCommande && $idFournisseur && $statut && $total) {
    try {
      // Appeler la fonction pour mettre à jour la commande
      $executed = updateCommande($id, $idFournisseur, $statut, $total, $pdo);

      if ($executed) {
        // Afficher un message de confirmation
        echo "<script>alert('La commande a été mise à jour avec succès');</script>";
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
echo "<script>
  window.onload = function() {
    window.location.href = '/commandes';
  }
</script>";
?>
