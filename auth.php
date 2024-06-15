<?php
require_once 'classes/Utils.php';
require_once 'classes/ErrorMess.php';

session_start();

if (empty($_POST['email']) || empty($_POST['password'])) {
    Utils::redirect('index_connexion.php?error=' . ErrorMess::LOGIN_FIELDS_REQUIRED);
}

[
    'email' => $email,
    'password' => $password
] = $_POST;

// Authentification
if ($email === "admin@gmail.com" && $password === "123456") {
    $_SESSION['email'] = $email;
    Utils::redirect('active_recette.php');
} else {
    Utils::redirect('index_connexion.php?error=' . ErrorMess::INVALID_CREDENTIALS);
}