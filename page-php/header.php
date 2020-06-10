<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../page-php/header-footer.css">
        <?php
                // add style file
            $itemSelected = preg_split("/(\/|\.)/", $_SERVER['SCRIPT_NAME']);
            if(in_array("index", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="index.css">
            <?php elseif(in_array("article", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="articles.css">
            <?php endif?>
        
        <title>vieillissement</title>
    </head>
    <body> 
        <div class="overlay">
            <div class="overlay-words">
                <span class="overlay-css js-overlay-active">ADN</span>
                <span class="overlay-css js-overlay-active">mitochondrie</span>
                <span class="overlay-css js-overlay-active">nutrition</span>
                <span class="overlay-css js-overlay-active">maladie</span>
                <span class="overlay-css js-overlay-active">ADN</span>
                <span class="overlay-css js-overlay-active">cellulaire</span>
                <span class="overlay-css js-overlay-active">et</span>
                <span class="overlay-css js-overlay-active">vieillissement</span>
                <span class="overlay-css js-overlay-active">cellulaire</span>
                <span class="overlay-css js-overlay-active">cancer</span>
                <span class="overlay-css js-overlay-active">molécules</span>
            </div>

        </div>
        
        <header>
            <nav class="menu" data-sticky="sticky">
                <ul>
                    <li><a href="http://localhost:8000/index.php">acceuil</a></li>
                    <li><a href="#">cathégorie</a></li>
                    <li><a href="#">news</a></li>
                    <li><a href="#">matériel</a></li>
                    <li><a href="#">nutrition <br> &amp; cosmétique</a></li>
                </ul>
            </nav>
        </header>    
    