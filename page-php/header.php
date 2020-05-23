<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <?php
            $itemSelected = explode("/", $_SERVER['SCRIPT_NAME']);
            if(in_array("acceuil", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="acceuil.css">
            <?php elseif(in_array("article", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="articles.css">
            <?php endif?>
        
        <title>vieillissement</title>
    </head>
    <body> 
        <div class="carousel">
            <p>LOGO</p>
        </div>
        
        <header>
            <nav class="menu">
                <ul>
                    <li><a href="http://localhost:8000/acceuil/acceuil.php">acceuil</a></li>
                    <li><a href="#">cathégorie</a></li>
                    <li><a href="#">news</a></li>
                    <li><a href="#">matériel</a></li>
                    <li><a href="#">nutrition <br> &amp; cosmétique</a></li>
                </ul>
            </nav>
        </header>    
    