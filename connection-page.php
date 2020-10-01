<?php
require __DIR__ . "../account/connection-verification.php";
init_php_session();
require 'account/db-config.php';

if(isset($_POST['valid_connection'])){
    if(isset($_POST['form_username']) && !empty($_POST['form_username']) && isset($_POST['form_password']) && !empty($_POST['form_password'])){
        $username = $_POST['form_username'];
        $password = $_POST['form_password'];
        try{
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
        
            $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
        
            $req = $PDO -> prepare('SELECT * FROM t_users WHERE user_name = ?');
            $req -> bindValue(1, $username);

            $req -> execute();
            $informations_user = $req -> fetch(PDO::FETCH_ASSOC);
            if($informations_user){
                if(password_verify($password, $informations_user['user_password'])){
                    $_SESSION['user_name'] = $informations_user['user_name'];
                    $_SESSION['user_admin'] = $informations_user['user_admin'];
                }
            }
            $response = 'votre pseudo ou votre mot de passe est incorrect ';
                
        }
        catch(PDOException $pe){
            echo 'ERREUR: ' . $pe->getMessage();
        }
    }
}
require_once __DIR__ . "../header-footer/header.php"?>

<?php if (is_logged()):?>
    <p> Bienvenue <?= htmlspecialchars($_SESSION['user_name']);?></p>
<?php else: ?>
    <div class="connection-page">
        <h1>Page de connexion</h1></br>
        <?php if (isset($response)){ echo $response;}?>
        <form action="/Vieillissement/connection-page.php" method="POST">
            <label>
                Entrez votre nom d'utilisateur
                <input type="text"  name="form_username" >
            </label>
            <label>
                Entrez votre mot de passe
                <input type="text" name ="form_password">
            </label>
            <input type="submit" name="valid_connection" value="Connexion">
        </form>
    </div>
<?php endif;?>

<?php require_once __DIR__ . "../header-footer/footer.php";?>