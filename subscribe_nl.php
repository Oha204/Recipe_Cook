<?php
if (isset ($_POST)) {
    var_dump($_POST);
    $email = $_POST["email"];
    
    // Ajouter l'e-mail au fichier email.txt
    $filename = "email_NL.txt";
    $current = file_get_contents($filename);
    $current .= $email . "\n";
    file_put_contents($filename, $current);
    
    // Rediriger l'utilisateur après l'inscription
    
} 
?>