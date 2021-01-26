<?php 
    function find_image($srcImage){
        $newpath = "../";
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
        return $arraySrcImage
;    }
?>