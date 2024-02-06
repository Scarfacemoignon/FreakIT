<?php
require('php/users/securityAction.php'); 
require('php/questions/showArticleContentAction.php'); 
require('php/questions/postAnswerAction.php'); 
require('php/questions/showAllAnswersQuestionAction.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php'; ?>

<body>
    <?php include 'include/navbar.php'; ?>
    <br/><br/><br/><br/>

    <div class="container-article">
        <?php 
            if(isset($errorMsg)) {
                echo htmlspecialchars($errorMsg, ENT_QUOTES, 'UTF-8');
            }

            if(isset($question_publication_date)) {
        ?>
        
        <section class="card-forum-article">
            <h3><?php echo htmlspecialchars($question_title, ENT_QUOTES, 'UTF-8'); ?></h3>
            <hr>
            <h3><?php echo htmlspecialchars($question_category, ENT_QUOTES, 'UTF-8'); ?></h3>
            <hr>
            <p><?php echo detecterLiens($question_subject); ?></p>
            <hr>
            <small>
                <p>Publié par 
                    <?php 
                        echo '<a href="profile.php?id='.$question_id_author.'">' . htmlspecialchars($question_pseudo_author, ENT_QUOTES, 'UTF-8') . '</a> le ' . htmlspecialchars($question_publication_date, ENT_QUOTES, 'UTF-8');
                    ?>
                </p>
            </small>
        </section>
        <br/>
        <section class="show-answers">
            <form method="POST">
                <div class="show-answers-title">
                    <h4>Réponses </h4>
                    <textarea name="answer" class="textarea_answer" placeholder="Répondre..."></textarea><br/>
                    <button type="submit" class="button_answer" name="validate">Répondre</button>
                </div>
            </form>

            <?php 
                while($allAnswersOfTheQuestion = $getAllAnswersOfTheQuestion->fetch()) {
                    $emoji_replace = array(':)', ':(', ':3', ';-)', ':-)', ':-(', '<3', ':D', 'xD', 'x)', "x')", ':o', ':O', 'oO');
                    $emoji_path = array('<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_sad.png" class="emojis"/>',
                                '<img src="images/emojis/emo_cat.png" class="emojis"/>',
                                '<img src="images/emojis/emo_wink.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                );

                    $allAnswersOfTheQuestion['content'] = str_replace($emoji_replace, $emoji_path, $allAnswersOfTheQuestion['content']);
            ?>

                <div class="card-article">
                    <div class="card-header-article">
                        <h3>@<a href="profile.php?id=<?= htmlspecialchars($allAnswersOfTheQuestion['id_author']); ?>">
                            <?= htmlspecialchars($allAnswersOfTheQuestion['pseudo_author'], ENT_QUOTES, 'UTF-8'); ?></a></h3>
                    </div>
                    <div class="card-body-article">
                        <p><?php echo detecterLiens($allAnswersOfTheQuestion['content']); ?> </p>
                    </div>
                </div>
                </br>
            <?php
                }
            ?>
        </section>

        <?php
            }
        ?>
    </div>
    <br/><br/><br/><br/><br/><br/><br/>
    <?php include 'bottom.php'; ?>
</body>
</html>

<?php
function detecterLiens($texte) {
    // Expression régulière pour détecter les liens URL
    $regex = '%(https?:\/\/|www\.)([a-zA-Z0-9-_\.\'\/\?=&À-ÖØ-öø-ÿ]+)%u';

    // Remplace les liens par des balises d'ancrage
    $texte = preg_replace($regex, '<a href="$0" target="_blank">$0</a>', $texte);

    return $texte;
}
?>
