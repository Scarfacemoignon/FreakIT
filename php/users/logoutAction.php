<?php 
//on demarre toutes les sessions
session_start();
//on stock dans un tableau
$_SESSION = [];
//on supprime toutes les sessions
session_destroy();
//On redirige vers la page d'accueil

header('Location: ../../login.php');

?>