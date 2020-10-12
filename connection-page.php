<?php
    require  __DIR__ . "../account/request-connection.php";
    require __DIR__ . "../header-footer/header.php";
?>

<?php if(is_logged()):?>
    <h1 class="connected-user"><?= htmlspecialchars($_SESSION['user_name']);?> vous êtes connectés</h1>
<?php else: ?>
    <div class="connection-page">
        <h1>Connexion</h1>
        <?php if (isset($_POST['valid_connection'])){ echo '<p class="incorrect-informations">votre pseudo ou votre mot de passe est incorrect</p>';}?>
        <form id="connection-form" action="connection-page.php" method="POST">
            <input type="text"  name="form_email" placeholder="votre adresse e-mail">
            <input type="password" name ="form_password" placeholder="votre mot de passe">
            <button type="submit" name="valid_connection">Connexion</button>
        </form>
        <div class="separation"></div>
        <a role="button" class="button-account-creation" onclick="visibleElement('.connection-page', 'body')">Créer un compte</a>
    </div>
    <div class="background-account-creation" >
        <div class="account-creation">
            <h2>Inscription</h2>
            <p class="title-precision">facile et rapide</p>
            <div class="title-separation"></div>
            <form id="creat-account-form" action="connection-page.php" method="POST">
                <?php if(isset($invalid_pseudo)){ echo '<p class="invalide-pseudo">' . $invalid_pseudo . '</p>'; }?>
                <input type="text" name="new_pseudo" placeholder="pseudo" <?php if(empty($invalid_pseudo) && isset($_POST['new_account'])){echo 'value="' . $_POST['new_pseudo'] . '"'; } ?>>
                <?php if(isset($invalid_email)){ echo '<p class="invalide-email">' . $invalid_email . '</p>'; }?>
                <input type="text" name="new_email" placeholder="adress e_mail"  <?php if(empty($invalid_email) && isset($_POST['new_account'])){echo 'value="' . $_POST['new_email'] . '"'; } ?>>
                <input type="password" name="new_password" placeholder="password">
                <progress id="security-password" max="100" value=""></progress>
                <p>Votre mot de passe doit contenir au moin 8 caractères dont un caractère spéciale et un chiffre.</p>
                <button type="submit" name="new_account">S'inscrire</button>
            </form>
        </div>
    </div>
<?php endif;?>
<script type="text/javascript">
    var postNewAccount = <?php if(isset($_POST['new_account'])){
                            echo 1;
                        }else{
                            echo 0;
                        }?>;
</script>
<script src="/Vieillissement/account/connection.js"></script>
<?php require __DIR__ . "../header-footer/footer.php";?>