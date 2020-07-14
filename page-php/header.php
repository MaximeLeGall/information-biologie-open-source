<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../page-php/header-footer.css">
        <!-- (function animationBackgroundOverlay(){
            var overlayImage = document.querySelector(".overlay");
            var arraySrcImage = [];
            var i = 1;
            var srcImage = "image-overlay-1920/" + i + ".jpg";
            console.log(url(srcImage))
            while(url(srcImage) != undefined && i < 10){
                srcImage = "image-overlay-1920/" + i + ".jpg";
                arraySrcImage.push(srcImage)
                // console.log(overlayImage.style.background-image)
                i++
            }
            console.log(arraySrcImage)
        }()); -->
            
                <!--  add style file -->
            <?php $itemSelected = preg_split("/(\/|\.)/", $_SERVER['SCRIPT_NAME']);
            if(in_array("index", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="index.css">
            <?php elseif(in_array("article", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="articles.css">
            <?php endif?>
        
        <title>vieillissement</title>
    </head>
    <body>
        <div class="overlay imageOverlay">
            <div class="overlay-words">
                <span class="overlay-css">neurodégénératives</span>
                <span class="overlay-css">et</span>
                <span class="overlay-css">maladies</span>
                <span class="overlay-css">molécules</span>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">et cancer</span>
                <br>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">molécules</span>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">et</span>
                <span class="overlay-css">neurodégénératives</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">maladies</span>
                <br>
                <span class="overlay-css">molécules</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">maladies</span>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">et</span>
                <span class="overlay-css">neurodégénératives</span>
                <br>
                <span class="overlay-css">neurodégénératives</span>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">et</span>
                <span class="overlay-css">molécules</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">maladies</span>
                <span class="overlay-css">antivieillissement</span>
                <br>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">maladies</span>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">neurodégénératives</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">molécules</span>
                <span class="overlay-css">et</span>
                <br>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">neurodégénératives</span>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">maladies</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">et</span>
                <span class="overlay-css">molécules</span>
                <br>
                <span class="overlay-css">et</span>
                <span class="overlay-css">neurodégénératives</span>
                <span class="overlay-css">maladies</span>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">molécules</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">nutrition</span>
                <br>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">maladies</span>
                <span class="overlay-css">neurodégénératives</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">et</span>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">molécules</span>
                <br>
                <span class="overlay-css">neurodégénératives</span>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">et</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">maladies</span>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">molécules</span>
                <br>
                <span class="overlay-css">molécules</span>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">maladies</span>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">et</span>
                <span class="overlay-css">neurodégénératives</span>
                <br>
                <span class="overlay-css">antivieillissement</span>
                <span class="overlay-css">molécules</span>
                <span class="overlay-css">neurodégénératives</span>
                <span class="overlay-css">vieillissement</span>
                <span class="overlay-css">nutrition</span>
                <span class="overlay-css">et cancer</span>
                <span class="overlay-css">et</span>
                <span class="overlay-css">cellulaire</span>
                <span class="overlay-css">maladies</span>
            </div>

        </div>
        
        <header>
            <nav class="menu" data-sticky="sticky">
                <ul>
                    <li><a href="http://localhost:8000/index.php">accueil</a></li>
                    <li><a href="#">cathégorie</a></li>
                    <li><a href="#">news</a></li>
                    <li><a href="#">matériel</a></li>
                    <li><a href="#">nutrition <br> &amp; cosmétique</a></li>
                </ul>
            </nav>
        </header>    
    