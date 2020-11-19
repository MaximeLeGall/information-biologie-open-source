<?php 
    require  __DIR__ . "../header-footer/header.php";
    require  __DIR__ . "../index/request-last-article.php";
?>

<div id="first-part">
    <h2>Derniers articles</h2>
    <div class="newArticles">
        <img class="arrowChangeArticle leftArrow" src="index-image\icon-arrière-50.png" alt="image flèche vers élement précedent">
        <div class="inlineArticle">
            <?php foreach($results as $result):?>
                    <div class="article">
                        <?php
                            //add tag </p> if not exist
                            $article_content = $result['SUBSTR(article_content, 1, 600)'];
                            $number_open_p = substr_count($article_content, '<p>');
                            $number_close_p = substr_count($article_content, '</p>');
                            $add_close_p = NULL;
                            if($number_open_p != $number_close_p){
                                $add_close_p = '</p>';
                            }
                        ?>
                        <a href="http://localhost/Vieillissement/article/article.php?article=<?php echo $result['id_article']?>"><?php echo $article_content, $add_close_p;?></a>
                    </div>
            <?php endforeach?>
        </div>
        <img class="arrowChangeArticle rightArrow" src="index-image\icon-avant-50.png" alt="image flèche vers élement précedent">
    </div>
</div>
<div id="seconde-part"></div>
<script src="index.js" type="text/javascript"></script>
<?php require_once __DIR__ . "../header-footer/footer.php"?>