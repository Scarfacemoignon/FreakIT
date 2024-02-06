<?php 
    //Ici on redirige le user pour verifier qu'il est authentifier ou n'est pas
    session_start();
    require('php/users/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; ?>
<body>
    <?php include 'include/navbar.php'; ?>
    
</body>
</html>