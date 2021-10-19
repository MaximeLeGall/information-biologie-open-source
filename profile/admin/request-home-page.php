<?php
require __DIR__.'../../../account/db-config.php';
try{
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    ];
    $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);

    define('DATA_TYPE',[
        'images' => 'id_image, name_image',
        'article' => 'id_article, article_name',
        'graphic' => 'id_graphic, name_graphic'
        ]
    );
    
    $type = empty($_GET['type'])? 'domaine' : $_GET['type'];


    if($type === 'domaine'){
        $table_1 = 'domain';
        $table_type = $_GET['filter'];
        $result = $PDO->query("SELECT DISTINCT id_domain, domain_name FROM $table_1 INNER JOIN $table_type ON $table_1.id_domain = $table_type.fk_domain");
    }
    
    if($type === 'element'){
        $fk_domain = $_GET['filter'];
        $table_type = $_GET['previousFilter'];
        foreach(DATA_TYPE as $key => $values) {
            if($table_type === $key){
                $get_name_id = $values;
            }
        }
        $result = $PDO->query("SELECT $get_name_id FROM $table_type WHERE fk_domain = $fk_domain");
    }

    $items = $result->fetchAll();
    header('Content-Type: application/json');
    echo json_encode(array_map(function ($item){
        return[
            'label' => $item[1],
            'value' => $item[0]
        ];
    }, $items));
    
}
catch(PDOException $pe){
    echo 'ERREUR: ' . $pe->getMessage();
}
?>