<?php

require_once '../database/connexion.php';
require_once '../database/connexion.php';

// Validation du formulaire
if (isset($_POST['submit'])) {
  $user_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $user_password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

  if ($user_email && $user_password) {
    // Vérification de l'existence de l'utilisateur
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$user_email]);

    if ($stmt->rowCount() > 0) {
      // Récupération des données de l'utilisateur
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      // Vérification du mot de passe
      if (password_verify($user_password, $user['password'])) {
        // Authentification et stockage des données en session
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['current_user'] = $user;
        header('Location: /');
        exit();
      } else {
        $errorMsg = "Email / Mot de passe incorrect.";
      }
    } else {
      $errorMsg = "Email / Mot de passe incorrect.";
    }
  } else {
    $errorMsg = "Veuillez remplir tous les champs.";
  }

  if (isset($errorMsg)) {
    header('Location: /?error=' . urlencode($errorMsg));
    exit();
  }
}
