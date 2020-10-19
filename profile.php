<?php
    require  __DIR__ . "../header-footer/header.php";
?>

<?php if(!is_logged()):?>
    <h1 style="text-align: center; margin: 80px 0;">Vous n'êtes pas connecté.</h1>
<?php else:?>
    <div class="profile">
        <div class="menu-profile">
            <input type="button" value="profil" class=".reading-companion-tab--active">
            <input type="button" value="message" onclick="switchButton(this)">
            <input type="button" value="paramètres" onclick="switchButton(this)">
            <input type="button" value="statut" onclick="switchButton(this)">
        </div>
        <div class="dashboard-profile .reading-companion-panel--active">
            <?php if(user_status() !== null){
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
            };?>
        </div>
        <div class=".reading-companion-panel">

        </div>
        <div class=".reading-companion-panel">

        </div>
        <div class=".reading-companion-panel">

        </div>
    </div>
<?php endif;?>

<?php require __DIR__ . "../header-footer/footer.php";?>