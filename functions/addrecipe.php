<?php

require_once 'functionSQL.php';

//Fonction permettant d'ajouter une recette à la BDD (pas confirmé)
function addRecipes() : void {
    $pdo = getDbConnection();

    $title = $_POST['title'];
    $author = $_POST['author'];
    $publication_date = $_POST['publication_date'];
    $ingredient = $_POST['ingredient'];
    $cooking_tool = $_POST['cooking_tool'];
    $steps = $_POST['steps'];
    $categories_id = intval($_POST['categories_id']);

    $addrecipe = $pdo->prepare(
        "INSERT INTO recettes (title, author, publication_date, ingredient, cooking_tool, steps, categories_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");

    $addrecipe->execute([
        $title,
        $author,
        $publication_date,
        $ingredient,
        $cooking_tool,
        $steps,
        $categories_id
    ]); 
}