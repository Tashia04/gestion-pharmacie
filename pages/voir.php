<!-- Formulaire -->
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="form-container">
        <h1>CONNEXION</h1>
        <form method="POST">
            <?php
            if (isset($errorMsg)) {
                echo '<p class="text-danger">' . $errorMsg . '</p>';
            }
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pseudo</label>
                <input type="text" class="form-control" name="pseudo" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="valide">Se Connecter</button>
            <br><br>
            <a href="signup.php" class="text-decoration-none text-center d-block">
                Je n'ai pas encore de compte, je m'inscris !
            </a>
        </form>
    </div>
</div>