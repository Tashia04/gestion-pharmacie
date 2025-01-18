<div class="wrapper">
  <section class="form sign up">
    <header> Login</header>
    <?php
    // echo password_hash("tatafatim",PASSWORD_BCRYPT);
    ?>
    <form class="header" method="post" action="./actions/loginAction.php">
      <p class="error"><?= $_GET['error'] ?? "" ?></p>
      <div class="field input">
        <label for="">email</label>

        <input type="email" name="email" placeholder="Provide your email" require>
      </div>
      <div class="field input">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password" require>
      </div>

      <div class="field button">

        <!-- <input type="submit" name="submit" value="LOGIN"> -->

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      </div>


    </form>
    <p>Inscrivez_vous <a href="/signup">Ici</a></p>
  </section>
</div>