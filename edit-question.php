<?php
require('php/users/securityAction.php');
require('php/questions/editQuestionAction.php'); 
require('php/questions/getInfosOfeditQuestionAction.php'); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="css/edit-question.css"/>
    
    <title>Forum_FREAKIT</title>
</head>
<body>
    <?php include 'include/navbar.php'; ?>
    <br></br></br></br></br>
    <div class="container-edit-question">

            <?php 
               if(isset($errorMsg)){
                    echo "<p style='color:red;text-align:left;font-weight:bold;'>".$errorMsg."</p>";
                } 
            ?>
            <?php 
               if(isset($question_date)){
                ?>
                <form method="POST">
                    <div class="row-edit-question">
                        <div class="name_input-edit-question">
                        <label for="title">Titre </label>
                        </div>
                        <div class="form_input-edit-question">
                        <input type="text" name="title" value="<?= $question_title?>">
                        </div>
                    </div>
                    <div class="row-edit-question">
                        <div class="name_input-edit-question">
                        <label for="category">Category </label>
                        </div>
                        <div class="form_input-edit-question">
                            <select name="category">
                                <option name="category" value="<?= $question_category?>">Cybersecurity</option>
                                <option name="category" value="<?= $question_category?>">Programmation</option>
                                <option name="category" value="<?= $question_category?>">Network</option>
                                <option name="category" value="<?= $question_category?>">Livraison</option>
                            </select>
                        </div>
                    </div>
                    <div class="row-edit-question">
                        <div class="name_input-edit-question">
                        <label for="subject">Sujet </label>
                        </div>
                        <div class="form_input-edit-question">
                        <textarea  name="subject"><?= $question_subject?></textarea>
                        </div>
                    </div>
                    <div class="row-edit-question">
                            <button type="submit" class="button" name="validate">Modifier</button>
                    </div>
                </form>
                <?php 
                }
                ?>

        
    </div>
    
</body>
</html>