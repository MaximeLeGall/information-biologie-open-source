<?php
    require  __DIR__ . "../header-footer/header.php";
?>

<?php if(!is_logged()):?>
    <h1 style="text-align: center; margin: 80px 0;">Vous n'êtes pas connecté.</h1>
<?php else:?>
    <div class="profile">
        <div class="menu-profil">
            <input type="button" value="profil" id="profil" class="reading-companion-tab reading-companion-tab--active" onclick="switchButton(this)">
            <input type="button" value="message" id="message" class="reading-companion-tab" onclick="switchButton(this)">
            <input type="button" value="paramètres" id="parametres" class="reading-companion-tab" onclick="switchButton(this)">
        </div>
        <div class="dashboard-profil">
            <div class="reading-companion-panel reading-companion-panel--active profil-panel" name="profil">
                <div class="user">
                    <p class="user-pseudo">Pseudo: <?php echo htmlspecialchars($_SESSION['user_pseudo'])?></p>
                    <div class="user-status">
                        <?php 
                            if(user_status() !== null){
                                switch (user_status()){
                                    case 0:
                                        echo "Status: Utilisateur";
                                        break;
                                    case 1:
                                        echo "Status: Rédacteur";
                                        break;
                                
                                    case 2:
                                        echo "Status: Administrateur";
                                        break;
                                };
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

            </div>
        </div>
    </div>
<?php endif;?>

<?php require __DIR__ . "../header-footer/footer.php";?>