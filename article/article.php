<?php 
        require  __DIR__ . "../../header-footer/header.php";
        require  __DIR__ . "../../article/request-article.php";
 ?>
<div class="article">
        <div class="article-content-comment">
                <div id="article-name">
                        <h1><?= $article_name ?></h1>
                </div>
                <div class="sharing">
                        <div class="popularity">
                        </div>
                        <ul class="social-bar">
                                <?php $share_url = urlencode( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>
                                <?php $arraySrcImage = find_image("social-network-printer/svg-logo/");?>
                                <?php foreach($arraySrcImage as $social_logo):?>
                                        <li><?php include  __DIR__ . "../$social_logo";?></li>
                                <?php endforeach;?>
                        </ul>
                </div>
                <div id="article-content">
                        <?php echo $article_content;?>
                </div>
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
                                                <p id="currentUserPseudo" style="display: none;"><?php echo htmlspecialchars($_SESSION['user_pseudo']);?></p>
                                                <div class="item-pseudo"></div>
                                                <textarea type="text" rows="2" name="new_comment" class="new-comment-content" placeholder="Ajouter un commentaire"></textarea>
                                        </div>
                                        <div class="selected-comment"></div>
                                        <div class="focus"></div>
                                        <button type="submit" class="b-comment" disabled>AJOUTER</button>
                                </form>
                        <?php endif?>
                        <div class="all-comments">
                                <div class="clone-comment-added" style="display: none;">
                                        <div class="item-pseudo"></div>
                                        <div class="user-comment">
                                                <div class="info-user-comment">
                                                        <p id="user-pseudo"><?php echo htmlspecialchars($_SESSION['user_pseudo']);?></p>
                                                        <a class="date"></a>
                                                </div>
                                                <p id="comment-content"></p>
                                        </div>
                                </div>
                                <?php foreach($all_comment as $comment):?>
                                        <div class="comment-added">
                                                <div class="item-pseudo"></div>
                                                <div class="user-comment">
                                                        <div class="info-user-comment">
                                                                <p id="user-pseudo"><?= htmlspecialchars($comment['user_pseudo'])?></p>
                                                                <a class="date">Le: <?= $comment['DATE_FORMAT(date_comment, "%d/%m/%Y")']?></a>
                                                        </div>
                                                        <p id="comment-content"><?= htmlspecialchars($comment['comment_article'])?></p>
                                                        <button type="button" class="add-response-comment" data-id="<?=$comment['id_comment']?>">R&Eacute;PONDRE</button>
                                                </div>
                                        </div>
                                <?php endforeach;?>
                        </div>
                </div> 
        </div>         
        <?php require_once __DIR__ . "../../article/companion-article.php" ?>
</div>
<script type="text/javascript"> 
        var allResponseComment = <?php echo json_encode($all_response_comment);?>;
        <?php if(is_logged()):?>
                var pseudo = <?php echo json_encode($_SESSION['user_pseudo']);?>;
                var idArticle = <?php echo json_encode($_GET['article']);?>;
                var userId = <?php echo json_encode($_SESSION['user_id']);?>;
        <?php endif?>
</script>
<script type="text/javascript" src="/Vieillissement/social-network-printer/share.js"></script>
<script type="text/javascript" src="/Vieillissement/article/article.js"></script>
<script type="text/javascript" src="/Vieillissement/request-ajax/request-add-comment.js"></script>
<?php require_once __DIR__ . "../../header-footer/footer.php" ?>