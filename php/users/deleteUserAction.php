<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=forum_freakit;charset=utf8;', 'root', '');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recoveUser = $db->prepare("SELECT * FROM users WHERE id =? ");
    $recoveUser->execute(array($getid));
    if($recoveUser->rowCount() > 0){

        $deleteUser = $db->prepare("DELETE FROM users WHERE id=?");
        $deleteUser->execute(array($getid));
        header('Location:../../administrateur.php');

    }else{
        echo "<p style='color:red;text-align:center;font-weight:bold;'>User not found</p>";
    }
}else{
    echo " id available";
}



?>
