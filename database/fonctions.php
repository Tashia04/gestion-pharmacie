<?php
function getAllCategories()
{
  global $pdo;
  $sql = "SELECT * FROM categories";
  $query = $pdo->query($sql);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Ajoute un nouveau médicament.
 */
function addMedicament($nom, $quantite, $prix, $date_expiration, $categorie_id)
{
  global $pdo;
  $sql = "INSERT INTO Medicaments (Nom, quantite, prix, date_expiration, categorie_id) 
            VALUES (:Nom, :Quantite, :Prix, :Date_expiration, :categorie_id)";
  $stmt = $pdo->prepare($sql);

  return $stmt->execute([
    ':Nom' => $nom,
    ':Quantite' => $quantite,
    ':Prix' => $prix,
    ':Date_expiration' => $date_expiration,
    ':categorie_id' => $categorie_id
  ]);
}

/**
 * Met à jour un médicament existant.
 */
function updateMedicament($id, $nom, $quantite, $prix, $date_expiration, $categorie_id)
{
  global $pdo;
  $sql = "UPDATE Medicaments 
            SET Nom = :Nom, quantite = :Quantite, prix = :Prix, date_expiration = :Date_expiration, categorie_id = :categorie_id 
            WHERE id = :id";
  $stmt = $pdo->prepare($sql);

  return $stmt->execute([
    ':id' => $id,
    ':Nom' => $nom,
    ':Quantite' => $quantite,
    ':Prix' => $prix,
    ':Date_expiration' => $date_expiration,
    ':categorie_id' => $categorie_id
  ]);
}

/**
 * Ajoute une nouvelle catégorie.
 */
function addCategorie($NomCategorie)
{
  global $pdo;
  $sql = "INSERT INTO categories (NomCategorie) VALUES (:NomCategorie)";
  $stmt = $pdo->prepare($sql);

  return $stmt->execute([
    ':NomCategorie' => $NomCategorie
  ]);
}

/**
 * Met à jour une catégorie existante.
 */
function updateCategorie($id, $NomCategorie)
{
  global $pdo;
  $sql = "UPDATE categories SET NomCategorie = :NomCategorie WHERE id = :id";
  $stmt = $pdo->prepare($sql);

  return
    $stmt->execute([
      'id' => $id,
      'NomCategorie' => $NomCategorie
    ]);
}

/**
 * Récupère le dernier nom de catégorie ajouté.
 */
function dernierNomCategorie()
{
  global $pdo;
  $sql = "SELECT NomCategorie FROM categories ORDER BY id DESC LIMIT 1";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['NomCategorie'] ?? null;
}

/**
 * Récupère les informations d'un médicament par son ID.
 */
function getCategorieById($id)
{
  global $pdo;
  $sql = "SELECT * FROM categories WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':id' => $id]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addFournisseur($nom, $adresse, $telephone, $email, $produits_fournis)
{
  global $pdo;
  $sql = "INSERT INTO fournisseurs (nom, adresse, telephone, email, produits_fournis) VALUES (:nom, :adresse, :telephone, :email, :produits_fournis)";

  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':nom' => $nom,
    ':adresse' => $adresse,
    ':telephone' => $telephone,
    ':email' => $email,
    ':produits_fournis' => $produits_fournis
  ]);
}

function updateFournisseur($id, $nom, $adresse, $telephone, $email, $produits_fournis)
{
  global $pdo;
  $sql = "UPDATE fournisseurs SET nom = :nom, adresse = :adresse, telephone = :telephone, email = :email, produits_fournis = :produits_fournis WHERE id_fourn = :id";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':id' => $id,
    ':nom' => $nom,
    ':adresse' => $adresse,
    ':telephone' => $telephone,
    ':email' => $email,
    ':produits_fournis' => $produits_fournis
  ]);
}

function getAllventes()
{
  global $pdo;

  $sql = "SELECT * FROM vente";
  return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);;
}

function countTodaySales()
{
  global $pdo;
  $sql = "SELECT COUNT(*) as count FROM vente WHERE DATE(dateVente) = CURDATE()";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}

function countYesterdaySales()
{
  global $pdo;
  $sql = "SELECT COUNT(*) as count FROM vente WHERE DATE(dateVente) = CURDATE() - INTERVAL 1 DAY";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}

function countItems($table)
{
  global $pdo;
  $sql = "SELECT COUNT(*) as count FROM $table";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}


function countExpiredProducts()
{
  global $pdo;
  $sql = "SELECT COUNT(*) as count FROM medicaments WHERE date_expiration < NOW()";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}

function countDailySales()
{
  global $pdo;
  $sql = "SELECT COUNT(*) as count FROM vente WHERE DATE(dateVente) = CURDATE()";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}
