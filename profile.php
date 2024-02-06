<?php 
require('php/users/securityAction.php');
require('php/users/editprofileAction.php'); 
require('php/users/showUserProfilAction.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; ?>
<body>
    <?php include 'include/navbar.php'; ?>
    <br/><br/><br/>
            
    <div class="container-profil">
        
        <?php 
        if(isset($errorMsg)){
            echo "<p>".$errorMsg."</p>";
        }

        if(isset($getUsersQuestion)){
        ?>
        <div class="card-profil">
            <h1 class="h1-profil">Bonjour @<?=$user_pseudo ?></h1>
            <?php
            if(!empty($userInfos['avatar'])){
                $path = "images/avatar/" . $userInfos['avatar'];
            } else {
                $path = "images/avatar/default/avatar_default.png";
            }
            ?>
            <img src='<?= $path ?>' class='card-img-top-profil' alt='...'>
            <div class="card-header-profil">
                <h3>Pseudo: <?=$user_pseudo ?></h3>
                <h3>Nom: <?=$user_lastname ?></h3>
                <h3>Prénom: <?=$user_firstname ?></h3>
                <h3>Email: <?=$user_email ?></h3>
                <h3>Votre date d'anniversaire: <?=$user_birthday ?></h3>
                <h3>Role: <?=$user_role?></h3>
                <h3>Date d'inscription: <?=$user_date?></h3>
                <h3>#<?=$user_signing ?></h3> 
            </div>
            <div class="modify-card-profil">
                <?php 
                    if ($userInfos['id'] == $_SESSION['id']) {
                ?>
                    <a href="edit-profile.php">Editer mon profil</a>
                    <a href="#">Supprimer mon compte</a>
                <?php
                }
                ?>


            </div>
        </div>

        <br/>

    </div>

    <?php
    while($question = $getUsersQuestion->fetch()){
    ?>
    <br/>

    <?php
    }
    ?>
    <?php
    }
    ?>
</div>
        <br/><br/>
    <?php include 'bottom.php'; ?>
</body>
</html>
