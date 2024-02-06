<?php 
require('php/users/securityAction.php'); 
require('php/users/editprofileAction.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; ?>
<body>
    <?php include 'include/navbar.php'; ?>
    <br/><br/><br/>
            
        <div class="container-edit-profil">
                    <div class="card-edit-profil">
                        <p class="title-editer-profil">Modification des données utilisateur</p>
                        <br/>
                        <?php 
                            if(isset($successMsg)){
                                echo "<p style='color:green;text-align:left;font-weight:bold;'>".$successMsg."</p>";
                             }elseif(isset($errorMsg)){
                                echo "<p style='color:red;text-align:left;font-weight:bold;'>".$errorMsg."</p>";
                            }
                        ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="">Avatar </label>
                            <input type="file" name="avatar" placeholder="Ajouter un avatar"/><br/>
                            <label for="">Pseudo </label>
                            <input type="text" name="newpseudo" value="<?= $userInfos['pseudo']?>" placeholder="Pseudo"/><br/>
                            <label for="">Nom </label>
                            <input type="text" name="newlastname" value="<?= $userInfos['lastname']?>" placeholder="Nom"/><br/>
                            <label for="">Prenom </label>
                            <input type="text" name="newfirstname" value="<?= $userInfos['firstname']?>" placeholder="Prenom"/><br/>
                            <label for="">Email </label>
                            <input type="text" name="newemail" value="<?= $userInfos['email']?>" placeholder="Email"/><br/>
                            <label for="">Nouveau Mot de Passe </label>
                            <input type="password" name="newpwd1" placeholder=""/><br/>
                            <label for="">Confirmation du nouveau Mot de Passe </label>
                            <input type="password" name="newpwd2" placeholder=""/><br/>

                            <input type="submit" value="Mettre à jour"/><br/>

                        </form>
                        <a href="profile.php?id=<?=$idOfUser?>">Retour au Profil</a>
                           
                            <br/><br/>
                            
                        </div>

                    <br/>

        </div>

         </div>
        
         <br/><br/>
    <?php include 'bottom.php'; ?>
</body>
</html>