<?php 

require('php/database.php');

if(isset($_POST['validate'])){
    //On verifie si le User a bien rempli le formulaire
    if(!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['subject'])){

        $question_title = htmlspecialchars($_POST['title']);
        $question_category = htmlspecialchars($_POST['category']);
        $question_subject = nl2br(htmlspecialchars($_POST['subject']));
        $question_date = date("Y-m-d H:i:s");
        $question_id_author = $_SESSION['id']; 
        $question_pseudo_author = $_SESSION['pseudo'];

        $insertQuestionOnForum = $db->prepare("INSERT INTO `questions` (`title`, `category`, `user_subject`,`id_author`,`pseudo_author`,`publication_date`) 
        VALUES (?,?,?,?,?,?)");
        $insertQuestionOnForum->execute(array($question_title, $question_category, $question_subject,$question_id_author,$question_pseudo_author,$question_date));

        $successMsg = 'Your question has been sent!';
       
    }else{
       $errorMsg = 'Please fill out all the fields.';
       
    }
}
?>

<?php
/*
$question_title = htmlspecialchars($_POST['title']);
         $question_category = htmlspecialchars($_POST['category']);

         //pour inserer les saut de ligne on utilise la fonction nl2br
         $question_subject = nl2br(htmlspecialchars($_POST['subject']));
         //on recupere la date de la date de publication
         $question_date = date("Y-m-d H:i:s");
         //on recupere l'id de l'utilisateur
         $question_id_author = $_SESSION['id'];
         //on recupere le pseudo de l'utilisateur
         $question_pseudo_author = $_SESSION['pseudo'];


         $insertQuestionOnForum = $db->prepare("INSERT INTO questions (title, category, user_subject, id_author, pseudo_author, publication_date) 
         VALUES(?,?,?,?,?,?)");
         $insertQuestionOnForum -> execute(
            array(
                $question_title,
                $question_category,
                $question_subject, 
                $question_date, 
                $question_id_author, 
                $question_pseudo_author
            )
        );

        $successMsg = "Your question has been sent!";
        echo "<p style='color:green;text-align:left;font-weight:bold;'>".$successMsg."</p>";*/
        ?>
