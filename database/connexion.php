<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'inscription';
$username = 'root';
$password = '';

$pdo = null;  // Initialisation de la connexion PDO
$Medicaments = [];
$users = [];
$Categories = [];
$fournisseurs = [];
$achats = [];


$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!$pdo) {
  die("Erreur de connexion à la base de données : ");
}

// Récupération des médicaments avec catégories
try {
  $sql = "SELECT m.id, m.Nom, m.quantite, m.prix, m.date_expiration, c.NomCategorie 
            FROM Medicaments m 
            INNER JOIN categories c ON m.categorie_id = c.id";
  $stmt = $pdo->query($sql);
  $Medicaments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Erreur lors de la récupération des médicaments : " . $e->getMessage();
}

// Récupération des utilisateurs et rôles
try {
  $sql = "SELECT u.id_user, u.nom, u.prenom, u.email, r.nom_role ,r.id_role
            FROM users u 
            INNER JOIN roles r ON u.id_role = r.id_role";
  $stmt = $pdo->query($sql);
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Erreur lors de la récupération des utilisateurs : " . $e->getMessage();
}

// Récupération des catégories
try {
  $stmt = $pdo->query("SELECT * FROM categories");
  $Categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Erreur lors de la récupération des catégories : " . $e->getMessage();
}

// Récupération des fournisseurs
try {
  $stmt = $pdo->query("SELECT * FROM fournisseurs");
  $fournisseurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Erreur lors de la récupération des fournisseurs : " . $e->getMessage();
}

// Récupération des achats
try {
  $stmt = $pdo->query("SELECT * FROM achats");
  $achats = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Erreur lors de la récupération des achats : " . $e->getMessage();
}

// Recupere les stocks
$stocks = [];
try {
  $sql = "SELECT s.id, s.nom_medicament, s.description, s.categorie, s.quantite_disponible, s.prix_unitaire, s.date_expiration, f.nom
            FROM stock s 
            INNER JOIN fournisseurs f ON s.id_fourn = f.id_fourn";
  $stmt = $pdo->query($sql);
  $stocks = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  echo "Erreur lors de la récupération des stocks : " . $e->getMessage();
}
//recuperer les ventes
$ventes = [];
try {
  $sql = "SELECT idvente, montant, datevente FROM vente";
  $stmt = $pdo->query($sql);
  $ventes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Erreur lors de la récupération des ventes : " . $e->getMessage();
}

// Récupération les commandes
$commandes = [];
try {
  $sql = "SELECT c.id, c.date_commande, c.statut, c.total, f.nom AS Nom_fournisseur
            FROM commandes c 
            INNER JOIN fournisseurs f ON c.id_fourn = f.id_fourn";
  $stmt = $pdo->query($sql);
  $commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Erreur lors de la récupération des commandes : " . $e->getMessage();
}

