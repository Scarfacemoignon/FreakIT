<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Forum_FREAKIT</title>
</head>
<body> 
    <div class="topnav" id="myTopnav">
        <div class="topnav-img">
            <img src="images/freakit.png" class ="freakit" alt="">
        </div>
        <a class="active" href="index.php">FreakIT</a>
        <a href="forum.php">Forum</a>
        <a href="membres.php">Membres</a>
        <a href="contact.php">Contact</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
        
        <div class="topnav-right">
            
            <?php if(!isset($_SESSION['auth'])) { 
            //ici on veut afficher les boutons se connecter et s'inscrire si l'utilisateur n'est pas authentifier et faire disparaitre cela si l'utilisateur est authentifier et afficherle profile    
            ?>
                <a href="login.php">Se connecter</a>
                <a href="signup.php">S'inscrire</a>
            <?php } else { ?>
                <a href="my-questions.php?id=<?= $_SESSION['id'];?>">Mes Questions</a>
                <a href="profile.php?id=<?= $_SESSION['id'];?>">Pofile</a>
                <a href="php/users/logoutAction.php">Logout</a>
            <?php } ?>
        </div>
    </div>
    
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
</body>
</html>
