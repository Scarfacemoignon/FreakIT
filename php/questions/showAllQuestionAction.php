<?php
require('php/database.php');

//la methode query permet de recuperer des donnes de la base de donnes
//On recupere toutes les 5 dernieres questions par ordre decroissant
$getAllQuestions = $db->query('SELECT * FROM questions ORDER BY id DESC LIMIT 0,15');

//on verifie que le user a bien lancé la recherche
if(isset($_GET['search']) && !empty($_GET['search'])){

    $usersSearch = $_GET['search'];

    //on recupere toutes les questions qui contiennent le mot recherché
    $getAllQuestions = $db->query('SELECT id, id_author, title, category, pseudo_author, user_subject, publication_date FROM questions WHERE title LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
 
}

?> 