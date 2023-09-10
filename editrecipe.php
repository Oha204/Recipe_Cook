<?php
require_once 'layout/headerAddRecette.php';

require_once 'functions/functionSQL.php';

// réception infos recette
$id = $_GET['id'] ?? null;
    
    $pdo = getDbConnection();

    $stmtRecipeItem = $pdo->prepare("SELECT * FROM recettes WHERE id=:id_recette");
    $stmtRecipeItem->execute(['id_recette' => $id]);
    
    $recette = $stmtRecipeItem->fetch();

    if ($recette === false) {
        http_response_code(404);
        echo "Not found";
        exit;
    }

// modification recette
    if (isset($_POST['title']) || 
    isset($_POST['author']) || 
    isset($_POST['publication_date']) || 
    // isset($_FILES['img_principale']['name']) && 
    // isset($_FILES['img_second']['name']) &&
    // isset($_FILES['img_tert']['name']) &&
    // isset($_FILES['img_quatr']['name']) &&
    isset($_POST['ingredient']) || 
    isset($_POST['cooking_tool']) || 
    isset($_POST['steps']) || 
    isset($_POST['categories_id'])
    ) { 
        require_once 'functions/editRecipe.php';
        try {
    $recettes = editRecipes($id);
    Utils::redirect('active_recette.php');
    } catch (PDOException) {
        echo "Erreur lors de la requête";
        exit;
    }
}
?>

<div><h2 class="d-flex justify-content-center align-items-center pb-2 mb-5 mt-5 text-center" style="font-size:35px;">Modifier votre recette :<br/> <?php echo $recette['title'] ?></h2></div>

<div class="container mt-5">
    <div class="row">
        <form enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <!-- left part -->
                    <div class="mb-3">
                        <label for="title" class="form-label mb-2">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Votre titre" value ="<?php echo $recette['title']?>" required>
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
                        <textarea class="form-control" id="ingredient" name="ingredient" rows="4" placeholder="Vos ingrédients ..." required><?php echo $recette['ingredient']?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="cooking_tool" class="form-label mb-2">Ustensiles (un par ligne)</label>
                        <textarea class="form-control" id="cooking_tool" name="cooking_tool" rows="4" placeholder="Vos ustensiles ..." required><?php echo $recette['cooking_tool']?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="AllImgRecipe" class="form-label mb-2">Modififiez vos photos : </label>

                        <div class="row" id="img_edit">
                            <div class="col-md-3" style=>
                                <img src="uploads/img_plat/<?php echo $recette['img_principale']?>" class="d-block w-100 fixed-image">
                                <p>Image principale</p>
                            </div>
                            <div class="col-md-3">
                                <img src="uploads/img_plat/<?php echo $recette['img_second']?>" class="d-block w-100 fixed-image">
                                <p>Images #1</p>   
                            </div>
                            <div class="col-md-3">
                                <img src="uploads/img_plat/<?php echo $recette['img_tert']?>" class="d-block w-100 fixed-image" >
                                <p>Images #2</p>
                            </div>
                            <div class="col-md-3">
                                <img src="uploads/img_plat/<?php echo $recette['img_quatr']?>" class="d-block w-100 fixed-image">
                                <p>Images #3</p>
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="img_principale" class="form-label mb-2">Image principale</label>
                                <input type="file" class="form-control" name="img_principale" style="font-size:14px;" value ="<?php //echo $recette['img_principale']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="img_second" class="form-label mb-2">Images complémentaires #1</label>
                                <input type="file" class="form-control" id="img_second" name="img_second" accept="image/*" multiple style="font-size:14px;" value ="<?php //echo $recette['img_second']['name']?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="img_tert" class="form-label mb-2">Image complémentaires #2</label>
                                <input type="file" class="form-control" id="img_tert" name="img_tert" accept="image/*" style="font-size:14px;" value ="<?php //echo $recette['img_tert']['name']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="img_quatr" class="form-label mb-2">Images complémentaires #3</label>
                                <input type="file" class="form-control" id="img_quatr" name="img_quatr" accept="image/*" multiple style="font-size:14px;" value ="<?php //echo $recette['img_quatr']['name']?>">
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- Right part -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="steps" class="form-label">Étapes de préparation (une par ligne)</label>
                        <textarea class="form-control" id="steps" name="steps" rows="28" 
                        placeholder="Vos étapes de préparation." required><?php echo $recette['steps']?></textarea></div>
                </div>
            </div>

            <div class="col-md-12 text-center mt-3">
                <button class="btn btn-outline-light mb-4" id="btn_addnew" type="submit" role="button">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
    </body>
</html>

