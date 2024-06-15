<?php
require_once 'layout/headerBack.php';
require_once 'functions/addrecipe.php';

// Add New Recipe
if (isset($_POST['title']) && 
    isset($_POST['author']) && 
    isset($_POST['publication_date']) && 
    isset($_FILES['img_principale']['name']) && 
    isset($_FILES['img_second']['name']) &&
    isset($_FILES['img_tert']['name']) &&
    isset($_FILES['img_quatr']['name']) &&
    isset($_POST['ingredient']) && 
    isset($_POST['cooking_tool']) && 
    isset($_POST['steps']) && 
    isset($_POST['categories_id'])
    ) { 
        require_once 'functions/addrecipe.php';
        require_once 'functions/upload_img.php';
        try {
            addRecipes(); 
            uploadImg(); 
            echo    '<script type="text/javascript">',
                    'redirectTo("active_recette.php");',
                    '</script>';
        } catch (PDOException $e) {
            echo "Erreur lors de la requête : " . $e->getMessage();
            exit;
        }
    }
?>
<div class="col-lg-9">
    <div><h2 class="d-flex justify-content-center align-items-center pb-2 mb-5 mt-5">Ajouter une nouvelle recette</h2></div>

    <div class="container mt-4">
        <div class="row">
            <form enctype="multipart/form-data" method="POST">
                <div class="mb-3 form-group">
                    <label for="title" class="form-label mb-2">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Votre titre" required>
                </div>

                <div class="mb-3 form-group">
                    <label for="author" class="form-label mb-2">Auteur</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="L'auteur" required>
                </div>

                <div class="mb-3 form-group">
                    <label for="publication_date" class="form-label mb-2">Date de publication</label>
                    <input type="date" class="form-control" id="publication_date" name="publication_date" required>
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
                    <label for="img_principale" class="form-label mb-2">Image principale</label>
                    <input type="file" class="form-control" name="img_principale">
                </div>

                <div class="mb-3 form-group">
                    <label for="img_second" class="form-label mb-2">Images complémentaires #1</label>
                    <input type="file" class="form-control" id="img_second" name="img_second" accept="image/*" multiple>
                </div>

                <div class="mb-3 form-group">
                    <label for="img_tert" class="form-label mb-2">Image complémentaires #2</label>
                    <input type="file" class="form-control" id="img_tert" name="img_tert" accept="image/*">
                </div>

                <div class="mb-3 form-group">
                    <label for="img_quatr" class="form-label mb-2">Images complémentaires #3</label>
                    <input type="file" class="form-control" id="img_quatr" name="img_quatr" accept="image/*" multiple>
                </div>

                <div class="mb-3 form-group">
                    <label for="ingredient" class="form-label mb-2">Ingrédients (un par ligne)</label>
                    <textarea class="form-control" id="ingredient" name="ingredient" rows="4" placeholder="Vos ingrédients ..." required></textarea>
                </div>

                <div class="mb-3 form-group">
                    <label for="cooking_tool" class="form-label mb-2">Ustensiles (un par ligne)</label>
                    <textarea class="form-control" id="cooking_tool" name="cooking_tool" rows="4" placeholder="Vos ustensiles ..." required></textarea>
                </div>

                <div class="mb-3 form-group">
                    <label for="steps" class="form-label">Étapes de préparation (une par ligne)</label>
                    <textarea class="form-control" id="steps" name="steps" rows="10" placeholder="Vos étapes de préparation" required></textarea>
                </div>

                <div class="col-md-12 text-center mt-3">
                    <button class="btn btn-outline-light mb-4" id="btn_addnew" type="submit" role="button">Publier</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>
    </body>
</html>