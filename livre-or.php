<?php
require './header.php';
$commentaire = req_commentaire();
?>
<main id="livre">
<?php for($i = 0; $i < count($commentaire); $i++) { ?>
<div class="commentaire">
  <h2>Posté par <?php echo $commentaire[$i]['login']?> le <?php echo $commentaire[$i]['date']?> </h2>
<?php echo $commentaire[$i]['commentaire']?>
</div>
<?php } ?>
</main>
<?php 
require './footer.php'
?>