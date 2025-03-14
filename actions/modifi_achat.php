<?php
require_once '../database/fonctions.php';
$host = 'localhost';
$dbname = 'inscription';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!$pdo) {
  die("Erreur de connexion à la base de données : ");
}

// var_dump($_POST);
// die();

// Gérer la modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données envoyées via le formulaire
  $idAchat = $_POST['id'] ?? null;

  $idFournisseur = $_POST['id_fournisseur'] ?? null;
  $dateAchat = $_POST['date_achat'] ?? null;
  $total = $_POST['total'] ?? null;

  if ($idAchat  && $idFournisseur && $dateAchat && $total) {
    try {
      // Appeler la fonction pour mettre à jour l'achat
      $executed = updateAchat($idAchat, $idFournisseur, $dateAchat, $total, $pdo);

      if ($executed) {
        // Afficher un message de confirmation
        echo "<script>
                          alert('L\'achat a été mis à jour avec succès.');
                          window.location.href = '/affiche_achat';
                      </script>";
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

// Fonction pour mettre à jour l'achat
function updateAchat($id, $idFournisseur, $dateAchat, $total, $pdo)
{
  $sql = "UPDATE achats SET  id_fourn = :idFournisseur, date_achat = :dateAchat, total = :total WHERE id_achat = :id";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':idFournisseur' => $idFournisseur,
    ':dateAchat' => $dateAchat,
    ':total' => $total,
    ':id' => $id
  ]);
}
