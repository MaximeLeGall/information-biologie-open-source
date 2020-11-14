<?php
if(is_logged()){
    try{
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ];
    
        $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
        
        $querySQL = 'SELECT id_article, article_name, article_registration  FROM article WHERE author_article =' . $_SESSION['user_id'];
    
        $results = $PDO -> query($querySQL);
    
        $allAuthorArticles = NULL;
        while($result = $results->fetch(PDO::FETCH_ASSOC)){
            $allAuthorArticles .= '<li><a href="http://localhost/Vieillissement/article/articleMitochondrie.php?article='.$result['id_article'].'">' . $result['article_name'] . '; publié le: ' . $result['article_registration'] . '</a></li></br>';
        };
    }
    catch(PDOException $pe){
        echo 'ERREUR: ' . $pe->getMessage();
    }
}
?>