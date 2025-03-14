<main class="d-flex">
  <section class="container py-5">
    <div class="row">
      <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary">Liste des Utilisateurs</h1>
      </div>
    </div>
    <div class="dropdown-divider border border-warning my-3"></div>
    <div class="row">
      <div class="col-md-6"></div>
      <h5 class="fw-bold mb-0">Liste des Utilisateurs</h5>
    </div>
    <div class="col-md-6">
      <div class="d-flex justify-content-end">
        <!-- <a href="/users" class="btn btn-primary btn-sm me-5" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-user-plus"></i> Nouveau</a> -->
      </div>
    </div>
    </div>
    <div class="dropdown-divider border border-warning my-2"></div>
    <div class="row">
      <div class="table-responsive" id="orderTable">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Email</th>
              <th scope="col">Rôle</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <tr>
                <th scope="row"><?= htmlspecialchars($user['id_user']) ?></th>
                <td><?= htmlspecialchars($user['nom']) ?></td>
                <td><?= htmlspecialchars($user['prenom']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['nom_role']) ?></td>
                <td>
                  <a class="editbtn editbtn1" 
                    title="Modifier" 
                    data-id="<?= htmlspecialchars($user['id_user']) ?>" 
                    data-nom="<?= htmlspecialchars($user['nom']) ?>" 
                    data-prenom="<?= htmlspecialchars($user['prenom']) ?>" 
                    data-email="<?= htmlspecialchars($user['email']) ?>" 
                    data-role="<?= htmlspecialchars($user['id_role']) ?>">
                    
                    <i class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#UpdateModal"></i>
                  </a>
                  <a href="../actions/delete_admis.php?id=<?= htmlspecialchars($user['id_user']) ?>" class="text-danger deleteuserbtn" title="Supprimer">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Ajouter Nouvel Utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../actions/ajoute_admis.php" method="POST">
            <div class="mb-3">
              <label for="create-nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="create-nom" name="nom" required>
            </div>
            <div class="mb-3">
              <label for="create-prenom" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="create-prenom" name="prenom" required>
            </div>
            <div class="mb-3">
              <label for="create-email" class="form-label">Email</label>
              <input type="email" class="form-control" id="create-email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="create-role" class="form-label">Rôle</label>
              <select class="form-control" id="create-role" name="id_role" required>
                <option value="">Sélectionner un rôle</option>
                <option value="1">Admis</option>
                <option value="2">Pharmacien</option>
                <option value="3">Caissier</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary" name="Ajouter">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Update Modal -->
  <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateModalLabel">Modifier Utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../actions/modifi_admis.php" method="POST">
            <input type="hidden" name="id_user" id="update-id">
            <div class="mb-3">
              <label for="update-nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="update-nom" name="nom" required>
            </div>
            <div class="mb-3">
              <label for="update-prenom" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="update-prenom" name="prenom" required>
            </div>
            <div class="mb-3">
              <label for="update-email" class="form-label">Email</label>
              <input type="email" class="form-control" id="update-email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="create-role" class="form-label">Rôle</label>
              <select id="update-role" class="form-control" id="create-role" name="id_role" required>
                <option value="">Sélectionner un rôle</option>
                <option value="1">Admis</option>
                <option value="2">Pharmacien</option>
                <option value="3">Caissier</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary" name="update">Enregistrer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  document.querySelectorAll('.editbtn').forEach(item => {
    item.addEventListener('click', function() {
      document.getElementById('update-id').value = this.dataset.id;
      document.getElementById('update-nom').value = this.dataset.nom;
      document.getElementById('update-prenom').value = this.dataset.prenom;
      document.getElementById('update-email').value = this.dataset.email;
      document.getElementById('update-role').value = this.dataset.role;
    });
  });
</script>