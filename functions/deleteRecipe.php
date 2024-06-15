<?php 
require_once 'functionSQL.php';

//Fonction permettant de supprimer une recette de la BDD
function deleteRecipes(int $recipeId) : void {
    $pdo = getDbConnection();
    $deleterecipe = $pdo->prepare("DELETE FROM recettes WHERE id=:id");
    $deleterecipe->execute(['id' =>$recipeId]);
}
?>