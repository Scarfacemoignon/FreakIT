<?php 
require('php/users/membresAction.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; ?>
<body>
    <?php include 'include/navbar.php'; ?>
    <br/><br/><br/>
        <div class="container-signup">
                <?php 
                foreach ($displayUser as $user) {

                    $path = NULL;
                    if(!empty($user['avatar'])){
                        $path = "images/avatar/" . $user['avatar'];
                    } else {
                        $path = "images/avatar/default/avatar_default.png";
                    }

                    $role = ''; // Initialisez $role avant la clause switch

                    switch ($user['role']) {
                        case 0:
                            $role = 'Utilisateur';
                            break;
                        case 1:
                            $role = 'Administrateur';
                            break;
                        // Ajoutez d'autres cas au besoin
                    }
                    ?>
                    <div class="card-membre">
                        <?php
                       
                        ?>
                        <img src='<?= $path ?>' class='card-img' alt='...'>
                        <div class="voir-profil">
                            <p><?= $user['pseudo']."<br>" ?></p>
                            <p class="role-p"><?= $role."<br>" ?></p>
                            <h4><b><a href="profile.php?id=<?= $user['id'] ?>" class="membres-a">Voir profil</a></b></h4>  
                        </div>
                    </div>
                    
                <?php
                }
                ?>
          </div>
     
</body>
</html>
