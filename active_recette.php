<?php
//require_once 'functions/pagination.php'; 
//require_once 'classes/Recette.php';
//require_once 'data/recettes.php';
require_once 'layout/headerback.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorMess.php';
require_once 'functions/functionSQL.php';
require_once 'functions/deleteRecipe.php';

//CONNEXION & OUVERTURE SESSION 


if (!isset($_SESSION['email'])) {
    Utils::redirect('index_connexion.php?error=' . ErrorMess::ADMIN_ACCESS_ERROR);
}

// CO BDD + récup recettes
try {
    $recettes = getRecipesCook();
} catch (PDOException) {
    echo "Erreur lors de la récupération des recettes";
    exit;
} 

//BOUTON DELETE RECIPE
try {
    if (isset($_GET['id'])) {
        $id=intval($_GET['id']);
        deleteRecipes($id);
        echo    '<script type="text/javascript">',
                'redirectTo("active_recette.php");',
                '</script>';
    }
} catch (PDOException){
        echo "Erreur lors de la suppression de la recette";
}

//BOUTON EDIT RECIPE
try {
    if (isset($_GET['id'])) {
        $id=intval($_GET['id']);
        echo    '<script type="text/javascript">',
                'redirectTo("editrecipe.php");',
                '</script>';
    }
} catch (PDOException){
        echo "Erreur lors de la requête !";
}

//PAGINATION 
$recipesPerPage = 10;
$totalRecipes = count($recettes);
$totalPages = ceil($totalRecipes / $recipesPerPage); 

$currentpage = isset($_GET['page']) ? $_GET['page'] : 1; 
$start = ($currentpage - 1) * $recipesPerPage; 
$end = $start + $recipesPerPage - 1; 
$end = min($end, $totalRecipes - 1); 
?>
<div class="col-md-9">
    <!-- Menu -->
    <div class="container d-flex flex-column justify-content-center align-items-center mt-4">
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="active_recette.php">Recettes actives</a></li>
                <li class="nav-item"><a class="nav-link" href="desact_recipe.php">Recettes désactivées</a></li>
            </ul>
        </nav>
    </div>

    <!-- Liste recettes actives -->
    <div class="container">
        <div class="row">
            <ul class="list-group">
                <?php for ($i = $start; $i <= $end; $i++) {
                    $recette = $recettes[$i]; ?>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-12 px-4">
                                <div class="d-flex justify-content-between mt-3">
                                    <div>
                                        <h3 class="recipe-title"><?php echo $recette['title'];?></h3>

                                        <div class="d-flex recipe-category">
                                            <div class="cat">
                                                <img src="assets/icons/<?php echo $recette['img_icon_cat']; ?>" class="recipe-icon">
                                                <?php echo $recette['name_cat']; ?>
                                            </div>
                                        </div>


                                        <div class="mt-2 recipe-details">
                                            <p class="mb-0">Date de publication : <?php echo $recette['publication_date'];?></p>
                                            <p class="mb-1">Note: 3/5</p> <!-- évolution : mettre en place un syst de note -->

                                            <a href="recette.php?id=<?php echo $recette['id']; ?>" class="recipe-link">Voir la recette</a>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <form method="GET" action="">
                                            <a id="btn_modif" type="submit" class="btn" href="editrecipe.php?id=<?php echo $recette['id']; ?>"><img src="assets/icons/edit-button.png" class="card-img-top btn-icon" alt="">Modifier</a>
                                            
                                            <button type="submit" class="btn btn-danger pt-0 px-2" name="id" value=<?php echo $recette['id']; ?>><img src="assets/icons/trash.png" class="card-img-top btn-icon" alt=""></button>

                                            <button type="button" class="btn btn-light pt-0 px-2"><img src="assets/icons/view.png" class="card-img-top btn-icon" alt=""></button>
                                            <!-- évolution : activation/désactivation recette. (Si active = 1 alors afficher cette image, sinon afficher l'oeil barré) -->
                                        </form>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($currentpage > 1) { ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $currentpage - 1; ?>" style="color: #264653;">Précédent</a></li>
                <?php } ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item <?php echo ($i == $currentpage) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>

                <?php if ($currentpage < $totalPages) { ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $currentpage + 1; ?>" style="color: #264653;">Suivant</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>

</div>
</div>
</body>
</html>
