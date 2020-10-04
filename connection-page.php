<?php
    require  __DIR__ . "../account/request-connection.php";
    require __DIR__ . "../header-footer/header.php";
?>

<?php if(is_logged()):?>
    <p> Bienvenue <?= htmlspecialchars($_SESSION['user_name']);?></p>
<?php else: ?>
    <div class="connection-page">
        <h1>Connexion</h1>
        <?php if (isset($_POST['valid_connection'])){ echo '<p class="incorrect-informations">votre pseudo ou votre mot de passe est incorrect</p>';}?>
        <form id="connection-form" action="connection-page.php" method="POST">
            <input type="text"  name="form_username" placeholder="votre adresse e-mail">
            <input type="password" name ="form_password" placeholder="votre mot de passe">
            <button type="submit" name="valid_connection">Connexion</button>
        </form>
    </div>
<?php endif;?>

<?php require __DIR__ . "../header-footer/footer.php";?>