<div class="wrapper">
  <section class="form sign up">
    <h1>INSCRIPTION</h1>
    <form method="POST" action="../actions/signupAction.php">
      <?php
      if (isset($errorMsg)) {
        echo '<p class="text-danger text-center">' . htmlspecialchars($errorMsg) . '</p>';
      }
      ?>
      <div class="mb-3">
        <label for="lastname" class="form-label">Nom</label>
        <input type="text" class="form-control" id="lastname" name="lastname" required>
      </div>
      <div class="mb-3">
        <label for="firstname" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="firstname" name="firstname" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Rôle</label>
        <select class="form-select" id="role" name="role" required>
          <option value="">Sélectionner un rôle</option>
          <option value="1">Admin</option>
          <option value="2">Pharmacien</option>
          <option value="3">Caissier</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary w-100" name="valide">S'inscrire</button>
      <br><br>
      <a href="index.php" class="text-decoration-none text-center d-block">
        J'ai déjà un compte, je me connecte
      </a>
    </form>
  </section>
</div>