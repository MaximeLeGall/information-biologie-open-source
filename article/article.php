<?php 
        require  __DIR__ . "../../header-footer/header.php";
        require  __DIR__ . "../../article/request-article.php";
        $pseudo = $_SESSION['user_pseudo'];
 ?>
<div class="article">
        <div class="article-content">
                <?php echo $article_content;?>
                <div class="infos-article">
                        <?php echo '<a class="author-article"> Auteur: ' . $author_article . '</a>';?>
                        <?php echo '<p class="date-article"> Publié le: ' . $article_registration . '</p>';?>
                </div>
                <div class="comments">
                        <div class="info-comments">
                                <h3>Commentaires</h3>
                        </div>
                        <div class="style-comments"></div>
                        <?php if(is_logged()):?>
                                <!-- <?php echo '<p id="user-pseudo">' . htmlspecialchars($pseudo) . '</p>';?> -->
                                <form action="" method="$_POST" id="form-new-comment">
                                        <div class="inline-pseudo-comment">
                                                <div class="item-pseudo"></div>
                                                <textarea type="text" rows="2" name="new_comment" class="new-comment-content" placeholder="Ajouter un commentaire"></textarea>
                                        </div>
                                        <div class="selected-comment"></div>
                                        <div class="focus"></div>
                                        <button type="submit" name="new_comment" class="b-comment" disabled>AJOUTER</button>
                                </form>
                        <?php endif?>
                </div> 
        </div>         
        <?php require_once __DIR__ . "../../article/companion-article.php" ?>
</div>
<script type="text/javascript"> var pseudo = <?php echo json_encode($pseudo)?></script>
<?php require_once __DIR__ . "../../header-footer/footer.php" ?>