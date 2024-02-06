<?php require('php/users/signupAction.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/signup.css" />
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>
    <title>Forum_FREAKIT</title>
</head>

<body>
    <?php include 'include/navbar.php'; ?>
        <br /><br /><br /><br /><br />
    <div class="container-signup">
        
        <div class="container-signup-left">
            <img src="images/halloween2.jpg" class ="halloween-img" alt="halloween">
        </div>
        <div class="container-signup-right">
            <h1><img src="images/freakit.png" class ="freakit" alt="">FreakIT Inscription<img src="images/freakit.png" class ="freakit" alt=""></h1>

                <form method="POST">

                <?php 
                    if(isset($successMsg)){
                        echo "<p style='color:green;text-align:left;font-weight:bold;'>".$successMsg."</p>";
                    }elseif(isset($errorMsg)){
                        echo "<p style='color:red;text-align:left;font-weight:bold;'>".$errorMsg."</p>";
                    }
                ?>
                    
                    <div class="row">
                        <div class="name_input">
                            <label for="pseudo">Pseudo  </label>
                        </div>
                        <div class="form_input">
                            <input type="text" name="pseudo" placeholder="Pseudo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="name_input">
                            <label for="lastname">Nom  </label>
                        </div>
                        <div class="form_input">
                            <input type="text" name="lastname" placeholder="Votre nom...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="name_input">
                            <label for="firstname">Prénom  </label>
                        </div>
                        <div class="form_input">
                            <input type="text" name="firstname" placeholder="Votre prénom...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="name_input">
                            <label for="gender">Civilité  </label>
                        </div>
                        <div class="form_input">
                            <input type="radio" name="gender" value="Mr">
                            <label for="male">Mr</label>
                            <input type="radio" name="gender" value="Mme">
                            <label for="female">Mme</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="name_input">
                            <label for="email">Email </label>
                        </div>
                        <div class="form_input">
                            <input type="email" name="email" placeholder="diplome@ecoleit.com">
                        </div>
                    </div>
                    <div class="row">
                        <div class="name_input">
                            <label for="password">Mot de passe </label>
                        </div>
                        <div class="form_input">
                            <input type="password" name="pwd">
                        </div>
                    </div>
                    <div class="row">
                        <div class="name_input">
                            <label for="password">Confirmation de mot de passe </label>
                        </div>
                        <div class="form_input">
                            <input type="password" name="confirm-pwd">
                        </div>
                    </div>
                    <div class="row">
                        <div class="name_input">
                            <label for="birthday">Naissance  </label>
                        </div>
                        <div class="form_input">
                            <input type="date" name="birthday">
                        </div>
                    </div>
                    <div class="row">
                        <div class="name_input">
                            <label for="signature">Signature  </label>
                        </div>
                        <div class="form_input">
                            <input type="text" name="signature" placeholder="Ceci s'affichera comme votre signature... ">
                        </div>
                    </div>
                    <div class="form_input">
                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                        <p> I already have an account <a href="login.php" style="color:dodgerblue;text-decoration:none;"> Login</a></p>
                    </div>
                    <br />
                    <div class="row">
                        <button type="submit" class="button" name="validate">S'inscrire</button>
                    </div>
                </form>
            </div>
    </div>
    <br/><br/>
    <?php include 'bottom.php'; ?>
</body>

</html>
