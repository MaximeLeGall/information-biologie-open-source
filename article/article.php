<?php 
        require  __DIR__ . "../../header-footer/header.php";
        require  __DIR__ . "../../article/request-article.php";
        if(isset($_SESSION['user_pseudo'])){
                $pseudo = $_SESSION['user_pseudo'];
        } 
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
                                <div class="style-info-comments"></div>
                        </div>
                        <?php if(is_logged()):?>
                                <form action="#" class="form-new-comment">
                                        <div class="inline-pseudo-comment">
                                                <div class="item-pseudo"></div>
                                                <textarea type="text" rows="2" name="new_comment" class="new-comment-content" placeholder="Ajouter un commentaire"></textarea>
                                        </div>
                                        <div class="selected-comment"></div>
                                        <div class="focus"></div>
                                        <button type="submit" class="b-comment" disabled>AJOUTER</button>
                                </form>
                        <?php endif?>
                        <div class="all-comments">
                                <?php foreach($all_comment as $comment):?>
                                        <div class="comment-added">
                                                <div class="item-pseudo"></div>
                                                <div class="user-comment">
                                                        <div class="info-user-comment">
                                                                <p id="user-pseudo"><?= $comment['user_pseudo']?></p>
                                                                <a class="date">Le: <?= $comment['DATE_FORMAT(date_comment, "%d/%m/%Y")']?></a>
                                                        </div>
                                                        <p id="comment-content"><?= $comment['comment_article']?></p>
                                                        <button type="button" class="add-resonse-comment">R&Eacute;PONDRE</button>
                                                </div>
                                        </div>
                                <?php endforeach;?>
                        </div>
                </div> 
        </div>         
        <?php require_once __DIR__ . "../../article/companion-article.php" ?>
</div>
<script type="text/javascript"> 
        var pseudo = <?php if(isset($pseudo)){echo json_encode($pseudo);}else{echo "undefined";}?>;
        var idArticle = <?php echo json_encode($_GET['article']);?>;
        var userId = <?php if(isset($_SESSION['user_id'])){echo json_encode($_SESSION['user_id']);}else{echo 'undefined';}?>;
</script>
<script type="text/javascript" src="/Vieillissement/request-ajax/request-newcomment.js"></script>
<?php require_once __DIR__ . "../../header-footer/footer.php" ?>