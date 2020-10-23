<?php
    require __DIR__ . "../header-footer/header.php";
    require __DIR__ . "../user-informations/account-modification.php";
?>

<?php if(!is_logged()):?>
    <h1 style="text-align: center; margin: 80px 0;">Vous n'êtes pas connecté.</h1>
<?php else:?>
    <div class="profile">
        <div class="menu-profil">
            <input type="button" value="profil" id="profil" class="reading-companion-tab" onclick="switchButton(this)">
            <input type="button" value="message" id="message" class="reading-companion-tab" onclick="switchButton(this)">
            <input type="button" value="paramètres" id="parametres" class="reading-companion-tab reading-companion-tab--active" onclick="switchButton(this)">
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
            <div class="reading-companion-panel parametres-panel reading-companion-panel--active" name="parametres">
                <div class="all-changes">
                    <div class="change">
                        <p class="current-information">Pseudo actuel: <?php echo htmlspecialchars($_SESSION['user_pseudo'])?></p>
                        <button type="button" class="b-change" onclick="modify('Modifié:</br> mon pseudo', 'Je confirme', '.background-modification', true, 'new_pseudo')">Modifier pseudo</button>
                    </div>
                    <div class="change">
                        <p class="current-information">E-mail actuel: <?php echo htmlspecialchars($_SESSION['user_email'])?></p>
                        <button type="button" class="b-change" onclick="modify('Modifié:</br> l\'adresse email', 'Je confirme', '.background-modification', true, 'new_email')">Modifier e-mail</button>
                    </div>
                    <div class="change">
                        <p class="current-information">Statut actuel: <?php echo ($status)?></p>
                        <button type="button" class="b-change" onclick="modify('Demande:</br> devenire rédacteur', 'Je confirme', '.background-modification', false)">Devenir rédacteur</button>
                        <!-- <button type="button" class="b-change" onclick="modify('Demande:</br> devenire administrateur', 'Je confirme', '.background-modification', false)">Devenir administrateur</button> -->
                    </div>
                </div>
                <div class="delete-account">
                    <p class="current-information">Suppression du compte: <?php echo htmlspecialchars($_SESSION['user_email'])?></p>
                    <button type="button" class="b-change" onclick="delete_account(this)">Supprimer</button>
                </div>
                <div class="background-modification" style="display: <?php if(isset($invalid_pseudo) || isset($invalid_email)){ echo 'block;';}else{ echo 'none;';}?>">
                    <form class="modification-window" action="profile.php" method="POST">
                        <h2 class="information"></h2>
                        <p class="invalide" style="visibility:<?php if(isset($invalid_pseudo) || isset($invalid_email)){echo 'visible;';}else{echo 'hidden;';}?>"><?php if(isset($invalid_pseudo)){echo $invalid_pseudo;}elseif(isset($invalid_email)){echo $invalid_email;}?></p>
                        <button type="submit" id="b-confirmation" name="account_modification"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
<script src="/Vieillissement/user-informations/user-informations.js"></script>
<?php require __DIR__ . "../header-footer/footer.php";?>