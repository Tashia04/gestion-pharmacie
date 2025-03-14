<main>
  <section class="container py-5">
    <div class="row">
      <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary">Catalogue des Commandes</h1>
      </div>
    </div>
    <div class="dropdown-divider border border-warning my-3"></div>
    <div class="row">
      <div class="col-md-6">
        <h5 class="fw-bold mb-0">Liste des Commandes</h5>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
          <a href="ajoute_med.php" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-folder-plus"></i> Nouveau</a>
          
        </div>
      </div>
    </div>
    <div class="dropdown-divider border border-warning my-3"></div>
    <div class="row">
      <div class="table-responsive" id="orderTable">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom_Fournisseur</th>
              <th scope="col">Date_Commande</th>
              <th scope="col">Statut</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($commandes as $Commande): ?>
              <tr>
                <th scope="row"><?= htmlspecialchars($Commande['id']) ?></th>
                <td><?= htmlspecialchars($Commande['Nom_fournisseur']) ?></td>
                <td><?= htmlspecialchars($Commande['date_commande']) ?></td>
                <td><?= htmlspecialchars($Commande['statut']) ?></td>
                <td><?= htmlspecialchars($Commande['total']) ?></td>
                <td>
                  <a href="#" class="text-primary me-2 editbtn" title="Modifier"
                    data-id="<?= htmlspecialchars($Commande['id']) ?>"
                    data-Nom_Fournisseur="<?= htmlspecialchars($Commande['Nom_fournisseur']) ?>"
                    data-Date_Commande="<?= htmlspecialchars($Commande['date_commande']) ?>"
                    data-Statut="<?= htmlspecialchars($Commande['statut']) ?>"
                    data-Total="<?= htmlspecialchars($Commande['total']) ?>"><i class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#UpdateModal"></i></a>
                  <a href="../actions/delete_com.php?id=<?= htmlspecialchars($Commande['id']) ?>"
                    class="text-danger deletebtn" title="Supprimer"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Modal ajouter -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Nouvelle Commande</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../actions/ajoute_com.php">
            <div class="mb-3">
              <label for="Nom_Fournisseur" class="form-label">Nom Fournisseur</label>
              <input type="text" class="form-control" id="Nom_Fournisseur" name="Nom_Fournisseur" required>
            </div>
            <div class="mb-3">
              <label for="Date_Commande" class="form-label">Date Commande</label>
              <input type="date" class="form-control" id="Date_Commande" name="Date_Commande" required>
            </div>
            <div class="mb-3">
              <label for="Statut" class="form-label">Statut</label>
              <input type="text" class="form-control" id="Statut" name="Statut" required>
            </div>
            <div class="mb-3">
              <label for="Total" class="form-label">Total</label>
              <input type="number" class="form-control" id="Total" name="Total" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary" name="Ajouter">Ajouter</button>
            <a href="affiche_com.php" class="btn btn-secondary">Annuler</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal pour modifier une commande -->
  <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Modifier Commande</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../actions/modifi_com.php">
            <input type="hidden" name="id" id="update-id">
            <div class="mb-3">
              <label for="Nom_Fournisseur" class="form-label">Nom Fournisseur</label>
              <input type="text" class="form-control" id="update-Nom_Fournisseur" name="Nom_Fournisseur" required>
            </div>
            <div class="mb-3">
              <label for="Date_Commande" class="form-label">Date Commande</label>
              <input type="date" class="form-control" id="update-Date_Commande" name="Date_Commande" required>
            </div>
            <div class="mb-3">
              <label for="Statut" class="form-label">Statut</label>
              <input type="text" class="form-control" id="update-Statut" name="Statut" required>
            </div>
            <div class="mb-3">
              <label for="Total" class="form-label">Total</label>
              <input type="number" class="form-control" id="update-Total" name="Total" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Modifier</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
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
      document.getElementById('update-Nom_Fournisseur').value = this.dataset.Nom_Fournisseur;
      document.getElementById('update-Date_Commande').value = this.dataset.Date_Commande;
      document.getElementById('update-Statut').value = this.dataset.Statut;
      document.getElementById('update-Total').value = this.dataset.Total;
    });
  });
</script>
