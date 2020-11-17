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
                <div class="comments">
                        <?php if(is_logged()):?>
                                <form action="article/article.php" method="$_POST" id="form-new-comment">
                                        <?php echo '<p class="user-pseudo"> Pseudo: ' . $_SESSION['user_pseudo'] . '</p>';?>
                                        <textarea type="text" rows="2" name="new_comment" class="new-comment-content" placeholder="Ajouter un commentaire"></textarea>
                                        <div class="selected-comment"></div>
                                        <div class="focus"></div>
                                </form>
                        <?php endif?>
                </div> 
        </div>         
        <?php require_once __DIR__ . "../../article/companion-article.php" ?>
</div>
<?php require_once __DIR__ . "../../header-footer/footer.php" ?>