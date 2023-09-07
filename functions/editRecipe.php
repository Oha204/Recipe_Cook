<?php 
// require_once 'functionSQL.php';

// //Fonction permettant de modifier une recette de la BDD
// function editRecipes() : array {
//     $pdo = getDbConnection();

//     $title = $_POST['title'];
//     $author = $_POST['author'];
//     $publication_date = $_POST['publication_date'];
//     $img_principale = $_POST['img_principale'];
//     $img_second = $_POST['img_second'];
//     $img_tert = $_POST['img_tert'];
//     $img_quatr = $_POST['img_quatr'];
//     $ingredient = $_POST['ingredient'];
//     $cooking_tool = $_POST['cooking_tool'];
//     $steps = $_POST['steps'];

//     $editrecipe = $pdo->prepare("UPDATE recettes SET title = :title, author = :author, publication_date = :publication_date, img_principale = :img_principale, img_second = :img_second, img_tert = :img_tert, img_quatr = :img_quatr, ingredient = :ingredient, cooking_tool = :cooking_tool,steps = :steps WHERE id=:id");

//     $editrecipe->execute([
//         $title,
//         $author,
//         $publication_date,
//         $img_principale,
//         $img_second,
//         $img_tert,
//         $img_quatr,
//         $ingredient,
//         $cooking_tool,
//         $steps
//     ]);
//     $recettes = $editrecipe->fetchAll();
//     return $recettes;
// }
