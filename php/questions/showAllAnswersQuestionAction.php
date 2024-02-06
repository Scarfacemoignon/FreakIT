<?php
require('php/database.php');

$getAllAnswersOfTheQuestion = $db->prepare("SELECT id_author, pseudo_author, id_question, content FROM answers WHERE id_question = ? ORDER BY id_question DESC");

$getAllAnswersOfTheQuestion->execute(array($idOfQuestion));


?>