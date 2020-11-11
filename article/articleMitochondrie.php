<?php 
        require  __DIR__ . "../../header-footer/header.php";
        require  __DIR__ . "../../article/request-article.php"
 ?>

<div class="article">
        <div id="article-content">
                <?php echo $article_content;?>
                <div class="infos-article">
                        <?php echo '<a class="author-article"> Auteur: ' . $author_article . '</a>';?>
                        <?php echo '<p class="date-article"> Publié le: ' . $article_registration . '</p>';?>
                </div>
        </div>
        <?php require_once __DIR__ . "../../article/companion-article.php" ?>
</div>

<?php require_once __DIR__ . "../../header-footer/footer.php" ?>