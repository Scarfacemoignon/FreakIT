<?php 
require('php/database.php');

// On recupre l'ID de l'utilisateur connecté
if(isset($_GET['id']) && !empty($_GET['id'])){

    // l'ID de l'utilisateur connecté
    $idOfUser = $_GET['id'];

    // On verifie que l'utilisateur connecté existe dans la base de donnes
    $checkIfUserExists = $db->prepare('SELECT * FROM users WHERE id =? ORDER BY id DESC');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){

        //On recupere toutes les informations de l'utilisateur
        $userInfos = $checkIfUserExists->fetch();

        $user_id = $userInfos['id'];
        $user_pseudo = $userInfos['pseudo'];
        $user_lastname = $userInfos['lastname'];
        $user_firstname = $userInfos['firstname'];
        $user_gender = $userInfos['gender'];
        $user_email = $userInfos['email'];
        $user_password = $userInfos['pwd'];
        $user_birthday = $userInfos['birthday'];
        $user_signing = $userInfos['signing'];
        $user_role = $userInfos['role'];
        $user_date = $userInfos['inscription_date'];
        $user_avatar = $userInfos['avatar'];
        

        switch ($user_role) {
            
            case 0:
                $user_role = 'Utilisateur';
                break;
            case 1:
                $user_role = 'Administrateur';
                break;
        }

        // On selection toutes les questions que l'utilisateur publié
        $getUsersQuestion = $db->prepare('SELECT * FROM questions WHERE id_author =?');
        $getUsersQuestion->execute(array($idOfUser));


    }else{
        echo "<p style='color:darkred;'> No user found...</p>";
    }

}else{
    echo "<p style='color:red;'>No user found...</p>";
}



?>