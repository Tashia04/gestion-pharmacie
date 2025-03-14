<?php

function getAllCategories($pdo)
{


  $sql = "SELECT * FROM categories";
  $query = $pdo->query($sql);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Ajoute un nouveau médicament.
 */
function addMedicament($nom, $quantite, $prix, $date_expiration, $categorie_id, $pdo)
{
  // Vérifie que la connexion PDO existe
  if (!$pdo) {
    die("Erreur : Connexion à la base de données non établie.");
  }

  $sql = "INSERT INTO Medicaments (Nom, quantite, prix, date_expiration, categorie_id) 
            VALUES (:Nom, :Quantite, :Prix, :Date_expiration, :categorie_id)";

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':Nom' => $nom,
      ':Quantite' => $quantite,
      ':Prix' => $prix,
      ':Date_expiration' => $date_expiration,
      ':categorie_id' => $categorie_id
    ]);
    return true;  // Succès
  } catch (PDOException $e) {
    die("Erreur lors de l'ajout du médicament : " . $e->getMessage($pdo));
  }
}


/**
 * Met à jour un médicament existant.
 */
function updateMedicament($id, $nom, $quantite, $prix, $date_expiration, $categorie_id, $pdo)
{

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
function addCategorie($NomCategorie, $pdo)
{
  try {
    $sql = "INSERT INTO categories (NomCategorie) VALUES (:NomCategorie)";
    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
      ':NomCategorie' => $NomCategorie
    ]);
  } catch (PDOException $e) {
    // Log the error message or handle it as needed
    var_dump("Erreur lors de l'ajout de la catégorie : " . $e->getMessage());
    return false;
  }
}

/**
 * Met à jour une catégorie existante.
 */
function updateCategorie($idCategorie, $NomCategorie, $pdo)
{

  $sql = "UPDATE categories SET NomCategorie = :NomCategorie WHERE id = :id";
  $stmt = $pdo->prepare($sql);

  return
    $stmt->execute([
      'id' => $idCategorie,
      'NomCategorie' => $NomCategorie
    ]);
}

/**
 * Récupère le dernier nom de catégorie ajouté.
 */
function dernierNomCategorie($pdo)
{

  $sql = "SELECT NomCategorie FROM categories ORDER BY id DESC LIMIT 1";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['NomCategorie'] ?? null;
}

/**
 * Récupère les informations d'un médicament par son ID.
 */
function getCategorieById($id, $pdo)
{

  $sql = "SELECT * FROM categories WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':id' => $id]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addFournisseur($nom, $adresse, $telephone, $email, $produits_fournis, $pdo)
{

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

function updateFournisseur($id, $nom, $adresse, $telephone, $email, $produits_fournis, $pdo)
{

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

function getAllventes($pdo)
{


  $sql = "SELECT * FROM vente";
  return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);;
}

function countTodaySales($pdo)
{

  $sql = "SELECT COUNT(*) as count FROM vente WHERE DATE(dateVente) = CURDATE()";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}

function countYesterdaySales($pdo)
{

  $sql = "SELECT COUNT(*) as count FROM vente WHERE DATE(dateVente) = CURDATE() - INTERVAL 1 DAY";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}

function countItems($table, $pdo)
{

  $sql = "SELECT COUNT(*) as count FROM $table";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}


function countExpiredProducts($pdo)
{

  $sql = "SELECT COUNT(*) as count FROM medicaments WHERE date_expiration < NOW()";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}

function countDailySales($pdo)
{

  $sql = "SELECT COUNT(*) as count FROM vente WHERE DATE(dateVente) = CURDATE($pdo)";
  $query = $pdo->query($sql);
  return $query->fetch(PDO::FETCH_ASSOC)['count'];
}
function addAchat( $id_fourn, $date_achat, $total, $pdo)
{

  $sql = "INSERT INTO achats (id, id_fournisseur, date_achat, total) 
          VALUES (:id, :id_fournisseur, :date_achat, :total)";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':id_fournisseur' => $id_fourn,
    ':date_achat' => $date_achat,
    ':total' => $total
  ]);
}
// add stock
function addStock($id, $nom_medicament, $description, $categorie, $quantite_disponible, $prix_unitaire, $date_expiration, $id_fourn, $pdo)
{

  $sql = "INSERT INTO stock (id, nom_medicament, description, categorie, quantite_disponible, prix_unitaire, date_expiration, id_fourn) 
          VALUES (:id, :nom_medicament, :description, :categorie, :quantite_disponible, :prix_unitaire, :date_expiration, :id_fourn)";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':id' => $id,
    ':nom_medicament' => $nom_medicament,
    ':description' => $description,
    ':categorie' => $categorie,
    ':quantite_disponible' => $quantite_disponible,
    ':prix_unitaire' => $prix_unitaire,
    ':date_expiration' => $date_expiration,
    ':nom' => $id_fourn,
  ]);
}
// fontion pout addventes
function addVente($id, $montant, $dateVente, $pdo)
{

  $sql = "INSERT INTO vente (idvente, montant, dateVente) 
          VALUES (:idvente, :montant, :dateVente)";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':idvente' => $id,
    ':montant' => $montant,
    ':dateVente' => $dateVente
  ]);
}
// add utilisateur
function addUtilisateur($nom, $prenom, $email, $nom_role, $pdo)
{
  // Retrieve the role_id based on the role name
  $sql = "SELECT id_role FROM roles WHERE nom_role = :nom_role";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':nom_role' => $nom_role]);
  $role = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$role) {
    throw new Exception("Role not found: " . $nom_role);
  }

  $role_id = $role['id_role'];

  // Insert the new user
  $sql = "INSERT INTO users (nom, prenom, email, id_role) 
          VALUES (:nom, :prenom, :email, :id_role)";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':email' => $email,
    ':id_role' => $role_id
  ]);
}
//updateUtilisateur
function updateUtilisateur($id, $nom, $prenom, $email, $role_id, $pdo)
{

  $sql = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email, id_role = :id_role WHERE id_user = :id";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':id' => $id,
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':email' => $email,
    ':id_role' => $role_id
  ]);
}

function getFourFullNameById($id, $pdo)
{

  $sql = "SELECT nom FROM fournisseurs WHERE id_fourn = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':id' => $id]);
  return $stmt->fetch(PDO::FETCH_ASSOC)['nom'];
}
 //fonction addvente
function addVent($id, $montant, $dateVente, $pdo)
{

  $sql = "INSERT INTO vente (idvente, montant, dateVente) 
          VALUES (:idvente, :montant, :dateVente)";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':idvente' => $id,
    ':montant' => $montant,
    ':dateVente' => $dateVente
  ]);
}

//fonction addcommande
function addCommande($id, $id_fourn, $date_commande, $statut, $total, $pdo)
{

  $sql = "INSERT INTO achats (id, id_fourn, date_commande, statut, total) 
          VALUES (:id, :id_fourn, :date_commande, :statut, :total)";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':id' => $id,
    ':id_fournisseur' => $id_fourn,
    ':date_commande' => $date_commande,
    ':statut' => $statut,
    ':total' => $total
  ]);
}
//fonction updatecommande
function updateCommande($id, $id_fourn, $date_commande, $statut, $total, $pdo)
{

  $sql = "UPDATE commandes SET id_fourn = :id_fourn, date_commande = :date_commande, statut = :statut, total = :total WHERE id_commande = :id";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([
    ':id' => $id,
    ':id_fourn' => $id_fourn,
    ':date_commande' => $date_commande,
    ':statut' => $statut,
    ':total' => $total
  ]);
}



