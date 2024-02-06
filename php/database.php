<?php

/* 
In this code must connect to our Database "forum_freakit"

-> Try allows us to try the connection and if everything is ok it displays an echo
otherwise it gets an exception.

*/
try{
    // Connect to the database
    // start the session
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=forum_freakit;charset=utf8;', 'root', '');
    //echo "<p style='color:green;text-align:left;font-weight:bold;'>Connected successfully.</p>";
   // header('Location: ./signup.php');
    
}catch(Exception $e){
    die('Somthing wrong. Database connection error... ' . $e->getMessage());
}
?>


    

