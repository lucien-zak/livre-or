<?php
require './header.php';
?>
<main>
  <?php if (estconnect()) { ?>
    <div id="blcconnexion">
      <form action="" method="post">
        <h1>Votre commentaire</h1>
        <textarea class="comm" type="textarea" placeholder="Votre commentaire" name='commentaire'></textarea>
        <input type="submit" name='submit'>
        <span class='erreur'><?php ins_commentaire($_POST['commentaire']);?></span>
      </form>
    </div>
  <?php } else { ?>
    <div class="erreur">
      <p>Vous ne pouvez pas laisser de commentaire, redirection vers la page d'inscription...</p>
    </div>
  <?php header('refresh:2; URL=inscription.php');
  } ?>

</main>
<?php
require './footer.php'
?>