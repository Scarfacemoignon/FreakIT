<?php
require('php/users/securityAction.php');
require('php/questions/myQuestionAction.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" type="text/css" href="css/cards.css"/>-->
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/my-questions.css" />
    <title>Forum_FREAKIT</title>

    <style type="text/css">
        .emojis {
            position: relative;
            top: 2px;
        }
    </style>
</head>

<body>
    <?php include 'include/navbar.php'; ?>
    </br></br></br></br></br>

    <div class="container-question">
        <?php
        while ($question = $getAllMyQuestion->fetch()) {

            $emoji_replace = array(':)', ':(', ':3', ';-)', ':-)', ':-(', '<3', ':D', 'xD', 'x)', "x')", ':o', ':O', 'oO');
            $emoji_path = array(
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_sad.png" class="emojis"/>',
                '<img src="images\emojis\emo_cat.png" class="emojis"/>',
                '<img src="images\emojis\emo_wink.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
                '<img src="images\emojis\emo_smile.png" class="emojis"/>',
            );
            $question['user_subject'] = str_replace($emoji_replace, $emoji_path, $question['user_subject']);

            if (!function_exists('detecterLiens')) {
                function detecterLiens($texte)
                {
                    $regex = '%(https?:\/\/|www\.)([a-zA-Z0-9-_\.\/\?=&]+)%';
                    $texte = preg_replace($regex, '<a href="$0" target="_blank">$0</a>', $texte);
                    return $texte;
                }
            }

            $question['user_subject'] = detecterLiens($question['user_subject']);
        ?>
            <div class="middle-question">
                    <div class="title-question">
                        <p><?php echo $question['title']; ?></p>
                    </div>
                    <hr>
                    <div class="category-question">
                        <p><?= $question['category']; ?></p>
                    </div>
                    <hr>
                    <div class="subject-question">
                        <p><?= $question['user_subject']; ?></p>
                    </div>
                    <hr>
                    <div class="option-question">
                        <button class="button button1"><a href="article.php?id=<?php echo $question['id']; ?>"><img src="images/add.png" alt="like" class="img-edit" /></a></button>
                        <button class="button button2"><a href="edit-question.php?id=<?= $question['id']; ?>"><img src="images/edit.png" alt="like" class="img-edit" /></a></button>
                        <button class="button button3"><a href="php/questions/deleteQuestionAction?id=<?= $question['id']; ?>"><img src="images/delete.png" alt="like" class="img-edit" /></a></button>
                    </div>
            </div>
            <br>
        <?php
        }
        ?>
    </div>
    <br/><br/><br/><br/><br/><br/>
    <?php include 'bottom.php'; ?>
</body>

</html>
