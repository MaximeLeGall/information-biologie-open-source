<?php
require __DIR__ . '../../../account/db-config.php';
if(isset($_POST['account_modification'])){
    try{
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
        if(isset($_POST['new_pseudo']) && !empty($_POST['new_pseudo']) || isset($_POST['new_email']) && !empty($_POST['new_email'])){
            if(isset($_POST['new_pseudo'])){
                $new_pseudo = $_POST['new_pseudo'];
            }
            else{
                $new_pseudo = false;
            }
            if(isset($_POST['new_email'])){
                $new_email = $_POST['new_email'];
            }
            else{
                $new_email = false;
            }

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
            elseif($new_pseudo){
                $account_modification = $PDO -> prepare('UPDATE t_users SET user_pseudo = ? WHERE user_email = ?');
                $account_modification -> bindValue(1, $new_pseudo, PDO::PARAM_STR);
                $account_modification -> bindValue(2, $_SESSION['user_email'], PDO::PARAM_STR);
                $account_modification -> execute();
                $account_modification -> closeCursor();
                
                $_SESSION['user_pseudo'] = $new_pseudo;
            }
            elseif($new_email){
                $account_modification = $PDO -> prepare('UPDATE t_users SET user_email = ? WHERE user_pseudo = ?');
                $account_modification -> bindValue(1, $new_email, PDO::PARAM_STR);
                $account_modification -> bindValue(2, $_SESSION['user_pseudo'], PDO::PARAM_STR);
                $account_modification -> execute();
                $account_modification -> closeCursor();

                $_SESSION['user_email'] = $new_email;
            }
        }
    }
    catch(PDOException $pe){
        echo 'ERREUR: ' . $pe->getMessage();
    }
}
?>