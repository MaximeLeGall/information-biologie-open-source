<?php
require __DIR__ . "../connection-verification.php";
init_php_session();
require 'account/db-config.php';

if(isset($_POST['valid_connection']) || isset($_POST['new_account'])){
    try{
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
    
        $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
    
            //account connection
        if(isset($_POST['form_email']) && !empty($_POST['form_email']) && isset($_POST['form_password']) && !empty($_POST['form_password'])){
            $useremail = $_POST['form_email'];
            $password = $_POST['form_password'];

            if(isset($_POST['valid_connection'])){
                $connection = $PDO -> prepare('SELECT * FROM t_users WHERE user_email = ?');
                $connection -> bindValue(1, $useremail);

                $connection -> execute();
                $informations_user = $connection -> fetch(PDO::FETCH_ASSOC);
                if($informations_user){
                    if(password_verify($password, $informations_user['user_password'])){
                        $_SESSION['user_pseudo'] = $informations_user['user_pseudo'];
                        $_SESSION['user_email'] = $informations_user['user_email'];
                        $_SESSION['user_status'] = $informations_user['user_status'];
                        header('Location: http://localhost/Vieillissement/index.php');
                        exit;
                    }
                }
            }
            $connection -> closeCursor();
        }


            //account creation
        if(isset($_POST['new_pseudo']) && !empty($_POST['new_pseudo']) && isset($_POST['new_email']) && !empty($_POST['new_email']) && isset($_POST['new_password']) && !empty($_POST['new_password'])){
            $new_pseudo = $_POST['new_pseudo'];
            $new_email = $_POST['new_email'];
            $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT, ["cost" => 10]);

            if(isset($_POST['new_account'])){
                $verified_account = $PDO -> prepare('SELECT * FROM t_users WHERE user_pseudo = ? OR user_email = ?');
                $verified_account -> bindValue(1, $new_pseudo);
                $verified_account -> bindValue(2, $new_email);

                $verified_account -> execute();
                $existing_account = $verified_account -> fetchALL(PDO::FETCH_ASSOC); 
                $verified_account -> closeCursor();

                if($existing_account){
                    foreach ($existing_account as $invalid_element) {
                        if($invalid_element['user_email'] == $new_email){
                            $invalid_email = "adresse e-mail déjà utilisé";
                        }
                        if($invalid_element['user_pseudo'] == $new_pseudo){
                            $invalid_pseudo = "pseudo  déjà existant";
                        }
                    }
                }
                else{
                    $account_creation = $PDO -> prepare('INSERT INTO t_users (user_pseudo, user_password, user_registration, user_email, user_admin) VALUES(?, ?, NOW(), ?, 0)');
                    $account_creation -> bindValue(1, $new_pseudo, PDO::PARAM_STR);
                    $account_creation -> bindValue(2, $new_password, PDO::PARAM_STR);
                    $account_creation -> bindValue(3, $new_email, PDO::PARAM_STR);

                    $account_creation -> execute();
                }
            }
        }
    }
    catch(PDOException $pe){
        echo 'ERREUR: ' . $pe->getMessage();
    }
}
?>