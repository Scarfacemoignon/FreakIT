<?php 
require('php/database.php');

//Ici on veut editer une question precise 
//On va utiliser l'id de la question

//on utilise la methode get pour recupérer l'id de la question dans l'url
if(isset($_GET['id']) && !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    //on verifie si la question existe dans la base de donnée
    $checkIfQuestionExists = $db->prepare("SELECT * FROM questions WHERE id = ?");
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        //on verifie si l'utilisateur est authentifié et que c'est bien sa question
        //on compare les deux identifiants id et id_author
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_author'] == $_SESSION['id']){

            $question_title = $questionInfos['title'];
            $question_category = $questionInfos['category'];
            $question_subject = $questionInfos['user_subject'];
            $question_date = $questionInfos['publication_date'];

            //on supprime les balises de retour a la ligne
            $question_subject = str_replace('<br>', '', $question_subject);


        }else{
            $errorMsg = "You are not the author of this question";
        }

    }else{
        $errorMsg = " Question Not found" ;
    }

}else{
    $errorMsg = " Question Not found" ;
}


?>