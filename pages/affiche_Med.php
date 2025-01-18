<main>
  <section class="container py-5">
    <div class="row">
      <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary">Catalogue des Médicaments</h1>
      </div>
    </div>
    <div class="dropdown-divider border border-warning my-3"></div>
    <div class="row">
      <div class="col-md-6">
        <h5 class="fw-bold mb-0">Liste des Medicaments</h5>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
          <a href="ajoute_med.php" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-folder-plus"></i> Nouveau</a>
          <a href="#" class="btn btn-success btn-sm" id="export"><i class="fas fa-table"></i> Exporter</a>
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
              <th scope="col">Quantité</th>
              <th scope="col">Prix(FCfa)</th>
              <th scope="col">Date Expiration</th>
              <th scope="col">NomCategorie</th>
              <th scope="col">Action</th>
            </tr>
          </thead>



          <?php

          foreach ($Medicaments as $Medicament): ?>
            <tr>
              <th scope="row"><?= htmlspecialchars($Medicament['id']) ?></th>
              <td><?= htmlspecialchars($Medicament['Nom']) ?></td>
              <td><?= htmlspecialchars($Medicament['quantite']) ?></td>
              <td><?= htmlspecialchars($Medicament['prix']) ?></td>
              <td><?= htmlspecialchars($Medicament['date_expiration']) ?></td>
              <td><?= htmlspecialchars($Medicament['NomCategorie']) ?></td>
              <td>
                <!-- <a href="#" class="text-info me-2 infobtn" title="Voir détails" data-id=\"$bill->id"\><i class="fas fa-info-circle"></i></a> -->
                <a href="#" class="text-primary me-2 editbtn" title="Modifier" data-id="$bill->id"><i class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#UpdateModal"></i></a>
                <a href="../''delete.php?id=<?= htmlspecialchars($Medicament['id']) ?>"
                  class="text-danger deletebtn" title="Supprimer"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>

        </table>
      </div>
    </div>
  </section>


  <!-- Modal ajouter -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Nouveau Médicament</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../actions/ajoute_med.php">
            <div class="mb-3">
              <label for="Nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="Nom" name="Nom" required>
            </div>
            <div class="mb-3">
              <label for="Quantite" class="form-label">Quantité</label>
              <input type="number" class="form-control" id="Quantite" name="Quantite" required>
            </div>
            <div class="mb-3">
              <label for="Prix" class="form-label">Prix</label>
              <input type="number" class="form-control" id="Prix" name="Prix" step="0.01" required>
            </div>
            <div class="mb-3">
              <label for="Date_Expiration" class="form-label">Date d'expiration</label>
              <input type="date" class="form-control" id="Date_Expiration" name="Date_Expiration" required>
            </div>
            <div class="mb-3">
              <label for="Categorie" class="form-label">Catégorie</label>
              <select class="form-select" id="Categorie" name="Categorie" aria-label="Default select example" required>
                <option value="" selected>Sélectionnez une catégorie</option>
                <?php
                $categories = getAllCategories();
                foreach ($categories as $categorie): ?>
                  <option value="<?= $categorie['id'] ?>"><?= htmlspecialchars($categorie['NomCategorie']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="Ajouter">Ajouter</button>
            <a href="affiche_Med.php" class="btn btn-secondary">Annuler</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal pour modifier un médicament -->
  <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Modifier Médicament</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../''modifi_med.php">
            <input type="hidden" name="id" id="update-id">
            <div class="mb-3">
              <label for="Nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="update-Nom" name="Nom" required>
            </div>
            <div class="mb-3">
              <label for="Quantite" class="form-label">Quantité</label>
              <input type="number" class="form-control" id="update-Quantite" name="Quantite" required>
            </div>
            <div class="mb-3">
              <label for="Prix" class="form-label">Prix</label>
              <input type="number" class="form-control" id="update-Prix" name="Prix" step="0.01" required>
            </div>
            <div class="mb-3">
              <label for="Date_Expiration" class="form-label">Date d'expiration</label>
              <input type="date" class="form-control" id="update-Date_Expiration" name="Date_Expiration" required>
            </div>
            <div class="mb-3">
              <label for="Categorie" class="form-label">Catégorie</label>
              <select class="form-select" id="update-Categorie" name="Categorie" aria-label="Default select example" required>
                <option value="" selected>Sélectionnez une catégorie</option>
                <?php
                $categories = getAllCategories();
                foreach ($categories as $categorie): ?>
                  <option value="<?= $categorie['id'] ?>"><?= htmlspecialchars($categorie['NomCategorie']) ?></option>
                <?php endforeach; ?>
              </select>
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
  document.querySelectorAll('.editbtn').forEach(item => {
    item.addEventListener('click', function() {

        document.getElementById('update-id').value = data.id;
        document.getElementById('update-Nom').value = data.Nom;
        document.getElementById('update-Quantite').value = data.quantite;
        document.getElementById('update-Prix').value = data.prix;
        document.getElementById('update-Date_Expiration').value = data.date_expiration;
        document.getElementById('update-Categorie').value = data.Categorie;
      })
      .catch(error => console.error('Error:', error));
  });


  $(function() {
    $("table").DataTable();
    // inserer une nouvelle fournisseur
  });
</script>