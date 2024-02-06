<?php require('php/users/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <title>Forum_FREAKIT</title>
</head>  
<body>
<br/><br/><br/><br/><br/>
    <div class="container">
        <h1>Log In</h1>
        <form method="POST">

            <?php 
                if(isset($errorMsg)){
                    echo "<p>".$errorMsg."<p>";
                 }
            ?>

            <div class="row">
                <div class="name_input">
                    <label for="pseudo">@Pseudo : </label>
                </div>
                <div class="form_input">
                    <input type="text"  name="pseudo" placeholder="@Pseudo">
                </div>
           
            <div class="row">
                <div class="name_input">
                    <label for="password">Password : </label>
                </div>
                <div class="form_input">
                    <input type="password"  name="pwd">
                </div>
            </div>

                <div class="form_input">
                    <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>
            <br/>
            <div class="row">
                <button type="submit" class="button" name="validate">Login</button>
                <p> I don't have an account  <a href="signup.php" style="color:dodgerblue;text-decoration:none;"> SignUp</a></p>
            </div>
        </form>
    </div>    

</body>
</html>