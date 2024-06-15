<?php 
require_once 'functionSQL.php';

//Fonction permettant de modifier une recette de la BDD
function editRecipes(int $recipeId) : void {
    $pdo = getDbConnection();

    $title = $_POST['title'];
    $author = $_POST['author'];
    $publication_date = $_POST['publication_date'];
    // $img_principale = $_FILES['img_principale']['name'];
    // $img_second = $_FILES['img_second']['name'];
    // $img_tert = $_FILES['img_tert']['name'];
    // $img_quatr = $_FILES['img_quatr']['name'];
    $ingredient = $_POST['ingredient'];
    $cooking_tool = $_POST['cooking_tool'];
    $steps = $_POST['steps'];
    $categories_id = $_POST['categories_id'];

    $editrecipe = $pdo->prepare("UPDATE recettes SET title = ?, author = ?, publication_date = ?,  ingredient = ?, cooking_tool = ?,steps = ?, categories_id = ? WHERE id=?");

    $editrecipe->execute([
        $title,
        $author,
        $publication_date,
        // $img_principale,
        // $img_second,
        // $img_tert,
        // $img_quatr,
        $ingredient,
        $cooking_tool,
        $steps,
        $categories_id,
        $recipeId
    ]);
}
?>