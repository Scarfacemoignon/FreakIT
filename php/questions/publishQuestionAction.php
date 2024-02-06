<?php
require('php/database.php');

if (isset($_POST['validate'])) {

    // On vérifie si le User a bien rempli le formulaire
    if (!empty($_POST['title']) && !empty($_POST['subject'])) {

        // Les données de la question
        $question_title = trim($_POST['title']);
        $question_category = htmlspecialchars($_POST['category']);
        // On vérifie s'il y a un URL dans le sujet
        $question_subject = nl2br(htmlspecialchars(trim($_POST['subject'])));
        $question_date = date("Y-m-d H:i:s");
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        // Vérifier si le titre a au moins deux mots
        if (str_word_count($question_title) >= 2) {

            // Insérer la question sur le site
            $insertQuestionOnForum = $db->prepare("INSERT INTO `questions` (`title`, `category`, `user_subject`,`id_author`,`pseudo_author`,`publication_date`) 
            VALUES (?, ?, ?, ?, ?, ?)");
            $insertQuestionOnForum->execute(array($question_title, $question_category, $question_subject, $question_id_author, $question_pseudo_author, $question_date));

            $successMsg = 'Your question has been sent!';

            // Vérifier si une image a été téléchargée
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image_tmp = $_FILES['image']['tmp_name'];

                // Convertir l'image en format base64 pour le stockage dans la base de données
                $image_data = base64_encode(file_get_contents($image_tmp));
                $image_mime = $_FILES['image']['type'];

                // Ajouter l'image à la base de données
                $insertImageQuery = $db->prepare("UPDATE questions SET image_data = ?, image_mime = ? WHERE id = LAST_INSERT_ID()");
                $insertImageQuery->execute([$image_data, $image_mime]);
            }

            header('Location: forum.php');
        } else {
            $errorMsg = 'The title must have at least two words.';
        }
    } else {
        $errorMsg = 'Please fill out all the fields.';
    }
}
?>
