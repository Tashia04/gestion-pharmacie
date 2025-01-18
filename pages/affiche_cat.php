<main class="d-flex">
  <section class="container py-5">
    <div class="row">
      <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary">Catalogue des Catégories</h1>
      </div>
    </div>
    <div class="dropdown-divider border border-warning my-3"></div>
    <div class="row">
      <div class="col-md-6">
        <h5 class="fw-bold mb-0">Liste des Catégories</h5>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
          <a href="/categories" class="btn btn-primary btn-sm me-5" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-folder-plus"></i> Nouveau</a>
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
              <th scope="col">NomCategorie</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Categories as $categorie): ?>
              <tr>
                <th scope="row"><?= htmlspecialchars($categorie['id']) ?></th>
                <td><?= htmlspecialchars($categorie['NomCategorie']) ?></td>
                <td>
                  <a class="editbtn editbtn1" title="Modifier" data-categorie="<?= htmlspecialchars($categorie['NomCategorie']) ?>" data-id="<?= htmlspecialchars($categorie['id']) ?>">
                    <i class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#UpdateModal"></i>
                  </a>
                  <a href="../actions/delete_cat.php ?id=<?= htmlspecialchars($categorie['id']) ?>" class="text-danger deletecatbtn" title="Supprimer">
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
          <h5 class="modal-title" id="createModalLabel">Ajouter Nouvelle Catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../actions/ajout_cat.php" method="POST">
            <div class="mb-3">
              <label for="create-categorie" class="form-label">Nom de la Catégorie</label>
              <input type="text" class="form-control" id="create-categorie" name="NomCategorie" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Ajouter</button>
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
          <h5 class="modal-title" id="UpdateModalLabel">Modifier Catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../actions/modifi_cat.php" method="POST">
            <input type="hidden" name="id" id="update-id">
            <div class="mb-3">
              <label for="update-categorie" class="form-label">Nom de la Catégorie</label>
              <input type="text" class="form-control" id="update-categorie" name="NomCategorie" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
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
      document.getElementById('update-categorie').value = this.dataset.categorie;
    });
  });
</script>