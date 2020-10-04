<?php
require __DIR__ . "../connection-verification.php";
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
                    header('Location: http://localhost/Vieillissement/index.php');
                    exit;
                }
            }
        }
        catch(PDOException $pe){
            echo 'ERREUR: ' . $pe->getMessage();
        }
    }
}
?>