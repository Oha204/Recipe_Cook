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

// Inscription nouveaux users BDD 
function addUsers () {
    $pdo = getDbConnection(); // Récupération d'une instance de PDO
    // Récupération des données de formulaire
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    // Validation des données
        // 1 - Je prépare ma requête 
        $addusers = $pdo->prepare("INSERT INTO users (mail, passwordHash) VALUES (?, ?)");
        // 2 - J'exécute ma requête en fournissant une valeur au(x) paramètre(s)
        $addusers->execute([
            $mail,
            $password
        ]);
        Utils::redirect('../confirm_registration.php?email=' . $_POST['mail']); // Evolution : mettre le lien pour le côté client
}

//Fonction permettant de récupérer les recettes dans notre BDD
function getRecipesCook() : array {
    $pdo = getDbConnection();
    $stmt = $pdo->query(
        "SELECT recettes.id, recettes.img_principale, recettes.title, recettes.categories_id, categories.name_cat, categories.img_icon_cat
        FROM recettes 
        INNER JOIN categories ON recettes.categories_id = categories.id
        ORDER BY recettes.publication_date DESC");
    
    $recettes = $stmt->fetchAll();
    return $recettes;
}

// Inscription Newsletter - via "index_obj.php" - Si j'ai le temps 
    // $pdo = getDbConnection();
    // try {
    //     $sub_news = $pdo->prepare("INSERT INTO newsletter (email) VALUES (:email)");
    //     $sub_news->execute(['email' => $_POST['email'],]);
    //     Utils::redirect('../index_obj.php'); 
    // } catch (PDOException) {
    //     echo "Erreur lors de la requête";
    //     exit;
    // }    


