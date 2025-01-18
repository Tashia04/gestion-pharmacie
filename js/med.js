$(function () {
  $("table").DataTable();
  // inserer une nouvelle Medicaments
});


// <?php if ($successMessage): ?>
// Swal.fire({
//   icon: 'success',
//   title: 'Succès',
//   text: '<?= $successMessage ?>',
// });
// <?php endif; ?>

// pour Modifier un Medicament
document.querySelectorAll(".editbtn").forEach((btn) => {
  btn.addEventListener("click", function () {
    const row = this.closest("tr");
    document.getElementById("update-id").value = row
      .querySelector("th")
      .innerText.trim();
    document.getElementById("update-Nom").value = row
      .querySelectorAll("td")[0]
      .innerText.trim();
    document.getElementById("update-Quantite").value = row
      .querySelectorAll("td")[1]
      .innerText.trim();
    document.getElementById("update-Prix").value = row
      .querySelectorAll("td")[2]
      .innerText.trim();
    document.getElementById("update-Date_Expiration").value = row
      .querySelectorAll("td")[3]
      .innerText.trim();
    document.getElementById("update-Categorie").value = row
      .querySelectorAll("td")[4]
      .innerText.trim();
  });
});

// modifier la catégorie

// document.querySelectorAll(".editbtn").forEach((btn) => {
//   btn.addEventListener("click", function () {
//     const row = this.closest("tr");

//     // Get the current category
//     const currentCategory = row.querySelectorAll("td")[4].innerText.trim();

//     // Open a modal or display a form for category selection
//     // ... (Your modal or form code here) ...

//     // Example with a simple input field:
//     const categoryInput = document.getElementById("update-Cat");
//     categoryInput.value = currentCategory;

//     // Add event listener to the input field for category change
//     categoryInput.addEventListener("change", function () {
//       // Update the category in the table row
//       row.querySelectorAll("td")[4].innerText = categoryInput.value;
//     });
//   });
// });

// pour Supprimer un Medicament
document.querySelectorAll(".deletebtn").forEach((button) => {
  button.addEventListener("click", function (event) {
    const confirmation = confirm(
      "Êtes-vous sûr de vouloir supprimer ce médicament ?"
    );
    if (!confirmation) {
      event.preventDefault(); // Annule la suppression si l'utilisateur refuse
    }
  });
});

// pour supprimer les categories
document.querySelectorAll(".deletecatbtn").forEach((button) => {
  button.addEventListener("click", function (event) {
    const confirmation = confirm(
      "Êtes-vous sûr de vouloir supprimer cette catégorie ?"
    );
    if (!confirmation) {
      event.preventDefault(); // Annule la suppression si l'utilisateur refuse
    }
  });
});

// pour Ajouter un Medicament
document.getElementById("addbtn").addEventListener("click", function () {
  document.getElementById("add-Nom").value = "";
  document.getElementById("add-Quantite").value = "";
  document.getElementById("add-Prix").value = "";
  document.getElementById("add-Date_Expiration").value = "";
  document.getElementById("add-Categorie").value = "";
});

document.addEventListener("DOMContentLoaded", () => {
  const updateModal = document.getElementById("UpdateModal");

  updateModal.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget; // Bouton qui a déclenché l'ouverture du modal
    const id = button.getAttribute("data-id"); // Récupère l'ID
    const categorieId = button.getAttribute("data-categorie-id"); // Récupère l'ID de la catégorie

    // Remplir les champs du formulaire
    document.getElementById("update-id").value = id;
    document.getElementById("update-Cat").value = categorieId;
  });
});





  
  


    