<?php
require('database/connexion.php');
require_once "database/fonctions.php";

session_start();

$routes  = [
  "/" => "./pages/Acceuil.php",
  "/login" => "./pages/login.php",
  "/signup" => "./pages/signup.php",
  "/categories" => "./pages/affiche_cat.php",
  "/fournisseurs" => "./pages/affiche_fourn.php",
  "/medicaments" => "./pages/affiche_Med.php"
];

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (!isset($_SESSION["auth"]) && $requestUri !== "/signup") {
  require_once "./partials/header.php";
  require_once $routes["/login"];
  require_once "./partials/footer.php";
  exit;
}

$utilisateur = $_SESSION["current_user"] ?? [];

if (array_key_exists($requestUri, $routes)) {
  $app_content = $routes[$requestUri];
  require_once "./partials/header.php";
  if ($requestUri !== "/signup" && $requestUri !== "/login") {
    require_once "./partials/sidebar.php";
  }
  require_once $app_content;
  require_once "./partials/footer.php";
} else {
  echo "Page non trouve";
  echo "<a href='/'>Retourner a la pgae d'accueil</a>";
}
