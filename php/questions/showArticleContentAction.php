<?php 
    
    require('php/database.php');
    
    //On verifie que la question possede l'id de rentré en paramettre dans l'url
    if (isset($_GET['id']) && !empty($_GET['id'])) {
    
        //On recupere l'Id de la question 
        $idOfQuestion = $_GET['id'];
    
        // On verifie que la question existe dans la base de donnes
        $checkIfArticleExists = $db->prepare("SELECT * FROM questions WHERE id = ? ORDER BY id DESC");
        $checkIfArticleExists->execute(array($idOfQuestion));
    
        if ($checkIfArticleExists->rowCount() > 0) {
    
            //On recupere toutes les informations de la question
            $questionInfos = $checkIfArticleExists->fetch();
    
            //On stocke les informations dans des variables
            $question_title = ($questionInfos['title']);
            $question_category = ($questionInfos['category']);
            $question_subject = ($questionInfos['user_subject']);
            $question_id_author = ($questionInfos['id_author']);
            $question_pseudo_author = ($questionInfos['pseudo_author']);
            $question_publication_date = ($questionInfos['publication_date']);    
    
    
        }else{
            $errorMsg = "<p style='color:red;'>No question found! </p>";
        }
    
    
    }else{
        $errorMsg = "<p style='color:red;'>No question found! </p>";
    }
        
    
    
    ?>