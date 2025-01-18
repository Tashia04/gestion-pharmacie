<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'inscription';
$username = 'root';
$password = '';

try {
  // Initialisation de la connexion PDO
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Récupération des données de la table Medicaments
  $sql = "SELECT m.id, m.Nom, m.quantite, m.prix, m.date_expiration, c.NomCategorie FROM Medicaments m INNER JOIN categories c ON m.categorie_id = c.id";

  $query = $pdo->query("SELECT * FROM categories");
  $Categories = $query->fetchAll(PDO::FETCH_ASSOC);

  $query = $pdo->query($sql);
  $Medicaments = $query->fetchAll(PDO::FETCH_ASSOC);

  // recuperer les fournisseurs
  $query = "SELECT * FROM fournisseurs";
  $stmt = $pdo->query($query);
  $fournisseurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Erreur lors de la connexion ou de la récupération des données : " . $e->getMessage());
  $fournisseurs = [];
}

// Maintenant, $Medicaments contient toutes les données de la table.
