<?php
    require __DIR__ . "../header-footer/header.php";
    require __DIR__ . "../profile/user/request-account-modification.php";
    require __DIR__ . "../profile/user/request-added-article.php";
    require __DIR__ . "../profile/user/request-article-author.php";
    require __DIR__ . "../request-reuse/request-article-domain.php";
?>

<?php if(!is_logged()):?>
    <h1 style="text-align: center; margin: 80px 0;">Vous n'êtes pas connecté.</h1>
<?php else:?>
    <div class="profile">
        <div class="menu-profil">
            <input type="button" value="profil" id="profil" class="reading-companion-tab" onclick="switchButton(this)">
            <input type="button" value="message" id="message" class="reading-companion-tab" onclick="switchButton(this)">
            <input type="button" value="paramètres" id="parametres" class="reading-companion-tab" onclick="switchButton(this)">
            <?php if(user_status() !== 0):?>
                <input type="button" value="rédaction" id="redaction" class="reading-companion-tab" onclick="switchButton(this)">
            <?php endif;?>
            <?php if(user_status() === 2):?>
                <input type="button" value="home-page" id="home-page" class="reading-companion-tab reading-companion-tab--active" onclick="switchButton(this)">
            <?php endif;?>
        </div>
        <div class="dashboard-profil">
            <div class="reading-companion-panel profil-panel" name="profil">
                <div class="user">
                    <p class="user-pseudo">Pseudo: <?php echo htmlspecialchars($_SESSION['user_pseudo'])?></p>
                    <div class="user-status">
                        <?php 
                            if(user_status() !== null){
                                switch (user_status()){
                                    case 0:
                                        $status = "Utilisateur";
                                        break;
                                    case 1:
                                        $status = "Rédacteur";
                                        break;
                                
                                    case 2:
                                        $status = "Administrateur";
                                        break;
                                };
                                echo "Statut: " . $status;
                            };
                        ?>
                    </div>
                    
                </div>
                <div class="user-date">
                    <p>Votre dernière connexion a eu lieu le:  <?php echo htmlspecialchars($_SESSION['user_last_connection']);?></p>
                    <p>Date de création de compte: <?php echo htmlspecialchars($_SESSION['user_registration']);?></p>
                </div>
                <div class="last-comment">
                    <p>Votre dernier commentaire date du: </p>
                    <div class="comment"></div>
                </div>
                <div class="sujets-suivis">
                    Sujets suivis: 
                </div>
            </div>
            <div class="reading-companion-panel message-panel" name="message">

            </div>
            <div class="reading-companion-panel parametres-panel" name="parametres">
                <div class="all-changes">
                    <div class="change">
                        <p class="current-information">Pseudo actuel: <?php echo htmlspecialchars($_SESSION['user_pseudo'])?></p>
                        <?php $modifyPseudoSetting = "'Modifié:</br> mon pseudo', 'Je confirme', '.background-modification', true, 'new_pseudo'";?>
                        <button type="button" class="b-change" onclick="modify(<?php echo $modifyPseudoSetting?>)">Modifier pseudo</button>
                    </div>
                    <div class="change">
                        <p class="current-information">E-mail actuel: <?php echo htmlspecialchars($_SESSION['user_email'])?></p>
                        <?php $modifyEmailSetting = "'Modifié:</br> l\'adresse email', 'Je confirme', '.background-modification', true, 'new_email'";?>
                        <button type="button" class="b-change"  onclick="modify(<?php echo $modifyEmailSetting?>)">Modifier e-mail</button>
                    </div>
                    <div class="change">
                        <p class="current-information">Statut actuel: <?php echo $status?></p>
                        <button type="button" class="b-change" onclick="modify('Demande:</br> devenire rédacteur', 'Je confirme', '.background-modification', false)">Devenir rédacteur</button>
                        <!-- <button type="button" class="b-change" onclick="modify('Demande:</br> devenire administrateur', 'Je confirme', '.background-modification', false)">Devenir administrateur</button> -->
                    </div>
                </div>
                <div class="delete-account">
                    <p class="current-information">Suppression du compte: <?php echo htmlspecialchars($_SESSION['user_email'])?></p>
                    <button type="button" class="b-change" onclick="delete_account(this)">Supprimer</button>
                </div>
                <div class="background-modification" style="display: none">
                    <form class="modification-window" action="profile.php" method="POST">
                        <h2 class="information"></h2>
                        <p class="invalide" style="visibility:<?php if(isset($invalid_pseudo) || isset($invalid_email)){echo 'visible;';}else{echo 'hidden;';}?>"><?php if(isset($invalid_pseudo)){echo $invalid_pseudo;}elseif(isset($invalid_email)){echo $invalid_email;}?></p>
                        <button type="submit" id="b-confirmation" name="account_modification"></button>
                    </form>
                </div>
            </div>
            <?php if(user_status() !== 0):?>
                <div class="reading-companion-panel redaction-panel" name="redaction">
                    <div>
                        <p>Nombre d'article écrits: <?php echo $numberArticles?></p>
                        <p>Liste des articles:</p>
                        <ul>
                            <?php echo $allAuthorArticles;?>
                        </ul>
                        <form action="profile.php" method="POST" id="new-article">
                            <div class="information-new-article">
                                <p>Rédigé un nouvelle article:</p>
                                <div class="field-choice">
                                    <p>Sélectionné le domaine de l'article:</p>
                                    <select form="new-article" name="article_domain" id="field-name">
                                        <option value="">Choisir le domaine</option>
                                        <?php foreach($articles_domain as $article_domain):?>
                                            <option value="<?= $article_domain['id_domain']?>"><?= $article_domain['article_domain_name']?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                            </div>
                            <div class="article-presentation"></div>
                            <input type="text" form="new-article" name="article_name" class="article-name" style="display: none;">
                            <textarea type="text" form="new-article" name="article_content" class="data-article" style="display: none;"></textarea>
                            <button type="submit" form="new-article" name="send_article" id="valide-article" style="display: none;">Valider</button>
                        </form>
                        <div class="wirting-article">
                            <textarea type="text" id="textarea" placeholder="Vous pouvez écrire ici."></textarea>
                            <div class="b-article">
                                <button type="button" class="h1" value="h1">Titre principale</button>
                                <button type="button" class="h2" value="h2">Autre titre</button>
                                <button type="button" class="p" value="p">Paragraphe</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif?>
            <?php if(user_status() === 2):?>
                <div class="reading-companion-panel home-page-panel reading-companion-panel--active" name="home-page">
                    <div class="home-page-content">
                        <h2>Modificationt élément page d'acceuil</h2>
                        <h3>Deuxième partie</h3>
                        <div class="elements">
                            <form action="" class="change-home-page">
                                <div class="col">
                                    <div class="form-group">
                                        <select id="data-type" class="form-control linked-select" data-target="#domaine" data-source="profile/admin/request-home-page.php?type=domaine&filter=$id">
                                            <option value="0">Type de données</option>
                                            <option value="image">image</option>
                                            <option value="article">article</option>
                                            <option value="graphic">graphique</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select id="domaine" class="form-control linked-select" data-target="#element" data-source="profile/admin/request-home-page.php?type=element&filter=$id">
                                            <option value="0">Domaine</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select id="element" class="form-control linked-select">
                                            <option value="0">Elément</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <div class="element-part2 first-element"></div>
                            <div class="element-part2 seconde-element"></div>
                            <div class="element-part2 third-element"></div>
                            <div class="element-part2 fourth-element"></div>
                            <div class="element-part2 fifth-element"></div>
                            <div class="element-part2 sixth-element"></div>
                        </div>
                    </div>
                </div>
            <?php endif?>
        </div>
    </div>
<?php endif;?>
<script src="/Vieillissement/profile/profile.js"></script>
<script src="/Vieillissement/request-ajax/request-change-home-page.js"></script>
<?php 
    if(isset($invalid_pseudo)){
        echo '<script> modify(' . $modifyPseudoSetting . ') </script>';
    }
    if(isset($invalid_email)){
        echo '<script> modify(' . $modifyEmailSetting . ') </script>';
    }
?>
<?php require __DIR__ . "../header-footer/footer.php";?>