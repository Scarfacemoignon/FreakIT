<?php
$db = new PDO('mysql:host=localhost;dbname=forum_freakit;charset=utf8;', 'root', '');

if (isset($_GET['t'], $_GET['id']) && is_numeric($_GET['t']) && is_numeric($_GET['id'])) {
    $questionId = (int)$_GET['id'];
    $userAction = (int)$_GET['t'];

    session_start();
    $userId = isset($_SESSION['id']) ? (int)$_SESSION['id'] : null;

    // Vérification si la question existe
    $checkQuestion = $db->prepare("SELECT * FROM questions WHERE id = ?");
    $checkQuestion->execute([$questionId]);

    if ($checkQuestion->rowCount() == 1) {
        // Vérification si l'utilisateur a déjà effectué une action sur cette question
        $checkUserAction = $db->prepare("SELECT * FROM user_actions WHERE id_user = ? AND id_question = ?");
        $checkUserAction->execute([$userId, $questionId]);

        if ($checkUserAction->rowCount() > 0) {
            $previousAction = $checkUserAction->fetch(PDO::FETCH_ASSOC);

            if ($previousAction['action'] == $userAction) {
                // L'utilisateur annule son action précédente
                $removeAction = $db->prepare("DELETE FROM user_actions WHERE id_user = ? AND id_question = ?");
                $removeAction->execute([$userId, $questionId]);

                // Suppression du like ou du dislike en fonction de l'action précédente
                if ($userAction == 1) {
                    $removeLike = $db->prepare("DELETE FROM likes WHERE id_question = ?");
                    $removeLike->execute([$questionId]);
                } elseif ($userAction == 2) {
                    $removeDislike = $db->prepare("DELETE FROM dislikes WHERE id_question = ?");
                    $removeDislike->execute([$questionId]);
                }
            }
        } else {
            // L'utilisateur effectue une nouvelle action
            if ($userId !== null) {
                if ($userAction == 1) {
                    // L'utilisateur met un like
                    $insertLike = $db->prepare("INSERT INTO likes (id_question) VALUES (?)");
                    $insertLike->execute([$questionId]);
                } elseif ($userAction == 2) {
                    // L'utilisateur met un dislike
                    $insertDislike = $db->prepare("INSERT INTO dislikes (id_question) VALUES (?)");
                    $insertDislike->execute([$questionId]);
                }

                // Enregistrement de l'action de l'utilisateur
                $recordUserAction = $db->prepare("INSERT INTO user_actions (id_user, id_question, action) VALUES (?, ?, ?)");
                $recordUserAction->execute([$userId, $questionId, $userAction]);
            }
        }

        // Redirection vers la page du forum
        header('Location: ../../forum.php');
    } else {
        exit("Fatal error");
    }
}
?>
