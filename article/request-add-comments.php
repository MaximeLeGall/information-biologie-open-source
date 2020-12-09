<?php
require __DIR__ . '../../account/db-config.php';
if(isset($_POST['id_article']) && !empty($_POST['id_article']) && isset($_POST['new_comment']) && !empty($_POST['new_comment'])){
    try{
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
    
        $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
        
        $new_comment = $PDO -> prepare('INSERT INTO comment (id_article_comment, user_comment, comment_article, response_to_comment, date_comment) VALUES(?, ?, ?, ?, NOW())');
        $new_comment -> bindValue(1, $_POST['id_article'], PDO::PARAM_INT);
        $new_comment -> bindValue(2, $_POST['user_id'], PDO::PARAM_INT);
        $new_comment -> bindValue(3, $_POST['new_comment'], PDO::PARAM_STR);
        $new_comment -> bindValue(4, $_POST['response_comment'], PDO::PARAM_INT);
        
        $new_comment -> execute();
        $new_comment -> closeCursor();
        echo $_POST['new_comment'] . $_POST['id_article'] . $_POST['user_id'] . $_POST['response_comment'];
    }
    catch(PDOException $pe){
        echo 'ERREUR: ' . $pe->getMessage();
    }
}

?>