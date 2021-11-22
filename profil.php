<?php
require './header.php';
?>
<main>
  <?php if (estconnect()) { ?>
    <div id="blcconnexion">
      <form action="" method="post">
        <h1>Modifier votre profil</h1>
        <input type="text" placeholder="Login" name='login' value='<?php echo $_SESSION['user'] ?>' required>
        <input type="password" placeholder="Votre mot de passe" name='password1' required>
        <input type="password" placeholder="Confirmation mot de passe" name='password2' required>
        <input type="submit" name='submit'>
        <?php modif_profil($_SESSION['user']); ?>
      </form>
    </div>
  <?php } else { ?>
    <div class="erreur">
      <p>Vous devez être connecté...</p>
    </div>
  <?php } ?>
</main>
<?php
require './footer.php'
?>