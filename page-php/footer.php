        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2"></div>
                    <div class="col-3"></div>
                </div>
            </div>
        </footer>
    </body>
    <?php 
        $arraySrcImage = [];
        $i = 1;
        $srcImage = "page-php/image-overlay-1920/" . $i . ".jpg";
        while(file_exists($srcImage)){
            array_push($arraySrcImage, $srcImage);
            $i++;
            $srcImage = "page-php/image-overlay-1920/" . $i . ".jpg";
        }
    ?>
    <script>
        var arraySrcImage = <?php echo json_encode($arraySrcImage); ?>;
    </script>
    <script src="../page-php/functions-animations-pages.js" type="text/javascript"></script>
</html>