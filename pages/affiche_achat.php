<main class="d-flex">
  <section class="container py-5">
    <div class="row">
      <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary">Catalogue des Achats</h1>
      </div>
    </div>
    <div class="dropdown-divider border border-warning my-3"></div>
    <div class="row">
      <div class="col-md-6">
        <h5 class="fw-bold mb-0">Liste des Achats aux prets des Fournisseurs</h5>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
          <a href="/achats" class="btn btn-primary btn-sm me-5" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-folder-plus"></i> Nouveau</a>
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
              <th scope="col">Fournisseur</th>
              <th scope="col">Date-Achats</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($achats as $achat): ?>
              <tr>
                <th scope="row"><?= htmlspecialchars($achat['id_achat']) ?></th>
                <?php $fname = getFourFullNameById($achat['id_fourn'], $pdo) ?>
                <td><?= htmlspecialchars($fname) ?></td>
                <td><?= htmlspecialchars($achat['date_achat']) ?></td>
                <td><?= htmlspecialchars($achat['total']) ?></td>
                <td>
                  <a class="editbtn editbtn1" title="Modifier"
                    data-id="<?= htmlspecialchars($achat['id_achat']) ?>"
                    data-id_fournisseur="<?= htmlspecialchars($achat['id_fourn']) ?>"
                    data-date_achat="<?= htmlspecialchars($achat['date_achat']) ?>"
                    data-total="<?= htmlspecialchars($achat['total']) ?>">
                    <i class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#UpdateModal"></i>
                  </a>
                  <a href="../actions/delete_achat.php?id=<?= htmlspecialchars($achat['id_achat']) ?>" class="text-danger deleteachatbtn" title="Supprimer">
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
          <h5 class="modal-title" id="createModalLabel">Ajouter Nouveau Achat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../actions/ajout_achat.php" method="POST">
            <div class="mb-3">
              <label for="create-id_fournisseur" class="form-label">ID Fournisseur</label>
              <select class="form-select" id="create-id_fournisseur" name="id_fournisseur" required>
                <?php foreach ($fournisseurs as $fournisseur): ?>
                  <option value="<?= htmlspecialchars($fournisseur['id_fourn']) ?>"><?= htmlspecialchars($fournisseur['nom']) ?></option>
                <?php endforeach; ?>
              </select>

            </div>
            <div class="mb-3">
              <label for="create-date_achat" class="form-label">Date Achat</label>
              <input type="date" class="form-control" id="create-date_achat" name="date_achat" required>
            </div>
            <div class="mb-3">
              <label for="create-total" class="form-label">Total</label>
              <input type="number" class="form-control" id="create-total" name="total" required>
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
          <h5 class="modal-title" id="UpdateModalLabel">Modifier Achat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../actions/modifi_achat.php" method="POST">
            <input type="hidden" name="id" id="update-id">
            <div class="mb-3">
              <label for="update-id_fourn" class="form-label">ID Fournisseur</label>
              <select class="form-select" id="update-id_fourn" name="id_fournisseur" required>
                <?php foreach ($fournisseurs as $fournisseur): ?>
                  <option value="<?= htmlspecialchars($fournisseur['id_fourn']) ?>"><?= htmlspecialchars($fournisseur['nom']) ?></option>
                <?php endforeach; ?>
              </select>

            </div>
            <div class="mb-3">
              <label for="update-date_achat" class="form-label">Date Achat</label>
              <input type="date" class="form-control" id="update-date_achat" name="date_achat" required>
            </div>
            <div class="mb-3">
              <label for="update-total" class="form-label">Total</label>
              <input type="number" class="form-control" id="update-total" name="total" required>
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
      document.getElementById('update-id_fourn').value = this.dataset.id_fournisseur;
      document.getElementById('update-date_achat').value = this.dataset.date_achat;
      document.getElementById('update-total').value = this.dataset.total;
    });
  });
</script>