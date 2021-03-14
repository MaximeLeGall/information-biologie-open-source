<?php
    require_once __DIR__ . "../../account/connection-verification.php";
    init_php_session();
    if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'logout'){
        clean_php_session();
        header('Location: http://localhost/Vieillissement/index.php');
        exit;
    }
    require_once __DIR__ . "../../function-find-image/find-image.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang = "fr">
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@300;400;900&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="#">
        <link rel="stylesheet" type="text/css" href="/Vieillissement/header-footer/header-footer.css">
            
                <!--  add CSS file -->
            <?php $itemSelected = preg_split("/(\/|\.)/", $_SERVER['SCRIPT_NAME']);
            if(in_array("index", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="index.css">
            <?php elseif(in_array("article", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="articles.css">
            <?php elseif(in_array("connection-page", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="account/connection.css">
            <?php elseif(in_array("profile", $itemSelected)):?>
                <link rel="stylesheet" type="text/css" href="user-informations/user-informations.css">
            <?php endif?>
        <title>vieillissement</title>
    </head>
    <body>
        <?php 
            $arraySrcImage = find_image("header-footer/image-overlay-1920/");
        ?>
        <script>
            var arraySrcImage = <?php echo json_encode($arraySrcImage); ?>;
        </script>

        <div class="carousel">
            <div class="header-profile-menu" onmouseleave="desactivationProfileOption('.header-profile-buttons', '#connection-status')">
                <a id="connection-status" <?php if(!is_logged()){echo "href='http://localhost/Vieillissement/connection-page.php'";}?> onmouseenter="activationProfileOption('.header-profile-buttons', '#connection-status')">
                    <?php if(is_logged()):?>
                        <?= "Bienvenue " . htmlspecialchars($_SESSION['user_pseudo']);?>
                    <?php else:?>
                        Se Connecter
                    <?php endif;?>
                    <div class="indication-status" style="background-color:<?php if(is_logged()){echo '#77CB9B';}else{echo 'red';}?>" ></div>
                </a>
                <?php if(is_logged()):?>
                    <ul  class="header-profile-buttons" style="visibility: hidden">
                        <form action="" method="POST" id="header-profile-button"></form>
                        <li><button>Messages</button></li>
                        <li><button type="button" onclick="window.location.href='http://localhost/Vieillissement/profile.php'">Profil</button></li>
                        <li><button type="submit" name="action" value="logout" form="header-profile-button">Se déconnecter</button></li>
                    </ul>
                <?php endif?>
            </div>
            <div class="backgroud-image-carousel">
            </div>
            <div class="overlay">
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
        </div>
        
        
        <header>
            <nav class="menu" data-sticky="sticky">
                <ul>
                    <li><a href="http://localhost/Vieillissement/index.php">accueil</a></li>
                    <li><a href="#">cathégorie</a></li>
                    <li><a href="#">news</a></li>
                    <li><a href="#">matériel</a></li>
                    <li><a href="#">nutrition <br> &amp; cosmétique</a></li>
                </ul>
            </nav>
        </header>