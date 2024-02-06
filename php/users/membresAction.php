<?php 
// Démarre la session PHP.
session_start();

// Inclut le fichier de configuration de la base de données.
require('php/database.php');

// Initialise la variable $getid avec la valeur de $_SESSION['id'] s'il est défini, sinon avec null.
$getid = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Initialise une requête SQL de base pour sélectionner l'ID et le pseudo des utilisateurs.
$req_User = "SELECT id, pseudo, role FROM users";

// Si $getid est défini, modifie la requête SQL pour exclure l'utilisateur actuel.
if(isset($getid)){
    $req_User .= " WHERE id <> ?"; 
}

// Prépare la requête SQL pour être exécutée plus tard.
$User = $db->prepare($req_User);

// Si $getid est défini, exécute la requête en passant $getid comme paramètre, sinon exécute la requête sans paramètre.
if(isset($getid)){
    $User->execute([$getid]);
} else {
    $User->execute();
}

// Récupère tous les résultats de la requête dans un tableau associatif.
$displayUser = $User->fetchAll();
?>
