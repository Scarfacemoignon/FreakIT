<?php
session_start();
try {
    $db = new PDO('mysql:host=localhost;dbname=forum_freakit;charset=utf8;', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (
            isset($_GET['firstname']) && !empty($_GET['firstname']) &&
            isset($_GET['lastname']) && !empty($_GET['lastname']) &&
            isset($_GET['email']) && !empty($_GET['email']) &&
            isset($_GET['number']) && !empty($_GET['number']) &&
            isset($_GET['statute']) && !empty($_GET['statute']) &&
            isset($_GET['subject']) && !empty($_GET['subject'])
        ) {
            $firstname = htmlspecialchars($_GET["firstname"]);
            $lastname = htmlspecialchars($_GET["lastname"]);
            $email = htmlspecialchars($_GET["email"]);
            $number = htmlspecialchars($_GET["number"]);
            $statut = implode(",", $_GET["statute"]);
            $message = htmlspecialchars($_GET["subject"]);

            $insertUserContact = $db->prepare("INSERT INTO `contact`(`firstname`,`lastname`,`email`,`number`,`statut`,`subject`)  
                VALUES (:firstname, :lastname, :email, :number, :statut, :message)");

            $insertUserContact->bindParam(':firstname', $firstname);
            $insertUserContact->bindParam(':lastname', $lastname);
            $insertUserContact->bindParam(':email', $email);
            $insertUserContact->bindParam(':number', $number);
            $insertUserContact->bindParam(':statut', $statut);
            $insertUserContact->bindParam(':message', $message);

            $insertUserContact->execute();

            $successMsg = "Thanks for that, I'll contact you as soon as possible.";
            header('Location: ../../contact.php');
        } else {
            $errorMsg = "Something wrong!!!!";
        }
        
        $getAllContacts = $db->query("SELECT * FROM contact")->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
