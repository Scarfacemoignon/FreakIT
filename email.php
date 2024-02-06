<?php
$to = "scarfacemoignon@gmail.com";
$subject = "Test Mail";
$message = "Bonjour, ceci est un message de test.";
$headers = "From: scarfacemoignon@gmail.com";

// Ajoutez le type de contenu pour les e-mails HTML
$headers .= "\r\nContent-Type: text/html; charset=UTF-8";

// Ajoutez le saut de ligne supplémentaire entre les en-têtes et le message
$headers .= "\r\n";

if(mail($to, $subject, $message, $headers)){
    echo "<h1 style='color:green;'>Message envoyé avec succès</h1>";
} else {
    echo "<h1 style='color:red;'>Message non envoyé</h1>";
}
?>
