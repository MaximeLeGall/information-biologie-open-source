<html>
    <head>
        <pre>
            <?php print_r($_SERVER) ?>
        </pre>
        <?php
            $itemSelected = substr($_SERVER['SCRIPT_NAME'], 1); 
        ?>
        <link rel="stylesheet" type="text/css" href="articles.css">
        <title>vieillissement</title>
    </head>
    <body> 
        <div class="carousel">
            <p>LOGO</p>
        </div>
        
        <header>
            <nav class="menu">
                <ul>
                    <li><a href="acceuil/acceuil.php">acceuil</a></li>
                    <li><a href="#">cathégorie</a></li>
                    <li><a href="#">news</a></li>
                    <li><a href="#">matériel</a></li>
                    <li><a href="#">nutrition <br> &amp; cosmétique</a></li>
                </ul>
            </nav>
        </header>    
    