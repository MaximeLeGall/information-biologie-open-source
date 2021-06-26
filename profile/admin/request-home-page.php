<?php
require __DIR__.'../../../account/db-config.php';
try{
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    ];
    $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
    
    $type = empty($_GET['type'])? 'domaine' : $_GET['type'];

    if($type === 'domaine'){
        $table_1 = 'domain';
        $table_2 = $_GET['filter'];
    }
    $result = $PDO->query("SELECT DISTINCT id_domain, domain_name FROM $table_1 INNER JOIN $table_2 ON $table_1.id_domain = $table_2.fk_domain");
    
    // if(isset($_POST['change-home-page'])){
    //     $query = $PDO->query('UPDATE home_page_part2 SET  ' .  $varNewElement . '  WHERE position_element = ' . $positionElement);
    // }
    $items = $result->fetchAll();
    header('Content-Type: application/json');
    echo json_encode(array_map(function ($item){
        return[
            'label' => $item['domain_name'],
            'value' => $item['id_domain']
        ];
    }, $items));
}
catch(PDOException $pe){
    echo 'ERREUR: ' . $pe->getMessage();
}
?>