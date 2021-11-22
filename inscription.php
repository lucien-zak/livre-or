<?php
require './header.php';
?>
<main>
<?php if (estconnect() == false) {?>
  <div id="blcconnexion">
    <form action="" method="post">
    <h1>Inscrivez-vous !</h1>
      <input type="text" placeholder="Login" name='login' required>
      <input type="password" placeholder="Votre mot de passe" name='password1' required>
      <input type="password" placeholder="Confirmation mot de passe" name='password2' required>
      <input type="submit" name='submit'>
      <a href='./connexion.php'>Déjà inscrit ?</a>
    </form>
    <?php inscription();?>
  </div>
  <?php } else {?>
    <div class="erreur">
      <p>Vous êtes déjà inscrit...</p>
    </div>
    <?php } ?></main>
<?php
require './footer.php';
?>