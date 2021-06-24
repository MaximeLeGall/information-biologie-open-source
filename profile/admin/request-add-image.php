<?php
require __DIR__.'../../../account/db-config.php';
try{
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    ];
    $PDO = new PDO($DB_BSN, $DB_USER, $DB_PASS);
    $result = $PDO->prepare('INSERT INTO images (name_image, size, type, bin) VALUES(?,?,?,?)');
    $result -> bindValue(1, $_FILES['image']['name'], PDO::PARAM_STR);
    $result -> bindValue(2, $_FILES['image']['size'], PDO::PARAM_INT);
    $result -> bindValue(3, $_FILES['image']['type'], PDO::PARAM_STR);
    $result -> bindValue(4, file_get_contents($_FILES['image']['tmp_name']), PDO::PARAM_LOB);
    $result -> execute();
}
catch(PDOException $pe){
    echo 'ERREUR: ' . $pe->getMessage();
}
?>