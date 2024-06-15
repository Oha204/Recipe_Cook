<?php
require_once 'layout/headerBack.php';

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
    echo    '<script type="text/javascript">',
            'redirectTo("active_recette.php");',
            '</script>';
        } catch (PDOException) {
        echo "Erreur lors de la requête";
        exit;
    }
}
?>
<div class="col-md-9">
    <h2 class="d-flex justify-content-center align-items-center pb-2 mb-5 mt-5 text-center">Modifier votre recette :<br/><?php echo $recette['title'] ?></h2>

    <div class="container mt-5">
    <div class="row">
        <form enctype="multipart/form-data" method="POST">
            <div class="mb-3 form-group">
                <label for="title" class="form-label mb-2">Titre</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Votre titre" value="<?php echo $recette['title']?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="author" class="form-label mb-2">Auteur</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="L'auteur" value="<?php echo $recette['author']?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="categories_id" class="form-label mb-2">Catégorie</label>
                <select class="form-select" id="categories_id" name="categories_id">
                    <option name="Entrée" value="1">Entrée</option>
                    <option name="Plat chaud" value="2">Plat chaud</option>
                    <option name="Plat froid" value="3">Plat froid</option>
                    <option name="Dessert" value="4">Dessert</option>
                </select>
            </div>

            <div class="mb-3 form-group">
                <label for="publication_date" class="form-label mb-2">Date de publication</label>
                <input type="date" class="form-control" id="publication_date" name="publication_date" required value="<?php echo $recette['publication_date']?>">
            </div>

            <div class="mb-3 form-group">
                <label for="ingredient" class="form-label mb-2">Ingrédients (un par ligne)</label>
                <textarea class="form-control" id="ingredient" name="ingredient" rows="4" placeholder="Vos ingrédients ..." required><?php echo $recette['ingredient']?></textarea>
            </div>

            <div class="mb-3 form-group">
                <label for="cooking_tool" class="form-label mb-2">Ustensiles (un par ligne)</label>
                <textarea class="form-control" id="cooking_tool" name="cooking_tool" rows="4" placeholder="Vos ustensiles ..." required><?php echo $recette['cooking_tool']?></textarea>
            </div>

            <div class="mb-3 form-group">
                <label for="steps" class="form-label mb-2">Étapes de préparation (une par ligne)</label>
                <textarea class="form-control" id="steps" name="steps" rows="10" placeholder="Vos étapes de préparation." required><?php echo $recette['steps']?></textarea>
            </div>

            <div class="mb-3 form-group">
                <label for="AllImgRecipe" class="form-label mb-2">Modifiez vos photos :</label>
                <div class="row" id="img_edit">
                    <div class="col-md-3">
                        <img src="uploads/img_plat/<?php echo $recette['img_principale']?>" class="d-block w-100 fixed-image">
                        <p>Image principale</p>
                    </div>
                    <div class="col-md-3">
                        <img src="uploads/img_plat/<?php echo $recette['img_second']?>" class="d-block w-100 fixed-image">
                        <p>Image #1</p>
                    </div>
                    <div class="col-md-3">
                        <img src="uploads/img_plat/<?php echo $recette['img_tert']?>" class="d-block w-100 fixed-image">
                        <p>Image #2</p>
                    </div>
                    <div class="col-md-3">
                        <img src="uploads/img_plat/<?php echo $recette['img_quatr']?>" class="d-block w-100 fixed-image">
                        <p>Image #3</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <button class="btn btn-outline-light mb-4" id="btn_addnew" type="submit" role="button">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

</div>
</div>
    </body>
</html>