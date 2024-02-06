<?php 
require('php/database.php');

// On recupre l'ID de l'utilisateur connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

    // l'ID de l'utilisateur connecté
    $idOfUser = $_SESSION['id'];

    // On verifie que l'utilisateur connecté existe dans la base de donnes
    $checkIfUserExists = $db->prepare('SELECT * FROM users WHERE id =?');
    $checkIfUserExists->execute(array($idOfUser));
        //On recupere toutes les informations de l'utilisateur
    $userInfos = $checkIfUserExists->fetch();
    

    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $userInfos['pseudo']){

        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertnewpseudo = $db->prepare('UPDATE users SET pseudo = ? WHERE id = ?');
        $insertnewpseudo->execute(array($newpseudo, $idOfUser));
        $successMsg = "Modification enregistré avec succès";
    }

    if(isset($_POST['newlastname']) AND !empty($_POST['newlastname']) AND $_POST['newlastname'] != $userInfos['lastname']){

        $newlastname = htmlspecialchars($_POST['newlastname']);
        $insertnewlastname = $db->prepare('UPDATE users SET lastname = ? WHERE id = ?');
        $insertnewlastname->execute(array($newlastname, $idOfUser));
        $successMsg = "Modification enregistré avec succès";
    }

    if(isset($_POST['newfirstname']) AND !empty($_POST['newfirstname']) AND $_POST['newfirstname'] != $userInfos['firstname']){

        $newfirstname = htmlspecialchars($_POST['newfirstname']);
        $insertnewfirstname = $db->prepare('UPDATE users SET firstname = ? WHERE id = ?');
        $insertnewfirstname->execute(array($newfirstname, $idOfUser));
        $successMsg = "Modification enregistré avec succès";
    }


    if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $userInfos['email']){

        $newemail = htmlspecialchars($_POST['newemail']);
        $insertnewemail = $db->prepare('UPDATE users SET email = ? WHERE id = ?');
        $insertnewemail->execute(array($newemail, $idOfUser));
        $successMsg = "Modification enregistré avec succès";
    }

    if(isset($_POST['newpwd1']) AND isset($_POST['newpwd2']) AND !empty($_POST['newpwd1']) AND !empty($_POST['newpwd2'])){
        $newpwd1 = $_POST['newpwd1'];
        $newpwd2 = $_POST['newpwd2'];
    
        if($newpwd1 == $newpwd2){
            $hashedPassword = password_hash($newpwd1, PASSWORD_DEFAULT);
            $insertnewpwd = $db->prepare('UPDATE users SET pwd = ? WHERE id = ?');
            $insertnewpwd->execute(array($hashedPassword, $idOfUser));
            $successMsg = "Modification enregistré avec succès";
        } else {
            $errorMsg = "Les nouveaux mots de passe ne correspondent pas";
        }
    }
    

        if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {

            $sizemax = 2097152;
            $extension_valid = array('jpg', 'jpeg', 'gif', 'png');
            if ($_FILES['avatar']['size'] <= $sizemax) {

                $extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                if (in_array($extension_upload, $extension_valid)) {

                    $path = $userInfos['avatar'];
                    if(isset($_FILES['avatar'])){

                        $path = "images/avatar/" . $_SESSION['id'] . "." . $extension_upload;
                        $avatar_moving = move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
                        if ($avatar_moving) {

                            $insertavatar = $db->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                            $insertavatar->execute(array(
                                'avatar' => $_SESSION['id'] . "." . $extension_upload,
                                'id' => $_SESSION['id']
                            ));
                            $successMsg = "Modification enregistrée avec succès";

                            } else {
                                $errorMsg = "Erreur lors de l'enregistrement de l'avatar";
                            }

                    }else{
                        $path = "images/avatar/default/avatar_default.png";
                    }

                    

                } else {
                    $errorMsg = "Format de l'image invalide. Choisissez ces formats ('jpg', 'jpeg', 'gif' ou 'png')";
                }

            } else {
                $errorMsg = "Le fichier est trop volumineux, cela ne doit pas dépasser 2Mo.";
            }

        }



        
}
?>