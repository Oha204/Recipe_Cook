# PROJET 
Site de recettes de cuisine.
# Déroulement de la création 
## Le commencement 
J'ai dans un premier temps travailler le frontend avec la création (utilisation de boostrap/css/html):
    - d'un dossier "assets" contenant mes photos, images, icons, logo etc... 
    - d'un dossier "layout" qui contient le header et le footer
    - d'une homepage (index_obj.php), 
    - d'une page de connexion/création de compte client (pas de partie client, possible évolution. Seulement une connexion au backOffice)

Ensuite, création : 
- dossier "data" avec fichier "recettes.php" où se trouve une variable $categorie contenant un tableaux multidimensionnels et une variable $recipesObjects contenant  [des instance de la classe Recette...] 
- dossier "classes" avec fichier "recettes.php" [...]

N.B : avec connexion plus tard à la BDD, le dossier "data" à moins d'importance.

## index_obj.php - Les 4 dernières recettes publiées
AVANT CONNEXION BDD :
intégration d'une boucle foreach avec une limite de 4.  
J'appelle ensuite dynamiquement les informations souhaités de mes recettes (img, titre, categorie), situé dans mon dossier "data" grâce à ma classe Recette.

APRES CONNEXION BDD :
## index_obj.php - Inscription Newsletter + intégration dans un fichier txt + message d'erreur 
Créations de 4 fichiers dans le dossier "classes" : "EmailFile.php", "Email.php", "ErrorMessage.php", "DuplicateChecker.php"
Créations  
## index_connexion.php - Connexion au BackOffice 

## index_connexion.php - Création d'un compte + intégration 


 ## nos_recettes.php - ensemble recettes + pagination

requête non préparées, externalisation BDD et versionning

### Config 

Créer un fichier 'db.ini' avec ce modèle (dispo dans 'db.ini.template')
```ini 
DB_HOST ="localhost"
BD_PORT=3306
DB_NAME="db_name"
DB_CHARSET="utf8mb4"
DB_USER="user"
DB_PASSWORD="password" 
```