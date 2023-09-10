# PROJET 
Site de recettes de cuisine, avec présence d'un backoffice pour ajouter, supprimer ou modifier des recettes.

 # REMARQUE PERSO SUR CE PROJET
Je me rends compte que j'aurais pu optimiser beaucoup de choses dans mon code, à commencer par le nom que je déclare pour mes variables, fonctions, classes, fichiers, etc. J'aurais également pu séparer mes fonctions dans le fichier "functionSQL.php" par exemple. 

J'ai quelques projets d'évolution pour ce site, c'est pourquoi j'ai mis pas mal de commentaires dans mon code et dans ce readme. J'aimerais en faire mon premier vrai projet de portfolio.

💥 Difficulté Globale : J'ai eu des difficultés sur un peu tout, mais la persévérance et le travail a payé. Je n'étais jamais bien loin de la solution. J'ai bien évolué et je suis contente de ce que j'ai réalisé.

# Déroulement de la création 
## Le commencement 
J'ai dans un premier temps travaillé le frontend avec la création :
    - d'un dossier "assets" contenant mes photos, images, icons, logo etc... 
    - d'un dossier "layout" qui contient le header et le footer
    - d'une homepage (index_obj.php), 
    - d'une page de connexion/création de compte client (pas de partie client pour le moment, possible évolution. Seulement une connexion au backOffice)

(utilisation de boostrap/css/html + tests JS)

Ensuite, création : 
- dossier "data" avec fichier "recettes.php" où se trouve une variable $categorie contenant un tableau multidimensionnel de mes diverses catégories de recette et une variable $recipesObjects contenant  mes instances de la classe Recette 
- dossier "classes" avec fichier "recettes.php" où j'ai défini une classe "Recette" avec divers attributs et je lui ai assigné des méthodes/capacités. 

N.B : avec connexion plus tard à la BDD, le dossier "data" à moins d'importance.

## "index_obj.php" 
### Les 4 dernières recettes publiées en fonction de la date de publication
AVANT CONNEXION BDD :
intégration d'une boucle foreach avec une limite de 4.  
J'appelle ensuite dynamiquement les informations souhaitées de mes recettes (img, titre, categorie), situé dans mon dossier "data" grâce à ma classe Recette.

APRES CONNEXION BDD : 
J'ai créé un dossier "functions" où j'ai créé un fichier "functionSQL.php". J'y intègre une fonction me permettant d'appeler ma BDD et mes recettes : function getRecipesCook().

### Inscription Newsletter + intégration dans un fichier txt + message d'erreur 
Créations de 3 fichiers dans le dossier "classes" : 
- "EmailFile.php" : ajout dans mon fichier .txt des mails inscrits ( file_put_contents) + vérification conditions (doublons, format e-mail, ...)
- "Email.php" : mise en place structure et des exceptions/vérif  
- "DuplicateChecker.php"

Sur la page "index_obj.php" je réalise une condition où, si un email est entré, alors il déclenche l'ensemble de mes classes et un try/catch avec enregistrement de l'email dans une variable, vérifications des conditions : si conditions respectées, ajout dans mon fichier .txt + redirection sur une page de confirmation, sinon apparition message d'erreur.

💥 Difficultés : Quelques difficultés sur la partie doublon.
  
## "index_connexion.php" 
Dans un premier temps, je souhaitais faire un système de connexion, uniquement réservé aux admins afin que ces derniers puissent ajouter, supprimer et modifier des recettes. 

Dans un second temps, avec le cours, j'ai réalisé un système de création de compte utilisateur avec enregistrement en BDD dans une table "users", cependant, je n'ai pas eu le temps de créer l'interface leur étant destinés après connexion. Donc il n'y a rien après la création de compte mais c'est une évolution que j'aimerais mettre en place. 

### Connexion au BackOffice 
Donc pour la connexion en tant qu'admin au backoffice, j'ai inséré dans mon "header.php" un bouton "Connexion" qui amène à mon formulaire sur ma page "index_connexion.php" (renommage futur:  "connexion.php").   

J'ai mis à mon formulaire une méthode POST et une action qui redirige sur "auth.php" où je permets de démarrer une session (session_start()). Je donne mes conditions : formulaire doit être remplie + pour parvenir au backoffice, les identifiants doivent être les suivant : 
l'email ="camille@gmail.com" 
le mdp = "123456"
Sinon message d'erreur. Ces messages d'erreur ont été défini dans la class "ErrorMess.php".

L'admin a la possibilité de mettre fin à la session en déconnectant (logout.php)

### Création d'un compte + intégration en BDD (exo de cours)
Pour la création de compte utilisateur -> création d'une fonction "addUsers()" dans fichier "functionSQL.php" dans laquelle je récupère une instance de PDO pour me connecter à ma BDD. Récupération des données du formulaire, déclaration avec requête SQL "INSERT TO" et prepare/execute. Puis redirection sur page de confirmation d'inscription ("confirm_registration.php"). 

Sur ma page "index_connexion.php", je déclare une condition "si le formulaire est soumis" alors j'utilise la fonction "addUsers" et j'ajoute un utilisateur à ma BDD, sinon message d'erreur. 

Comme cette partie n'était pas prévue à la base et que ma connexion ne se fait que vers un backoffice en tant qu'admin, je n'ai pas encore réalisé le hashage de mot de passe. C'est une évolution que je compte mettre en place par la suite.  

✅ Evolutions : 
- plus tard un lien vers l'interface users au lieu de la page de confirmation
- Hashage mdp

 ## "nos_recettes.php" 
 ### Liste recettes + Pagination
J'ai dans un premier temps récupéré l'ensemble de mes recettes grâce à ma fonction getRecipesCook() : 

try {
    $recettes = getRecipesCook();
} catch (PDOException) {
    echo "Erreur lors de la récupération des produits";
    exit;
} 

Ensuite, avant pagination, mise en place boucle foreach (ligne 80). Mais suite à la pagination, mise en place boucle FOR. Déclaration de diverses variables (ligne 15) que je mets en place en bas de page (ligne 108) et dans ma boucle FOR.

✅ Evolution : 
- mettre la pagination dans une fonction car présente sur plusieurs pages.

💥 Difficultées : c'était giga difficile de mettre en place la pagination. J'y ai passé plusieurs jours à comparer des articles, des tutos vidéos et ChatGPT pour trouver une solution et la comprendre un maximum.🤯

### Système de filtrage
✅ Evolution : À mettre en place plus tard (manque de temps). filtrer les recettes pour notre recherche en fonction de la catégorie ou du titre. 

## "recette.php" 
Accessible via le bouton "voir plus" présent sur les recettes de la page "nos_recettes.php".

Ici j'affiche l'ensemble des détails de ma recette en récupérant l'id et en vérifiant s'il existe bien dans mon tableau. Puis je fais une requête à ma BDD avec "SELECT" pour récupérer et afficher mes infos. 

J'ai dû un peu chercher afin d'afficher les ingrédients et les étapes de préparations présentent dans ma BDD sous forme de liste avec un retour à la ligne (et non sous forme d'un gros bloc). Mais je me suis rappelé qu'on avait fait un exercice avec "explode" et voici ce que j'ai écrit afin de résoudre mon problème :  

<?php
    $ingredients = explode("\n", $recette['ingredient']);
    foreach ($ingredients as $ingredient) {
        echo '<li>' . trim($ingredient) . '</li>';
    }
?>

## "active_recette.php" 
Cette page aurait dû être nommée "backOffice.php".
On y retrouve l'ensemble des recettes, avec la possibilité de modifier, d'ajouter et de supprimer ces dernières dans la BDD. 

### Ajouter une recette
Je mets en place mon bouton "add new" présent dans "headerBack.php" (dossiers layout) en le lien à la page "addrecette.php". (✅ renommage futur : "addRecipeForm.php")

Création fichier "addrecette.php" : mise en place formulaire (POST) création nouvelle recette.

Création fichier fonctions "addrecipe.php" (✅ renommage futur : "functionAddRecipe.php") : déclaration fonction addRecipes() qui me permettra d'ajouter les infos de ma recette à ma BDD.

Je termine par mettre en place une condition sur la page "addrecette.php" où, si le formulaire est soumis et remplis, alors la fonction addRecipes() est enclenché et ajoute ma recette à ma BDD.

⚠️ Note : Il arrive de temps en temps que l'ajout d'une nouvelle recette à ma BDD ne marche pas du premier coup. Il faut relancer l'envoi du formulaire. Je pense que c'est lié à l'uploads d'image présente dedans (poids des images trop gros?) 🤷‍♀️

#### Upload d'image 
Création d'un fichier "upload_img.php" dans dossier "functions" où j'y déclare ma fonction concernant le téléchargement des images.

💥 Difficultées : Je voulais que mon image principale s'enregistre dans le dossier "img_plat" et les images complémentaires dans un dossier "img_complementaire", cependant j'ai une erreur de droit d'accès au dossier que je n'arrive pas à corriger. J'ai donc réalisé l'enregistrement de toutes mes images dans le dossier "img_plat".

### Supprimer une recette
Le bouton supprimer récupère l'id de ma recette grâce à mon try/catch situé en haut de ma page "active_recette.php". Si l'id est ok, alors on peut lancer la fonction de suppresion (deleteRecipes()) créée dans le fichier "deleteRecipe.php", sinon message d'erreur :

function deleteRecipes(int $recipeId) : void {
    $pdo = getDbConnection();

    $deleterecipe = $pdo->prepare("DELETE FROM recettes WHERE id=:id");

    $deleterecipe->execute(['id' =>$recipeId]);
}

### Modifier une recette
Création d'un fichier "editrecipe.php" où se trouve mon formulaire de modification. Je vais dans un premier temps chercher les infos de ma recette séletionnée grâce à ma requête SQL "SELECT" afin de les afficher dans les différents champs de mon formulaire. 

Pour les modifier, j'ai créé un fichier "editRecipe.php" dans mon dossier "functions" où je déclare ma fonction "editRecipes()" avec en paramètre l'id de ma recette sélectionnée. 

💥 Difficultées : J'ai rencontré un problème avec les images lors de la modification de ma recette. Je n'arrive pas a récupérer le nom de l'image enregistré en BDD donc mon input est vide et lorsque je valide l'enregistrement des modifications de ma recette, les inputs étant vides, ces derniers écrasent le nom de mes images déjà enregistré. J'ai donc pris la décision en attendant de trouver la solution de mettre la partie "images des recettes" en commentaire (ligne 112 à 134 - "editrecipe.php")

✅ Evolution : 
- mettre en place l'activation et la désactivation des recettes afin de ne pas à avoir à les supprimer si besoin. (icon oeil)
- permettre la modification des images.

# Config connexion sécurisé BDD
Créer un fichier 'db.ini' où je renseigne mes informations, qui sera intégré dans un fichier .gitignore :
```ini 
DB_HOST ="XXXXX"
BD_PORT=XXXXX
DB_NAME="XXXXX"
DB_CHARSET="XXXXX"
DB_USER="XXXXX"
DB_PASSWORD=""
```

Créer un fichier 'db.ini.template' :
```ini 
DB_HOST ="localhost"
BD_PORT=3306
DB_NAME="db_name"
DB_CHARSET="utf8mb4"
DB_USER="user"
DB_PASSWORD="password" 
```
+ mise en place fonction getDbConnection() dans fichier "functionSQL.php" :
function getDbConnection(): PDO {
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

