<?php
require __DIR__ . '../../account/db-config.php';

if(isset($_POST['send_article'])){
    try{
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
        if(isset($_POST['article_content']) && !empty($_POST['article_content'])){
            $article_name = $_POST['article_name'];
            $article_content = $_POST['article_content'];
            $article_domain = $_POST['article_domain'];
            $verified_article = $PDO -> prepare('SELECT * FROM article WHERE article_name = ?');
            $verified_article -> bindValue(1, $article_name);

            $verified_article -> execute();
            $existing_article = $verified_article -> fetch(PDO::FETCH_ASSOC); 
            $verified_article -> closeCursor();

            if($existing_article){
                $invalid_article_name = true;
            }
            else{
                $added_article = $account_creation = $PDO -> prepare('INSERT INTO article (article_domain, author_article, article_registration, article_content, article_name) VALUES(?, ?, NOW(), ?, ?)');
                $added_article -> bindValue(1, $article_domain);
                $added_article -> bindValue(2, $_SESSION['user_id']);
                $added_article -> bindValue(3, $article_content);
                $added_article -> bindValue(4, $article_name);

                $added_article -> execute(); 
                $added_article -> closeCursor();
            }
        }
    }
    catch(PDOException $pe){
        echo 'ERREUR: ' . $pe->getMessage();
    }
}
?>