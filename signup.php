<?php require('php/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php // include 'include/head.php'; ?>
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/signup.css"/>
    <title>Forum_FREAKIT</title>
</head>  
<body>
   <br/><br/><br/><br/><br/>
    <div class="container">
        <h1>Sign UP</h1>
        <form method="POST" action="php/signupAction.php">

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
            </div>
            <div class="row">
                <div class="name_input">
                    <label for="lastname">Last Name : </label>
                </div>
                <div class="form_input">
                    <input type="text" name="lastname" placeholder="Your last name...">
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                    <label for="firstname">First Name : </label>
                </div>
                <div class="form_input">
                    <input type="text"  name="firstname" placeholder="Your name...">
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                    <label for="gender">Gender : </label>
                </div>
                <div class="form_input">
                    <input type="radio"  name="gender" value="Mr">
                <label for="male">Male</label>
                    <input type="radio"  name="gender" value="Mme">
                <label for="female">Female</label>
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                    <label for="email">Email : </label>
                </div>
                <div class="form_input">
                    <input type="email"  name="email" placeholder="sacarface01@gmail.com">
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                    <label for="password">Password : </label>
                </div>
                <div class="form_input">
                    <input type="password"  name="pwd">
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                    <label for="birthday">Birthday : </label>
                </div>
                <div class="form_input">
                    <input type="date"  name="birthday">
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                    <label for="signature">Signature : </label>
                </div>
                <div class="form_input">
                    <input type="text"  name="signature" placeholder="The message displayed in all messages’s footer ">
                </div>
            </div>
                <div class="form_input">
                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                </div>
            <br/>
            <div class="row">
                <button type="submit" class="button" name="validate">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>