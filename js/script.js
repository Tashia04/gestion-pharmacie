const ctx = document.getElementById("myChart");

const config = {
  type: "doughnut",
  data: {
    labels: ["Vente", "Categorie", "Produit expire"],
    datasets: [
      {
        label: "My First Dataset",
        data: [300, 50, 100],
        backgroundColor: [
          " rgb(76, 175, 80)",
          "rgb(255, 152, 0)",
          "rgb(244, 67, 54)",
        ],
        hoverOffset: 4,
      },
    ],
  },
};

new Chart(ctx, config);
