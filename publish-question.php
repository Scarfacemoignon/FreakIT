<?php 
//Ici on redirige le user pour verifier qu'il est authentifier ou n'est pas
require('php/questions/publishQuestionAction.php'); 
require('php/users/securityAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="css/publish-question.css"/>
    
    <title>Forum_FREAKIT</title>
</head>
<body>
    <?php include 'include/navbar.php'; ?>
    </br></br>
    <div class="container">

        <form method = "POST">
            <?php 
                if(isset($errorMsg)){
                    echo "<p style='color:red;text-align:left;font-weight:bold;'>".$errorMsg."</p>";
                 }elseif(isset($successMsg)){
                    echo "<p style='color:green;text-align:left;font-weight:bold;'>".$successMsg."</p>";
                 }
            ?>
            <div class="row">
                <div class="name_input">
                <label for="title">Title :</label>
                </div>
                <div class="form_input">
                <input type="text" name="title" placeholder="Title..." required>
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                <label for="category">Category :</label>
                </div>
                <div class="form_input">
                <select>
                    <option name="category" value="cybersecurity">Cybersecurity</option>
                    <option name="category" value="programmation">Programmation</option>
                    <option name="category" value="network">Network</option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                <label for="subject">Subject :</label>
                </div>
                </br>
                <div class="form_input">
                <textarea  name="subject" placeholder="Write something.." required></textarea>
                </div>
            </div>
            <div class="row">
                    <button type="submit" class="button" name="validate">Send</button>
            </div>
        </form>
    </div>
        
</body>
</html>