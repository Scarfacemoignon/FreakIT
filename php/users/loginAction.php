<?php 
session_start();
require('php/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){
    //On verifie si le User a bien rempli le formulaire
    if(!empty($_POST['pseudo']) && !empty($_POST['pwd'])){

        //les id de l'administrateur
        $default_pseudo = "admin";
        $default_pwd = "admin12345";
    
       //Les donnees de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']); 
        //on ne crypte pas le mot de passe
        $user_password = htmlspecialchars($_POST['pwd']);

        //Si les identifiants renseignés correspondent aux identifiants de l'administrateur, on redirige vers la page d'administrateur
        if($user_pseudo == $default_pseudo && $user_password == $default_pwd){
            $_SESSION['pseudo'] = $user_pseudo;
            header('Location: administrateur.php');
        }else{
            $errorMsg = "Pseudo ou mot de passe incorrect";
        }
        //on verifie si l'utilisateur existe dans la base de donnee
        $checkIfUserExists = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
        $checkIfUserExists->execute(array($user_pseudo));

        //rowcount permet de compter les donnees de l'utilisateur recupere
        if($checkIfUserExists->rowCount() > 0){

            $userInfos = $checkIfUserExists->fetch();
            //on verife que le mot de passe crypté et le mot de passe renseigné
            if(password_verify($user_password, $userInfos['pwd'])){
                //On authentifie l'utilisateur sur le site et recupere les infos de l'utilisateur dans les variables de session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['pseudo'] = $userInfos['pseudo'];
                $_SESSION['firstname'] = $userInfos['firstname'];
                $_SESSION['lastname'] = $userInfos['lastname'];
                $_SESSION['gender'] = $userInfos['gender'];
                $_SESSION['email'] = $userInfos['email'];
                $_SESSION['pwd'] = $userInfos['pwd'];
                $_SESSION['birthday'] = $userInfos['birthday'];
                $_SESSION['signature'] = $userInfos['signature'];
                
                //On rediriger vers la page d'accueil si le user est authentifié
                header('Location: profile.php?id='.$userInfos['id']);

            }else{
                $errorMsg = "<p style='color:red;text-align:left;font-weight:bold;'>Password is not correct. </p>";
            }


        }else{
            // on verifie si le pseudo correspond
            $errorMsg = "<p style='color:red;text-align:left;font-weight:bold;'>Pseuso is not correct. </p>";
        }    
        
    }else{
        $errorMsg = "Please fill out all the fields";
    }
}

?>