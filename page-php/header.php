<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../page-php/header-footer.css">
            
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
        <?php 
            $srcImage = "page-php/image-overlay-1920/";
            $newpath = "../";
            $loop = 0;
            if(!file_exists($srcImage)){
                while(!file_exists($srcImage)){
                    $srcImage = $newpath . $srcImage;
                    $newpath .= $newpath;
                }
            }
            $images = array_diff(scandir($srcImage), ["..", "."]);
            $arraySrcImage = [];
            foreach ($images as $image){
                array_push($arraySrcImage, $srcImage . $image);
            }
        ?>
        <script>
            var arraySrcImage = <?php echo json_encode($arraySrcImage); ?>;
        </script>
        
        <div class="carousel">
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
                    <li><a href="http://localhost:8000/index.php">accueil</a></li>
                    <li><a href="#">cathégorie</a></li>
                    <li><a href="#">news</a></li>
                    <li><a href="#">matériel</a></li>
                    <li><a href="#">nutrition <br> &amp; cosmétique</a></li>
                </ul>
            </nav>
        </header>    
    