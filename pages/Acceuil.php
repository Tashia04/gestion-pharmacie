<main>
	<section>
		<!-- Contenu principal -->
		<div class="premier">
			<div style="display: flex; align-items: center">
				<i class="fa-solid fa-house"></i>
				<h1 class="titre">Dashboard</h1>
			</div>
			<!-- <div class="button-group">
				<a href="signup.php" class="btn btn-success">Signup</a>
				<a href="login.php" class="btn btn-primary">Login</a>
			</div> -->
		</div>

		<div class="cards-container m-4  ">
			<?php
			$ventes = getAllVentes(); // Correction : Nom de fonction cohérent
			$totalSales = count($ventes);

			$yesterdaySales = countYesterdaySales(); // On suppose que cette fonction existe et est correcte
			$todaySales = countTodaySales(); // Correction du nom de la variable : cohérence et clarté

			// Calcul de la variation en pourcentage
			$percentageChange = ($yesterdaySales > 0)
				? (($todaySales - $yesterdaySales) / $yesterdaySales) * 100
				: 0;
			?>
			<div class="card category">
				<i class="fas fa-shopping-cart icon"></i>
				<div class="title">Les ventes du jour</div>
				<div class="value" id="total-sales"><?= htmlspecialchars($todaySales, ENT_QUOTES, 'UTF-8') ?></div>
				<div class="description" id="percentage-sales">
					<?= $percentageChange >= 0 ? '+' : '' ?><?= round($percentageChange, 2) ?>% de variation par rapport à hier
				</div>
			</div>

			<!-- Card: Catégorie -->
			<div class="card category">
				<i class="fas fa-th-large icon"></i>
				<div class="title">Catégories</div>
				<div class="value" id="categories-count"><?= countItems("categories") ?></div>
				<div class="description">Nombre total de catégories</div>
			</div>

			<!-- Card: Produits expirés -->
			<div class="card expired">
				<i class="fas fa-exclamation-triangle icon"></i>
				<div class="title">Produits Expirés</div>
				<div class="value" id="expired-products-count"><?= countExpiredProducts() ?></div>
				<div class="description">Produits à remplacer</div>
			</div>

			<!-- Card: Utilisateurs -->
			<div class="card users">
				<i class="fas fa-users icon"></i>
				<div class="title">Utilisateurs</div>
				<div class="value" id="users-count"><?= countItems("users") ?></div>
				<div class="description">Total des utilisateurs</div>
			</div>
		</div>
		<div class="cards-container">
			<div style="flex: 2">
				<h1>Ventes du Jours</h1>
				<?php $ventes = getAllventes() ?>
				<?php if (!empty($ventes)): ?>
					<table>
						<thead>
							<tr>
								<?php foreach (array_keys($ventes[0]) as $column): ?>
									<?php if (!is_int($column)): ?>
										<th><?= htmlspecialchars($column) ?></th>
									<?php endif; ?>
								<?php endforeach; ?>
								<th>Action</th> <!-- Colonne Action ajoutée -->
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ventes as $row): ?>
								<tr>
									<?php foreach ($row as $key => $value): ?>
										<?php if (!is_int($key)): ?>
											<td><?= htmlspecialchars($value) ?></td>
										<?php endif; ?>
									<?php endforeach; ?>
									<td>
										<!-- Bouton de modification -->
										<button class="btn-modify" onclick="modifierVente(<?= htmlspecialchars($row['idVente']) ?>)">
											Modifier
										</button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php else: ?>
					<p>Aucun produit trouvé.</p>
				<?php endif; ?>
			</div>
			<div style="flex: 1 " class="card">
				<h1>Diagramme</h1>
				<canvas id="myChart"></canvas>
			</div>
		</div>
	</section>
</main>


<script>
	// Fonction pour gérer le clic sur le bouton Modifier
	function modifierVente(idVente) {
		// Rediriger vers une page de modification avec l'ID de la vente
		window.location.href = `modifier.php?idVente=${idVente}`;
	}
</script>