<?php
// Vérifie si l'utilisateur est authentifié
session_start();

// Inclut les fichiers requis en début de script
require('php/questions/showAllQuestionAction.php');
require('php/questions/likeAction.php');

// Vérifie si une recherche est effectuée
if (isset($_GET['search'])) {
    // Traite la recherche
    // ... (ajoutez votre logique de recherche ici)
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; ?>
<body>
    <?php include 'include/navbar.php'; ?>
    <br/><br/>
    
    <div class="container">
        <img src="images/halloween3.jpg" class ="halloween-img" alt="halloween">
    </div>
    <?php include 'bottom.php'; ?>
    
</body>
</html>
