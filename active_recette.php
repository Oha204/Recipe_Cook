<?php
require_once 'layout/headerback.php';
require_once 'data/recettes.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorMess.php';
//require_once 'functions/pagination.php';
require_once 'classes/Recette.php';
require_once 'functions/functionSQL.php';
require_once 'functions/deleteRecipe.php';

//CONNEXION & OUVERTURE SESSION 
session_start();

if (isset($_SESSION['email'])) {
    $welcomeMessage = "¡ Holà " . $_SESSION['email'] . " !";
} 

if (!isset($_SESSION['email'])) {
    Utils::redirect('index_connexion.php?error=' . ErrorMess::ADMIN_ACCESS_ERROR);
}

// CO BDD
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
        Utils::redirect('active_recette.php');
    }
} catch (PDOException){
        echo "Erreur lors de la suppression de la recette";
}

//BOUTON EDIT RECIPE
try {
    if (isset($_GET['id'])) {
        $id=intval($_GET['id']);
        // editRecipes($id);
        Utils::redirect('editrecipe.php');
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

<div class="d-flex justify-content-center align-items-center">
    <h2 class="mt-5 mb-4"><?php echo $welcomeMessage; ?></h2>
</div>


<!-- Menu -->

<div class="container d-flex flex-column justify-content-center align-items-center mt-4">
        <nav >
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="active_recette.php">Recettes active</a></li>
                <li class="nav-item"><a class="nav-link" href="desac_recette.php">Recettes désactivé</a></li>
            </ul>
        </nav>
</div>

<!-- Liste recettes active -->

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
                                    <h2 style="font-weight: 600;"><?php echo $recette['title'];?></h2>

                                    <div class="d-flex" style="font-size: 18px;">
                                        <div class="cat">
                                            <img src="assets/icons/<?php echo $recette['img_icon_cat']; ?>" style="width: 35px;">
                                            <?php echo $recette['name_cat']; ?>
                                        </div>
                                        
                                    </div>

                                    <div class="mt-2" style="font-size: 14px;">
                                        <p class="mb-0">Date de publication : <?php echo $recette['publication_date'];?></p>
                                        <p class="mb-1">Note: 3/5</p>

                                        <a href="recette.php?id=<?php echo $recette['id']; ?>" style="font-size: 14px;">Voir la recette</a>
                                    </div>
                                </div>
                                
                                <div>
                                    <form method="GET" action="">
                                        <a id="btn_modif" type="submit"  class="btn" style="font-size: 14px;" href="editrecipe.php?id=<?php echo $recette['id']; ?>"><img src="assets/icons/edit-button.png" class="card-img-top" alt="" style="width: 14px; margin-right: 7px;">Modifier</a>
                                        
                                        <button type="submit" class="btn btn-danger pt-0 px-2"name="id" value=<?php echo $recette['id']; ?>><img src="assets/icons/trash.png" class="card-img-top" alt="" style="width: 15px;"> </button>

                                        <button type="button" class="btn btn-light pt-0 px-2"><img src="assets/icons/view.png" class="card-img-top" alt="" style="width: 20px;" ></button>
                                    <!-- A faire : SI active = 1 alors afficher cette image, sinon afficher l'oeil baré -->
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
                    <li class="page-item <?php echo ($i == $currentpage) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>" ><?php echo $i; ?></a></li>
                <?php } ?>

                <?php if ($currentpage < $totalPages) { ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $currentpage + 1; ?>" style="color: #264653;">Suivant</a></li>
                <?php } ?>
            </ul>
        </nav>
        </div>

</body>

</html>