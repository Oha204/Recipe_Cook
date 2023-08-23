<?php
require_once 'classes/Utils.php';

if (isset ($_POST)) {
    $email = $_POST["email"];
    
    // Ajouter l'e-mail au fichier email.txt
    $filename = "email_NL.txt";
    $current = file_get_contents($filename);
    $current .= $email . "\n";
    file_put_contents($filename, $current);
    
    // Rediriger l'utilisateur après l'inscription
    Utils::redirect('index_obj.php#NL');
} 
?>