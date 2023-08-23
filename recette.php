<?php
require_once 'layout/header.php';
require_once 'classes/Recette.php';


if (!isset($_GET['id'])) { // Si pas de paramètre 'id' dans l'URL
  // Redirection
    header('Location: index_obj.php');
    exit;
}

// J'extraie l'ID de l'URL
$id = intval($_GET['id']);

// Je récupère mes données de recettes
require_once 'data/recettes.php';

// J'extraie tous les ID de toutes les recettes dans un tableau "ids"
$ids = array_map(fn (Recette $recipe) => $recipe->getId(), $recipesObjects);

// Je cherche l'ID de l'URL dans le tableau des ID des recettes
$recipeKey = array_search($id, $ids);

// Vérification de l'existence de l'ID dans le tableau 
if ($recipeKey === false) {
    http_response_code(404);
    echo "Produit non trouvé";
    exit;
}

$selectedRecipe = $recipesObjects[$recipeKey];
//var_dump($recipesObjects[$recipeKey]);
?>

<!-- Détails Page recette en fonction de l'iD -->
<!-- Left part -->
<?php if ($selectedRecipe) : ?>
        <div class="row"> 
            <div class="col-md-8 p-0"> 
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="uploads/img/curry-lentilles-chou-fleur2.png" class="d-block w-100" alt="<?php echo $selectedRecipe->getTitre(); ?>">
                        </div>
                        <div class="carousel-item">
                            <img src="uploads/img/curry-lentilles-chou-fleur.png" class="d-block w-100" alt="<?php echo $selectedRecipe->getTitre(); ?>">
                        </div>
                        <div class="carousel-item">
                            <img src="uploads/img/curry-lentilles-chou-fleur3.png" class="d-block w-100" alt="<?php echo $selectedRecipe->getTitre(); ?>">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev" style="color: black;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

<!-- Right part -->        
            <div class="col-md-4 mt-md-0 p-0" style="overflow-y: auto; max-height: calc(100vh - 60px);"> 
                <div style="padding-left: 40px; padding-right: 80px; padding-top: 40px; padding-bottom: 30px;">  
                    <div>
                        <div class="px-5 pb-3">
                            <p class="text-center">Auteur : <?php echo $selectedRecipe->getAuteur(); ?></p>
                            <h2 class="text-center" style="font-weight: 600;"><?php echo $selectedRecipe->getTitre(); ?></h2>
                        </div>

                        <div class="row">
                            <p class="mb-5">
                                <?php 
                                    foreach ($selectedRecipe->getCategories() as $catIndex) { ?>
                                        <div class="">
                                            <img src="<?php echo $categorie[$catIndex]['img']; ?>" style="width: 25px;">
                                            <?php echo $categorie[$catIndex]['name']; ?>
                                        </div> 
                                <?php } ?>
                            </p>
                            <p class="mb-0">Date de publication : <?php echo $selectedRecipe->getDatePubli(); ?></p>
                        </div>
                    </div>

                    <div>
                        <h4 class="my-3">Ingrédients</h4>
                        <ul>
                            <?php foreach ($selectedRecipe->getIngredients() as $ingredient) { ?>
                                <li><?php echo $ingredient; ?></li>
                            <?php } ?>
                        </ul>
                    </div>    

                    <div>
                        <h4 class="mb-3">Ustensiles</h4>
                        <ul>
                            <?php foreach ($selectedRecipe->getUstensiles() as $ustensil) { ?>
                                <li><?php echo $ustensil; ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div>
                        <h4 class="mb-3">Préparation</h4>
                        <ul>
                            <?php foreach ($selectedRecipe->getPreparation() as $step => $description) { ?>
                                <li><?php echo $step; ?>: <?php echo $description; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-center mb-0 border-top" style="background-color: #264653;">
                    <p class="mt-3 text-white">© 2022 Company, Inc. All rights reserved.</p>
                </div>
            </div>    
        </div> 

<?php else : ?>
    <p class="">Recette non trouvée. Sorry not sorry.</p>
<?php endif; ?>

    </body>
</html>