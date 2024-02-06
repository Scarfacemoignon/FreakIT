<?php 

require('database.php');

//Validation du formulaire
if(isset($_POST['validate'])){
    //On verifie si le User a bien rempli le formulaire
    if(!empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) 
    && !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['pwd']) 
    && !empty($_POST['birthday']) && !empty($_POST['signature'])){

       //Les donnees de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']); 
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_gender = htmlspecialchars($_POST['gender']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $user_birthday = htmlspecialchars($_POST['birthday']);
        $user_signature = htmlspecialchars($_POST['signature']);

        // here we check if the user already exists in the database
       $checkIfUserAlreadyExists = $db->prepare("SELECT pseudo FROM users WHERE pseudo = ?");
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            // On insere l'utilisateur dans la base de donnee
            $insertUserOnForum = $db->prepare("INSERT INTO `users` (`pseudo`, `lastname`, `firstname`, `gender`, `email`, `pwd`, `birthday`, `signing`) 
            values(?,?,?,?,?,?,?,?)");
            $insertUserOnForum->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_gender, $user_email, $user_password, $user_birthday, $user_signature));
        
        //On recupere les infos de l'utilisateur
        $getInfosOfThisUserReq = $db->prepare("SELECT id, pseudo, lastname, firstname FROM users WHERE lastname =? AND firstname =? AND pseudo =?");
        $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));


            //on stock les informations de l'utilisateur dans un tableau grace a la methode fetch()
        $userInfos = $getInfosOfThisUserReq->fetch();
            //On authentifie l'utilisateur sur le site et recupere les infos de l'utilisateur dans les variables de session
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $userInfos['id'];
        $_SESSION['pseudo'] = $userInfos['pseudo'];
        $_SESSION['lastname'] = $userInfos['lastname'];
        $_SESSION['firstname'] = $userInfos['firstname'];

            //On rediriger vers la page d'accueil si le user est authentifié
        header('Location: index.php');

       }else{
            $errorMsg = "<p style='color:red;text-align:left;font-weight:bold;'>This user already exists</p>";
        }

    }else{
        $errorMsg = "Please fill all the fields";
    }
}

?>