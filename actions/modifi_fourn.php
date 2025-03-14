<?php
include_once '../database/connexion.php';
include_once '../database/fonctions.php';


// Vérifier si le formulaire a été soumis pour une mise à jour
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données envoyées par le formulaire
    $id = $_POST['id_fourn'] ?? null;
    $nom = $_POST['nom'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $email = $_POST['email'] ?? '';
    $produits_fournis = $_POST['produits_fournis'] ?? '';

    // Validation des données (ajustez selon vos besoins)
    if (empty($id) || empty($nom) || empty($adresse) || empty($telephone) || empty($email) || empty($produits_fournis)) {
        echo "<script>alert('Veuillez remplir tous les champs obligatoires.');</script>";
    } else {
        try {
            // Mise à jour du fournisseur
            $executed = updateFournisseur($id, $nom, $adresse, $telephone, $email, $produits_fournis, $pdo);

            if ($executed) {
                echo "<script>alert('Le fournisseur a été mis à jour avec succès.');window.location.href='/fournisseurs';</script>";
            } else {
                echo "<script>alert('Échec de la mise à jour du fournisseur.');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Erreur lors de la mise à jour : " . $e->getMessage() . "');</script>";
        }
    }
}
