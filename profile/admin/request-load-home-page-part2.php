<?php
require __DIR__.'../../../account/db-config.php';
try{
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    ];
    $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
    
    $result = $PDO->query("SELECT position_element, article_name, name_graph, name_image FROM home_page_part2 INNER JOIN article ON home_page_part2.fk_article = article.id_article INNER JOIN graphic ON home_page_part2.fk_graphic = graphic.id_graphic INNER JOIN images ON home_page_part2.fk_image = images.id_image");
    $result = $result->fetchAll();
    echo $result;
}
catch(PDOException $pe){
    echo 'ERREUR: ' . $pe->getMessage();
}
?>