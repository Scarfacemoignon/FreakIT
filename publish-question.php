<?php 
//Ici on redirige le user pour verifier qu'il est authentifier ou n'est pas
require('php/users/securityAction.php');
require('php/questions/publishQuestionAction.php'); 
require('php/questions/categorieAction.php');

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
    </br></br> </br></br> </br></br><br/>
    <div class="container-topic">

        <form method="POST" enctype="multipart/form-data">
            <?php 
                if(isset($successMsg)){
                    echo "<p style='color:green;text-align:left;font-weight:bold;'>".$successMsg."</p>";
                 }elseif(isset($errorMsg)){
                    echo "<p style='color:red;text-align:left;font-weight:bold;'>".$errorMsg."</p>";
                }
            ?>
            <div class="row">
                <div class="name_input">
                <label for="title">Titre </label>
                </div>
                <div class="form_input">
                <input type="text" name="title" placeholder="Title...">
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                <label for="category">Category </label>
                </div>
                <div class="form_input">
                <select name="category">
                    <?php foreach ($getCategories as $category){?>
                        <option name="category" value="<?php echo $category['category_name'];  ?>"><?php echo $category['category_name'];  ?></option>
                        <hr>
                    <?php }  ?>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                <label for="subject">Message </label>
                </div>

                <div class="form_input">
                <textarea  name="subject" placeholder="Write something.."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="name_input">
                    <label for="image">Image </label>
                </div>
                <div class="form_input">
                    <input type="file" name="image" accept="image/*">
                </div>
            </div>
            <div class="row">
                    <button type="submit" class="button-topic-send" name="validate">Créer le Topic</button>
            </div>
        </form>
    </div>
    <br/><br/> <br/><br/> <br/><br/> <br/><br/><br/>
    <?php include 'bottom.php'; ?>
</body>
</html>