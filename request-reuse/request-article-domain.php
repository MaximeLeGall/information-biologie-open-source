<?php
try{
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    ];

    $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
    
    $query = $PDO -> query('SELECT * FROM domain');
    
    $articles_domain = $query->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $pe){
    echo 'ERREUR: ' . $pe->getMessage();
}
?>