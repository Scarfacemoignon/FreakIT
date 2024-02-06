<?php

require('php/database.php');

$getAllMyQuestion = $db->prepare("SELECT id, title, category, user_subject FROM questions WHERE id_author = ? ORDER BY id DESC");
$getAllMyQuestion->execute(array($_SESSION['id']));



?>