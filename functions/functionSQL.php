<?php 
require_once __DIR__ . '/../classes/Utils.php';


// Connexion BDD - Try/catch mis dans une fonction pour faciliter son utilisation dans d'autres trucs sympa 
function getDbConnection(): PDO {
    //Sécuriser nos infos pour éviter de les afficher aux yeux de tous - Externalisation BDD (db.ini)
    try {
        $dbSettings = parse_ini_file(__DIR__ . '/../db.ini');

    [
        'DB_HOST'=> $host,
        'BD_PORT'=> $port,
        'DB_NAME'=> $name,
        'DB_CHARSET'=> $charset,
        'DB_USER'=> $user,
        'DB_PASSWORD'=> $password,
    ] = $dbSettings;

        //DSN = Data Source Name 
        $pdo = new PDO ("mysql:host=$host;port=$port;dbname=$name;charset=$charset", $user, $password, 
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
        );
    } catch (PDOException) {
        http_response_code();
        echo "La connexion à la BDD a échoué";
        exit;
    }
    return $pdo;
}

// Inscription nouveaux users 
function addUsers($mail, $password) {
    $pdo = getDbConnection(); 

    $addusers = $pdo->prepare("INSERT INTO users (mail, passwordHash) VALUES (?, ?)");
    $addusers->execute([
        $mail,
        password_hash($password, PASSWORD_BCRYPT)
    ]);
    Utils::redirect('../Recipe_Cook/confirm_registration.php?email=' . $mail); // Evolution : mettre le lien pour le côté client
}

// Validation des données form inscription
function validateUserData($mail, $password) {
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return "Le format de l'email est invalide.";
    }
    if (strlen($password) < 8) {
        return "Le mot de passe doit comporter au moins 8 caractères.";
    }
    return null;
}

//Fonction permettant de récupérer les recettes dans notre BDD
function getRecipesCook() : array {
    $pdo = getDbConnection();
    $stmt = $pdo->query(
        "SELECT recettes.id, recettes.publication_date, recettes.img_principale, recettes.title, recettes.categories_id, categories.name_cat, categories.img_icon_cat
        FROM recettes 
        INNER JOIN categories ON recettes.categories_id = categories.id
        ORDER BY recettes.publication_date DESC");
    
    $recettes = $stmt->fetchAll();
    return $recettes;
}

    


