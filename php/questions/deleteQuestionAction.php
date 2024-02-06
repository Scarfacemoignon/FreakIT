<?php

session_start();
if(isset($_SESSION['auth'])){
    header('Location: ../..login.php');
}

require('../database.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

    //On verifie que la question possede l'id d'entré en paramettre
    $idOfQuestion = $_GET['id'];

    // On verifie que la question existe dans la base de donnes
    $checkIfQuestionExists = $db->prepare('SELECT id_author FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){
         
        //On recupere toutes les informations de la question
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_author'] == $_SESSION['id']){

            //On supprime une question d'un identifiant donné.
            $deleteThisQuestion = $db->prepare('DELETE FROM questions WHERE id =?');
            $deleteThisQuestion->execute(array($idOfQuestion));

            header('Location: ../../my-questions.php');

        }else{
            echo "<p style='color:red;'>You do not have the right to delete a message that does not belong to you! </p>";
        }

    }else{
        echo "<p style='color:darkred;'> No question found...</p>";
    }
    

}else{
    echo "<p style='color:darkred;'> No question found...</p>";
}

?>