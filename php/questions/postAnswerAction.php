<?php 
require('php/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['answer'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

         // Les ?? ?? pour signifier qu'on requiere 4 valeurs pour l'insertion
        $inserAnswer = $db->prepare("INSERT INTO answers (id_author, pseudo_author, id_question, content) 
        VALUES (?,?,?,?)");

        // On recupere les informations de l'utilisateur connecté
        $inserAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $_GET['id'], $user_answer));

    }

}

?>