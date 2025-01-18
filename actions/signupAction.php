<?php

require "../database/connexion.php";
// Validation du formulaire
if (isset($_POST['valide'])) {
  //Verifie si l'users a bien Completé tous les champs 
  if (!empty($_POST['lastname']) and !empty($_POST['firstname']) and !empty($_POST['password']) and !empty($_POST['email']) and !empty($_POST['role'])) {
    // les donnees des users 
    $users_lastname = htmlspecialchars($_POST['lastname']);
    $users_firstname = htmlspecialchars($_POST['firstname']);
    $users_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $users_email = htmlspecialchars($_POST['email']);
    $users_role = htmlspecialchars($_POST['role']);
    // Verifie si l'users existe déja sur le site  
    $checkifusersAlreadyexcit = $pdo->prepare('SELECT prenom FROM users WHERE prenom =?');
    // creation d'un table qui va mettre en parametre le pseudo  
    $checkifusersAlreadyexcit->execute(array($users_firstname));

    if ($checkifusersAlreadyexcit->rowCount() == 0) {
      // inserer les users dans le site website (base de donnees )
      $insertUsersOnwebsite = $pdo->prepare('INSERT INTO users(nom,prenom,email,password,id_role)VALUES(?,?,?,?,?)');
      $insertUsersOnwebsite->execute(array($users_lastname, $users_firstname, $users_password, $users_email, $users_role));
      // Authantifier les utilisateurs et recuper les infos des users !!!
      $getInfoOfThisUsersReq = $pdo->prepare('SELECT id_user,nom,prenom,email,id_role FROM users WHERE nom = ? AND prenom = ? AND email = ? AND id_role = ?');
      $getInfoOfThisUsersReq->execute(array($users_lastname, $users_firstname, $users_email, $users_role));
      // recuperer les infos des users et le stocker dans le table >
      $users_Info = $getInfoOfThisUsersReq->fetch();

      // authentifiers les users  sur le site et recuperer ses donnees dans des variables globales  sessions 
      $_SESSION['auth'] = true;
      $_SESSION['id_user'] = $users_Info['id_user'];
      $_SESSION['lastname'] = $users_Info['nom'];
      $_SESSION['firstname'] = $users_Info['prenom'];
      $_SESSION['email'] = $users_Info['email'];
      $_SESSION['role'] = $users_Info['id_role'];


      // Rediriger l'users dans la page d'accueil
      header('Location:./pages/login.php');
    } else {
      $errorMsg = "L'utilisateur existe deja sur le site";
    }
  } else {
    $errorMsg = "Veuillez remplir tous les champs...";
  }
}
