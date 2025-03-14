<main class="d-flex">
  <section class="container py-5">
    <div class="row">
      <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary">Catalogue des Stocks</h1>
      </div>
    </div>
    <div class="dropdown-divider border border-warning my-3"></div>
    <div class="row">
      <div class="col-md-6">
        <h5 class="fw-bold mb-0">Liste des Stock</h5>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
          <a href="/stocks" class="btn btn-primary btn-sm me-5" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-folder-plus"></i> Nouveau</a>
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
              <th scope="col">Nom_Medicaments</th>
              <th scope="col">Description</th>
              <th scope="col">Categories</th>
              <th scope="col">Quantite_Disponible</th>
              <th scope="col">Prix_Unitaire</th>
              <th scope="col">Date_Expiration</th>
              <th scope="col">Nom_fournisseurs</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($stocks as $stock): ?>
              <tr>
                <th scope="row"><?= htmlspecialchars($stock['id']) ?></th>
                <td><?= htmlspecialchars($stock['nom_medicament']) ?></td>
                <td><?= htmlspecialchars($stock['description']) ?></td>
                <td><?= htmlspecialchars($stock['categorie']) ?></td>
                <td><?= htmlspecialchars($stock['quantite_disponible']) ?></td>
                <td><?= htmlspecialchars($stock['prix_unitaire']) ?></td>
                <td><?= htmlspecialchars($stock['date_expiration']) ?></td>
                <td><?= htmlspecialchars($stock['nom']) ?></td>
                <td>
                  <a class="editbtn editbtn1" title="Modifier" data-id="<?= htmlspecialchars($stock['id']) ?>" data-nom_medicament="<?= htmlspecialchars($stock['nom_medicament']) ?>" data-description="<?= htmlspecialchars($stock['description']) ?>" data-categorie="<?= htmlspecialchars($stock['categorie']) ?>" data-quantite_disponible="<?= htmlspecialchars($stock['quantite_disponible']) ?>" data-prix_unitaire="<?= htmlspecialchars($stock['prix_unitaire']) ?>" data-date_expiration="<?= htmlspecialchars($stock['date_expiration']) ?>" data-nom_fournisseur="<?= htmlspecialchars($stock['nom']) ?>">
                    <i class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#UpdateModal"></i>
                  </a>
                  <a href="../actions/delete_stock.php?id=<?= htmlspecialchars($stock['id']) ?>" class="text-danger deletestockbtn" title="Supprimer">
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
          <h5 class="modal-title" id="createModalLabel">Ajouter Nouveau Stock</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../actions/ajoute_stock.php" method="POST">
            <div class="mb-3">
              <label for="create-nom_medicament" class="form-label">Nom Medicament</label>
              <input type="text" class="form-control" id="create-nom_medicament" name="nom_medicament" required>
            </div>
            <div class="mb-3">
              <label for="create-description" class="form-label">Description</label>
              <input type="text" class="form-control" id="create-description" name="description" required>
            </div>
            <div class="mb-3">
              <label for="create-categorie" class="form-label">Categorie</label>
              <input type="text" class="form-control" id="create-categorie" name="categorie" required>
            </div>
            <div class="mb-3">
              <label for="create-quantite_disponible" class="form-label">Quantite Disponible</label>
              <input type="number" class="form-control" id="create-quantite_disponible" name="quantite_disponible" required>
            </div>
            <div class="mb-3">
              <label for="create-prix_unitaire" class="form-label">Prix Unitaire</label>
              <input type="number" class="form-control" id="create-prix_unitaire" name="prix_unitaire" required>
            </div>
            <div class="mb-3">
              <label for="create-date_expiration" class="form-label">Date Expiration</label>
              <input type="date" class="form-control" id="create-date_expiration" name="date_expiration" required>
            </div>
            <div class="mb-3">
              <label for="create-nom_fournisseur" class="form-label">Nom Fournisseur</label>
              <input type="text" class="form-control" id="create-nom_fournisseur" name="nom_fournisseur" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
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
          <h5 class="modal-title" id="UpdateModalLabel">Modifier Stock</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../actions/modifi_stock.php" method="POST">
            <input type="hidden" name="id" id="update-id">
            <div class="mb-3">
              <label for="update-nom_medicament" class="form-label">Nom Medicament</label>
              <input type="text" class="form-control" id="update-nom_medicament" name="nom_medicament" required>
            </div>
            <div class="mb-3">
              <label for="update-description" class="form-label">Description</label>
              <input type="text" class="form-control" id="update-description" name="description" required>
            </div>
            <div class="mb-3">
              <label for="update-categorie" class="form-label">Categorie</label>
              <input type="text" class="form-control" id="update-categorie" name="categorie" required>
            </div>
            <div class="mb-3">
              <label for="update-quantite_disponible" class="form-label">Quantite Disponible</label>
              <input type="number" class="form-control" id="update-quantite_disponible" name="quantite_disponible" required>
            </div>
            <div class="mb-3">
              <label for="update-prix_unitaire" class="form-label">Prix Unitaire</label>
              <input type="number" class="form-control" id="update-prix_unitaire" name="prix_unitaire" required>
            </div>
            <div class="mb-3">
              <label for="update-date_expiration" class="form-label">Date Expiration</label>
              <input type="date" class="form-control" id="update-date_expiration" name="date_expiration" required>
            </div>
            <div class="mb-3">
              <label for="update-nom_fournisseur" class="form-label">Nom Fournisseur</label>
              <input type="text" class="form-control" id="update-nom_fournisseur" name="nom_fournisseur" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Modifier</button>
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
      document.getElementById('update-nom_medicament').value = this.dataset.nom_medicament;
      document.getElementById('update-description').value = this.dataset.description;
      document.getElementById('update-categorie').value = this.dataset.categorie;
      document.getElementById('update-quantite_disponible').value = this.dataset.quantite_disponible;
      document.getElementById('update-prix_unitaire').value = this.dataset.prix_unitaire;
      document.getElementById('update-date_expiration').value = this.dataset.date_expiration;
      document.getElementById('update-nom_fournisseur').value = this.dataset.nom_fournisseur;
    });
  });
</script>