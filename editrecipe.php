<?php
require_once 'layout/headerAddRecette.php';
require_once 'functions/editRecipe.php';
require_once 'functions/functionSQL.php';

$id = $_GET['id'] ?? null;
$pdo = getDbConnection();

$stmtRecipeItem = $pdo->prepare("SELECT * FROM recettes WHERE id=:id");
$stmtRecipeItem->execute(['id' => $id]);

$recette = $stmtRecipeItem->fetch();


if ($recette === false) {
    http_response_code(404);
    echo "Not found";
    exit;
}

// try {
//     $recettes = editRecipes();
//     } catch (PDOException) {
//         echo "Erreur lors de la requête";
//         exit;
//     }

?>


<div><h2 class="d-flex justify-content-center align-items-center pb-2 mb-5 mt-5 text-center">Modifier votre recette <br/> <?php echo $recette['title'] ?></h2></div>

<div class="container mt-4">
    <div class="row">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <!-- left part -->
                    <div class="mb-3">
                        <label for="title" class="form-label mb-2">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Votre titre" value ="<?php echo $recette['title']?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="img_principale" class="form-label mb-2">Image principale</label>
                            <input type="file" class="form-control" id="img_principale" name="img_principale" accept="image/*" style="font-size:14px;" value ="<?php echo $recette['img_principale']?>">
                        </div>

                        <div class="col-md-6">
                            <label for="additionalImages" class="form-label mb-2">Images complémentaires</label>
                            <input type="file" class="form-control" id="additionalImages" name="additionalImages" accept="image/*" multiple style="font-size:14px;" value ="<?php echo $recette['img_second'] . $recette['img_tert'] . $recette['img_quatr']?>">
                            <!-- mettre une boucle qui affiche l'ensemble des images par idrecette -->
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label mb-2">Auteur</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="L'auteur" value ="<?php echo $recette['author']?>" required>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="categories_id" class="form-label mb-2">Catégorie</label>
                            <select class="form-select" id="categories_id" name="categories_id">
                                <option name="Entrée" value="1">Entrée</option>
                                <option name="Plat chaud" value="2">Plat chaud</option>
                                <option name="Plat froid" value="3">Plat froid</option>
                                <option name="Dessert" value="4">Dessert</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="publication_date" class="form-label mb-2">Date de publication</label>
                            <input type="date" class="form-control" id="publication_date" name="publication_date" required style="font-size:15px;" value ="<?php echo $recette['publication_date']?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="ingredient" class="form-label mb-2">Ingrédients (un par ligne)</label>
                        <textarea class="form-control" id="ingredient" name="ingredient" rows="4" value ="<?php echo $recette['ingredient']?>" placeholder="Vos ingrédients ..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="cooking_tool" class="form-label mb-2">Ustensiles (un par ligne)</label>
                        <textarea class="form-control" id="cooking_tool" name="cooking_tool" rows="4" placeholder="Vos ustensiles ..." value ="<?php echo $recette['cooking_tool']?>" required></textarea>
                    </div>
                </div>

                <!-- Right part -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="steps" class="form-label">Étapes de préparation (une par ligne)</label>
                        <textarea class="form-control" id="steps" name="steps" rows="25" placeholder="Vos étapes de préparation. 
        - étape 1 : votre texte ici .... 
        - étapes 2 : votre texte ici .... 
        - etc ..." value ="<?php echo $recette['steps']?>" required>
                        </textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center mt-3">
                <button class="btn btn-outline-light mb-4" id="btn_addnew" type="submit"  role="button">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

    </body>
</html>