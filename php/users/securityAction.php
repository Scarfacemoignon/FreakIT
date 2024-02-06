<?php
session_start();
//On securise l'authentication de l'utilisateur. si il n'est pas authentifié, on redirige vers la page de login
if (!isset($_SESSION['auth'])){
    header('Location: login.php');
}

?>