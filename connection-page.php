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
            <input type="text"  name="form_username" placeholder="votre adresse e-mail">
            <input type="password" name ="form_password" placeholder="votre mot de passe">
            <button type="submit" name="valid_connection">Connexion</button>
        </form>
        <div class="separation"></div>
        <a role="button" class="button-account-creation" onclick="visibleElement('.connection-page', 'body')">Créer un compte</a>
    </div>
    <div class="background-account-creation" >
        <div class="account-creation">
            <h2>Inscription</h2>
            <p>facile et rapide</p>
            <div class="title-separation"></div>
            <form id="creat-account-form" action="connection-page.php" method="POST">
                <input type="text" name="pseudo" placeholder="pseudo">
                <input type="text" name="e_mail" placeholder="adress e_mail">
                <input type="password" name="password" placeholder="password">
                <progress id="security-password" max="100" value=""></progress>
                <p>Votre mot de passe doit contenir au moin 8 caractères dont un caractère spéciale et un chiffre.</p>
                <button type="submit" name="account_creat">S'inscrire</button>
            </form>
        </div>
    </div>
<?php endif;?>

<script src="/Vieillissement/account/connection.js"></script>
<?php require __DIR__ . "../header-footer/footer.php";?>