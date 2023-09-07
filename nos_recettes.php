<?php
require_once 'layout/header.php';
require_once 'data/recettes.php';
require_once 'classes/Recette.php';
require_once 'functions/functionSQL.php';

// CO BDD + fonction récupération recette
try {
    $recettes = getRecipesCook();
} catch (PDOException) {
    echo "Erreur lors de la récupération des produits";
    exit;
} 

// PAGINATION 
$recipesPerPage = 12;
$totalRecipes = count($recettes);
$totalPages = ceil($totalRecipes / $recipesPerPage); // calcule nombre total pages nécessaires pour afficher toutes les recettes. fonction ceil() permet d'arrondir le résultat vers le haut, car il pourrait y avoir une fraction de page.

$currentpage = isset($_GET['page']) ? $_GET['page'] : 1; //récupère numéro page actuelle à partir du paramètre d'URL 'page'. Si paramètre pas défini dans l'URL, valeur par défaut = à 1, ce qui signifie que la première page sera affichée
$start = ($currentpage - 1) * $recipesPerPage; // calcule index première recette à afficher sur la page actuelle. Ex: si nous sommes sur la page 2, cela signifie que nous avons déjà affiché 12 recettes sur la page 1, donc nous commencerons à afficher la 13e recette (index 12) sur la page 2.
$end = $start + $recipesPerPage - 1; // calcule index dernière recette à afficher sur la page actuelle en ajoutant le nombre de recettes par page et en soustrayant 1. Ex: si nous sommes sur la page 2, $start est 12, donc $end serait 12 + 12 - 1 = 23.
$end = min($end, $totalRecipes - 1); //assure que la valeur de $end n'est pas supérieure à l'index de la dernière recette disponible. Ex: si nous avons 20 recettes au total et que nous sommes sur la page 2, $end =23, mais nous voulons afficher jusqu'à la 20e recette, donc nous prenons le minimum entre 23 et 19 (20 - 1).
?>


<!-- Background image -->
<div class="text-center bg-image d-flex justify-content-center align-items-center" style="background-image: url('uploads/img/page-recette-prez.png'); height: 50vh;">
        <div>
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-2 mb-3" style="font-size: 100px; opacity: 0.5;">Toutes nos recettes !</h1>
                </div>
            </div>
        </div>
</div>
<!-- Background image -->

<!-- Block 0 : Filters -->
<div class="container mt-5 ">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="input-group gap-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par titre...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="searchButton">Rechercher</button>
                    </div>
                </div>
            </div>

<?php
//FILTRE CATEGORIE 
    // $categorie = [];

    // foreach ($categories as $categorie) {
    //     if (!in_array($categorie->getCategories(), $categorie)) {
    //         $categorie[] = $categorie->getCategories(['name']);
    //     }
    // }
    // sort($categorie);  
?>          
            
            <div class="dropdown col-md-3">
                <select id="categorySelect" class="form-control">
                    <option value="">Choisir une catégorie</option>
                        <option value="Entrée">Entrées</option>    
                        <option value="Plats chaud">Plats chaud</option>
                        <option value="Plats froid">Plats froid</option>
                        <option value="Dessert">Desserts</option>
                </select>
            </div>
        </div>
</div>

    
<!-- Block 1 : liste recette -->
<div class="container mb-5 mt-5">
    <div class="row">
        <?php 
        for ($i = $start; $i <= $end; $i++) {
            $recette = $recettes[$i]; ?>
            <div class="col-md-5 col-lg-3" id="cardset">
                <div class="card rounded h-100 justify-content-center align-items-center" style="box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);">
                    <img src="uploads/img_plat/<?php echo $recette['img_principale']?>" class="card-img-top" alt="">

                    <div class="card-body d-flex flex-column text-center h-100"> 
                        <div>
                            <h2 class="card-title"><?php echo $recette['title'];?></h2>

                            <div class="d-flex justify-content-center align-items-center mb-2">    
                                <div class="cat">
                                    <img src="assets/icons/<?php echo $recette['img_icon_cat']; ?>" style="width: 35px;">
                                    <?php echo $recette['name_cat']; ?>
                                </div>
                            </div>
                            
                        </div>

                        <div class="mb-4 mt-3">
                            <a href="recette.php?id=<?php echo $recette['id']; ?>" class="btn btn-outline-dark" id="btn_voir_plus">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    <!-- Block 2 : Pagination -->
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
        <!-- Voir si possibilité de faire une fonction que j'appelerais après (pagi présent aussi active_recette.php) -->
</div>

<?php require_once 'layout/footer.php'; ?>
</body>

</html>