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
  $idStock = $_POST['id'] ?? null;
  $description = $_POST['description'] ?? null;
  $categorie = $_POST['categorie'] ?? null;
  $nom_medicament = $_POST['nom_medicament'] ?? null;
  $quantite_disponible = $_POST['quantite_disponible'] ?? null;
  $prix_unitaire = $_POST['prix_unitaire'] ?? null;
  $date_expiration = $_POST['date_expiration'] ?? null;
  $id_fourn = $_POST['id_fourn'] ?? null;

  if ($idStock && $description && $categorie && $nom_medicament && $quantite_disponible && $prix_unitaire && $date_expiration && $id_fourn) {
    try {
      // Appeler la fonction pour mettre à jour le stock
      $executed = updateStock($idStock, $description, $categorie, $nom_medicament, $quantite_disponible, $prix_unitaire, $date_expiration, $id_fourn, $pdo);

      if ($executed) {
        // Afficher un message de confirmation
        echo "<script>
                          alert('Le stock a été mis à jour avec succès.');
                          window.location.href = '/stock';
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

// Fonction pour mettre à jour le stock
function updateStock($id, $description, $categorie, $nom_medicament, $quantite_disponible, $prix_unitaire, $date_expiration, $id_fourn, $pdo)
{
  $sql = "UPDATE stock SET description = :description, categorie = :categorie, nom_medicament = :nom_medicament, quantite_disponible = :quantite_disponible, prix_unitaire = :prix_unitaire, date_expiration = :date_expiration, id_fourn = :id_fourn WHERE id_stock = :id";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':description' => $description,
    ':categorie' => $categorie,
    ':nom_medicament' => $nom_medicament,
    ':quantite_disponible' => $quantite_disponible,
    ':prix_unitaire' => $prix_unitaire,
    ':date_expiration' => $date_expiration,
    ':id_fourn' => $id_fourn,
    ':id' => $id
  ]);
}
?>