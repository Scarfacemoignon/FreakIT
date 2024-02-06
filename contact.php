<?php 
//require('php/users/contactAction.php'); 
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/contact.css" />
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>
    <title>Tout sur Dierry Nevyl</title>
   <!--<link rel="icon" type="image/x-icon" href="images/ico.ico">-->
</head>
<body>
<?php include 'include/navbar.php'; ?>
    <br/><br/><br/><br/>

    <div class="container-contact">
        <div class="container-form">
            <h1>Contactez moi !</h1>
            
            <?php if(isset($successMsg)): ?>
                <p style='color:green;text-align:left;font-weight:bold;'><?php echo $successMsg; ?></p>
            <?php endif; ?>
            <?php if(isset($errorMsg)): ?>
                <p style='color:red;text-align:left;font-weight:bold;'><?php echo $errorMsg; ?></p>
            <?php endif; ?>

            <form action="php/users/contactAction.php" method="GET">
                <label for="fname">Prénom</label>
                <input type="text" id="fname" name="firstname" placeholder="Votre Prénom" minlength="3" maxlength="30" required>
                <label for="pname">Nom</label>
                <input type="text" id="pname" name="lastname" placeholder="Votre Nom" minlength="3" maxlength="30" required>

                <br><br>

                <label for="emailAddress">Email</label>
                <input id="emailAddress" type="email" name="email" placeholder="Votre email">
                <label for="number">Téléphone</label>
                <input type="number" id="number" name="number" placeholder="Ex.06 16 41 90 52"/>

                <label for="number">STATUT</label><br>
                <input type="checkbox" id="choice" name="statute[]" value="Particulier">
                <label for="statute"> Particulier</label><br>
                <input type="checkbox" id="choice" name="statute[]" value="Entreprise">
                <label for="statute"> Entreprise</label><br>
                <input type="checkbox" id="choice" name="statute[]" value="Etudiant">
                <label for="statute"> Etudiant</label><br>
                <input type="checkbox" id="choice" name="statute[]" value="Autodidacte">
                <label for="statute"> Autodidacte</label><br>
                <br>
                <label for="subject">Message</label>
                <textarea id="subject" name="subject" placeholder="Votre message" style="height:200px"></textarea>

                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>

    <br/><br/>
    <?php include 'bottom.php'; ?>
</body>
</html>