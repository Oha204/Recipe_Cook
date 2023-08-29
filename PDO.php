<?php

try {
    //DSN = Data Source Name - Connexion BDD
    $pdo = new PDO("mysql:host=host.docker.internal;port=3308;dbname=site_recette_cuisine;charset=utf8mb4", 'root', '', 
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]
);
    var_dump($pdo);
} catch (PDOException) {
    http_response_code();
    echo "La connexion à la BDD a échoué";
    exit;
}

//Récupération ensemble des données/recettes 
try {
    $stmt = $pdo->query("SELECT * FROM recettes");
    while ($recettes = $stmt->fetch(PDO::FETCH_ASSOC)) {
        var_dump($recettes);
    }
} catch (PDOException) {
    echo "Erreur lors de la requête";
    exit;
}
