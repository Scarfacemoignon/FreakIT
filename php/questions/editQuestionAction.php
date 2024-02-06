<?php
require('php/database.php');

//validation du formulaire
if(isset($_POST['validate'])){

    //verifier que les champs ne sont pas vide
    if(!empty($_POST['title']) 
    && !empty($_POST['category']) 
    && !empty($_POST['subject'])){
    
        //les données à faire passer dans la requete
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_category = htmlspecialchars($_POST['category']);
        $new_question_subject = nl2br(htmlspecialchars($_POST['subject']));

        $idOfQuestion = $_GET['id'];

        //on modifie les informations de la question qui possede l'id de rentré en paramettre
        $editQuestionOnForum = $db->prepare('UPDATE questions SET title =?, category =?, user_subject =? WHERE id =?');
        $editQuestionOnForum->execute(array($new_question_title,$new_question_category,$new_question_subject,$idOfQuestion));
        //on redirige vers la page de mes questions

        header('Location: my-questions.php');

    }else{
        $errorMsg = "Please fill all the fields...";
    }
    
}

?>