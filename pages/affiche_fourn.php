<main>
  <section class="container">
    <div class="row">
      <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary">Catalogue des Fournisseurs</h1>
      </div>
    </div>
    <div class="dropdown-divider border border-warning my-3"></div>
    <div class="row">
      <div class="col-md-6">
        <h5 class="fw-bold mb-0">Liste des fournisseurs</h5>
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
              <th scope="col">Nom</th>
              <th scope="col">Adresse</th>
              <th scope="col">Telephone</th>
              <th scope="col">Email</th>
              <th scope="col">Produit_fournis</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($fournisseurs as $fournisseur): ?>
              <tr>
                <th scope="row"><?= htmlspecialchars($fournisseur['id_fourn']) ?></th>
                <td><?= htmlspecialchars($fournisseur['nom']) ?></td>
                <td><?= htmlspecialchars($fournisseur['adresse']) ?></td>
                <td><?= htmlspecialchars($fournisseur['telephone']) ?></td>
                <td><?= htmlspecialchars($fournisseur['email']) ?></td>
                <td><?= htmlspecialchars($fournisseur['produits_fournis']) ?></td>
                <td>
                  <!-- <a href="#" class="text-info me-2 infobtn" title="Voir détails" data-id=\"$bill->id"\><i class="fas fa-info-circle"></i></a> -->
                  <button
                    class="text-primary me-2 editbtn" title="Modifier"
                    data-id="<?= htmlspecialchars($fournisseur['id_fourn']) ?>"
                    data-nom="<?= htmlspecialchars($fournisseur['nom']) ?>"
                    data-adresse="<?= htmlspecialchars($fournisseur['adresse']) ?>"
                    data-telephone="<?= htmlspecialchars($fournisseur['telephone']) ?>"
                    data-email="<?= htmlspecialchars($fournisseur['email']) ?>"
                    data-produits_fournis="<?= htmlspecialchars($fournisseur['produits_fournis']) ?>"
                    data-bs-toggle="modal" data-bs-target="#UpdateModal">
                    <i class="fas fa-edit"></i>
                  </button>

                  <a href="../actions/delete_fourn.php?id_fourn=<?= $fournisseur['id_fourn'] ?>" class="text-danger" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce fournisseur ?')"><i class="fas fa-trash"></i></a>
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
          <h1 class="modal-title fs-5">Nouveau fournisseur</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../actions/ajoute_fourn.php">
            <div class="mb-3">
              <label for="Nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="Nom" name="nom" required>
            </div>
            <div class="mb-3">
              <label for="Quantite" class="form-label">Adresse</label>
              <input type="text" class="form-control" id="Quantite" name="adresse" required>
            </div>
            <div class="mb-3">
              <label for="Prix" class="form-label">Telephone</label>
              <input type="number" class="form-control" id="Prix" name="telephone" step="0.01" required>
            </div>
            <div class="mb-3">
              <label for="Date_Expiration" class="form-label">Email</label>
              <input type="email" class="form-control" id="Date_Expiration" name="email" required>
            </div>
            <div class="mb-3">
              <label for="Date_Expiration" class="form-label">Produit_fournis</label>
              <input type="text" class="form-control" name="produits_fournis" required>
            </div>

            <button type="submit" class="btn btn-primary" name="Ajouter">Ajouter</button>
            <a href="affiche_fourn.php" class="btn btn-secondary">Annuler</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal pour modifier un fournisseur -->
  <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Modifier Fournisseurs</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../actions/modifi_fourn.php" id="editForm">
            <input type="hidden" name="id_fourn" id="update-id">
            <div class="mb-3">
              <label for="Nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="update-Nom" name="nom" required>
            </div>
            <div class="mb-3">
              <label for="Quantite" class="form-label">Adresse</label>
              <input type="text" class="form-control" id="update-adresse" name="adresse" required>
            </div>
            <div class="mb-3">
              <label for="Prix" class="form-label">Telephone </label>
              <input type="text" class="form-control" id="update-telephone" name="telephone" step="0.01" required>
            </div>
            <div class="mb-3">
              <label for="Date_Expiration" class="form-label">Email</label>
              <input type="email" class="form-control" id="update-email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="Date_Expiration" class="form-label">Produit_fournis</label>
              <input type="text" class="form-control" id="update-produits_fournis" name="produits_fournis" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Modifier</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  
</main>
<script>
  const updateForm = document.getElementById("editForm");
  const editBtn = document.querySelectorAll(".editbtn");
  editBtn.forEach(btn => {
    btn.addEventListener("click", function(e) {
      updateForm.querySelector("#update-Nom").value = btn.dataset.nom;
      updateForm.querySelector("#update-adresse").value = btn.dataset.adresse;
      updateForm.querySelector("#update-telephone").value = btn.dataset.telephone;
      updateForm.querySelector("#update-email").value = btn.dataset.email;
      updateForm.querySelector("#update-produits_fournis").value = btn.dataset.produits_fournis;
    })
  })
</script>