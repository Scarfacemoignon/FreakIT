<?php 

require('database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) 
    AND !empty($_POST['gender']) AND !empty($_POST['email']) AND !empty($_POST['password']) 
    AND !empty($_POST['birthday']) AND !empty($_POST['signature'])){

       //we retrieve the data from the form
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

            $insertUserOnForum = $db->prepare("INSERT INTO `users` (`pseudo`, `lastname`, `firstname`, `gender`, `email`, `pwd`, `birthday`, `signing`) 
            values(?,?,?,?,?,?,?,?)");
            $insertUserOnForum->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_gender, $user_email, $user_password, $user_birthday, $user_signature));
        
       }else{
            $errorMsg = "This user already exists";
        }

    }else{
        $errorMsg = "Please fill all the fields";
    }
}

