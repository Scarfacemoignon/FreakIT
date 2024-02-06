<?php
session_start();
require('php/database.php');

// Validation du formulaire
if (isset($_POST['validate'])) {
    // On vérifie si le User a bien rempli le formulaire
    if (
        !empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) &&
        !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['pwd']) &&
        !empty($_POST['confirm-pwd']) && !empty($_POST['birthday']) && !empty($_POST['signature'])
    ) {
        // Les données de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_gender = htmlspecialchars($_POST['gender']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = $_POST['pwd'];
        $user_confirm_password = $_POST['confirm-pwd'];
        $user_birthday = htmlspecialchars($_POST['birthday']);
        $user_signature = htmlspecialchars($_POST['signature']);
        $user_inscription_date = date('Y-m-d');

        // On vérifie si le mot de passe et la confirmation du mot de passe correspondent
        if ($user_confirm_password === $user_password) {
            // Le mot de passe et la confirmation du mot de passe correspondent

            // On vérifie si l'utilisateur existe déjà dans la base de données (en utilisant le pseudo ou l'email)
            $checkIfUserAlreadyExists = $db->prepare("SELECT pseudo, email FROM users WHERE pseudo = ? OR email = ?");
            $checkIfUserAlreadyExists->execute(array($user_pseudo, $user_email));

            if ($checkIfUserAlreadyExists->rowCount() == 0) {
                // On insère l'utilisateur dans la base de données
                $insertUserOnForum = $db->prepare("INSERT INTO `users` (`pseudo`, `lastname`, `firstname`, `gender`, `email`, `pwd`, `birthday`, `signing`, `inscription_date`)  
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $insertUserOnForum->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_gender,
                    $user_email, password_hash($user_password, PASSWORD_DEFAULT), $user_birthday, $user_signature, $user_inscription_date
                ));

                // On récupère les infos de l'utilisateur
                $getInfosOfThisUserReq = $db->prepare("SELECT id, pseudo, lastname, firstname FROM users WHERE lastname = ? AND firstname = ? AND pseudo = ?");
                $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

                // On stocke les informations de l'utilisateur dans un tableau grâce à la méthode fetch()
                $userInfos = $getInfosOfThisUserReq->fetch();

                // On authentifie l'utilisateur sur le site et récupère les infos de l'utilisateur dans les variables de session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['pseudo'] = $userInfos['pseudo'];
                $_SESSION['lastname'] = $userInfos['lastname'];
                $_SESSION['firstname'] = $userInfos['firstname'];

                $successMsg = "<p style='color:green;text-align:left;font-weight:bold;'>Account created successfully. Please login.</p>";

                // On redirige vers la page d'accueil si le user est authentifié
                header('Location: login.php');
                exit();
            } else {
                $errorMsg = "<p style='color:red;text-align:left;font-weight:bold;'>This user already exists</p>";
            }
        } else {
            $errorMsg = "<p style='color:red;text-align:left;font-weight:bold;'>Passwords don't match</p>";
        }
    } else {
        $errorMsg = "Please fill all the fields";
    }
}
?>
