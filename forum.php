<?php
// Vérifie si l'utilisateur est authentifié

// Inclut les fichiers requis en début de script
require('php/users/securityAction.php');
require('php/questions/showAllQuestionAction.php');
require('php/questions/likeAction.php');
require('php/questions/myQuestionAction.php');
require('php/questions/publishQuestionAction.php');  
 


// Vérifie si une recherche est effectuée
if (isset($_GET['search'])) {
    // Traite la recherche
    // ... (ajoutez votre logique de recherche ici)
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; ?>
<body>
    <?php include 'include/navbar.php'; ?>
    <br/><br/><br/> <br/><br/>
    
    <div class="container-forum">
        <!-- Formulaire de recherche -->
        <form method="GET">
            <div class="search-container">
                <input class="input_search" name="search" type="text" placeholder="Rechercher avec un titre...">
                <button class="button_search" type="submit">Rechercher</button>
            </div>
            <br/><br/>
            <div class="cree-topic">
                <button class="button_topic" type="submit"><a href="publish-question.php">Créer un Topic</a></button>
            </div>
        </form>
        <br/>
        <?php
        // Affiche toutes les questions récupérées
        while ($question = $getAllQuestions->fetch()) {
            $questionId = $question['id']; // Ajout de cette ligne pour récupérer l'id de la question

            $emoji_replace = array(':)', ':(', ':3', ';-)', ':-)', ':-(', '<3', ':D', 'xD', 'x)', "x')", ':o', ':O', 'oO');
            $emoji_path = array('<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_sad.png" class="emojis"/>',
                                '<img src="images/emojis/emo_cat.png" class="emojis"/>',
                                '<img src="images/emojis/emo_wink.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/coeur1.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                '<img src="images/emojis/emo_smile.png" class="emojis"/>',
                                );

            $question['user_subject'] = str_replace($emoji_replace, $emoji_path, $question['user_subject']);

            // Détection de liens dans le texte
            $question['user_subject'] = detecterLiens($question['user_subject']);
            
        ?>
            <div class="card-forum">
                <div class="card-header">
                    <h3><img src="images/title.png" alt="category" class="category-img"/><?php echo htmlspecialchars($question['title']); ?><label class="card-header-right"><img src="images/date.png" alt="like" class="date-img" /><?php echo htmlspecialchars($question['publication_date']); ?></label></h3>
                </div>
                <div class="card-category">
                    <img src="images/category.png" alt="category" class="category-img"/><?php echo htmlspecialchars($question['category']); ?>
                </div>

                <div class="card-body">
                   <?php 

                    if(!empty($_SESSION['avatar'])){
                        $path = "images/avatar/" . $_SESSION['avatar'];
                    } else {
                        $path = "images/avatar/default/avatar_default.png";
                    }
        
                   ?>
                    <div class="card-body-left">
                        <img src='<?= $path ?>' class='card-profil-img' alt='...'>
                        <a href="profile.php?id=<?= $question['id_author']; ?>">@<?php echo htmlspecialchars($question['pseudo_author']); ?></a>
                    </div>
                    <div class="card-body-right">
                          <p class="card-body-right-p"><?php echo $question['user_subject']; ?></p>
                          <?php 
                                // Vérifie si l'image existe
                                if (!empty($question['image_data'])) {
                                    // Affiche l'image depuis la base de données
                                    $image_data = $question['image_data'];
                                    $image_mime = $question['image_mime'];
                                    $image_src = 'data:' . $image_mime . ';base64,' . $image_data;
                                    echo "<img src='$image_src' alt='Question Image' class='question-image'>";
                                }
                        ?>
                                        
                    </div>

                </div>

                <div class="card-signature">
                    <label for="">#Publié par <a href="profile.php?id=<?= $question['id_author']; ?>">@<?php echo htmlspecialchars($question['pseudo_author']); ?></a>...</label>
                </div>
                <div class="card-footer">
                    <?php 
                    $likes = $db->prepare("SELECT id FROM likes WHERE id_question = ?");
                    $likes->execute(array($questionId)); // Utilisation de $questionId au lieu de $getid
                    $likes = $likes->rowCount();
                    ?>                
                    <a href="article.php?id=<?php echo $questionId; ?>" class="button-commentaire">Voir les commentaires</a>
                    <div class="like">
                        <a href="php/questions/likeAction.php?t=1&id=<?php echo $questionId; ?>"><img src="images/like.png" alt="like" class="like-img" /></a> <?= $likes ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <br/><br/>
    <?php include 'bottom.php'; ?>
</body>
</html>

<?php
function detecterLiens($texte) {
    // Expression régulière pour détecter les liens URL
    $regex = '%(https?:\/\/|www\.)([a-zA-Z0-9-_\.\/\?=&]+)%';

    // Remplace les liens par des balises d'ancrage
    $texte = preg_replace($regex, '<a href="$0" target="_blank">$0</a>', $texte);

    return $texte;
}
?>