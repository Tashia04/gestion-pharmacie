<!-- Navbar verticale -->
<aside class="navbar">
  <!-- Profil utilisateur -->
  <div class="text-center p-3 flex">
    <img src="../images/avatar.jpg" alt="" class="rounded-circle" style="width: 60px; height: 60px;">

    <h6 class="mt-2"><?= htmlspecialchars($utilisateur['prenom'] . " " . $utilisateur['nom']) ?></h6>
    <p class="text-muted small mb-0"><?= htmlspecialchars($utilisateur['email']) ?></p>
    <!-- <p class="text-muted small mb-0"><?= htmlspecialchars($utilisateur['id_role']) ?></p> -->
  </div>

  <div class="dropdown-divider"></div>

  <!-- Navigation -->
  <a href="/" class="navbar-brand">Santé&Vie</a>
  <ul class="navbar-nav">
    <!-- <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-cogs"></i> Administration</a></li> -->
    <li class="nav-item"><a class="nav-link" href="/admis"><i class="fas fa-users"></i> Utilisateurs</a></li>
    <li class="nav-item"><a class="nav-link" href="/categories"><i class="fas fa-th-large"></i> Catégories</a></li>
    <li class="nav-item"><a class="nav-link" href="/medicaments"><i class="fas fa-capsules"></i> Produits</a></li>
    <li class="nav-item"><a class="nav-link" href="/achats"><i class="fas fa-cart-arrow-down"></i> Achats</a></li>
    <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-cart-arrow-up"></i> Ventes</a></li>
    <li class="nav-item"><a class="nav-link" href="/stock"><i class="fas fa-boxes"></i> Stock</a></li>
    <!-- <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-users-cog"></i> Clients</a></li> -->
    <li class="nav-item"><a class="nav-link" href="/commandes"><i class="fas fa-hand-holding-heart"></i> Commande</a></li>
    <li class="nav-item"><a class="nav-link" href="/fournisseurs"><i class="fas fa-truck"></i> Fournisseur</a></li>
    <!-- <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-chart-line"></i> Rapport</a></li> -->
    <li class="nav-item mt-auto"><a class="nav-link" href="../actions/logoutAction.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
  </ul>
</aside>