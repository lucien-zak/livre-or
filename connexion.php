<?php
require './header.php';
?>
<main>
    <?php if (estconnect() == false) { ?>
        <div id="blcconnexion">
            <h1>Connectez-vous !</h1>
            <form action="" method="post">
                <input placeholder="Login" type="text" name="username" id="username" required>
                <input placeholder="Password" type="password" name="password" id="password" required>
                <input id="btnsubmit" type="submit" value="Se connecter">
            </form>
            <?php connexion(); ?>
        </div>
    <?php } else { ?>
        <div class="erreur">
            <p>Vous êtes déjà connecté...</p>
        </div>
    <?php } ?>
</main>
<?php require './footer.php'; ?>