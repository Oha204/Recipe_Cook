<?php
require_once 'layout/header.php';
require_once 'functions/functionSQL.php';



// J'extraie l'ID de l'URL
$id = $_GET['id'] ?? null;

if ($id === null) { 
    echo "Merci de préciser un id";
    exit;
}
// CO à la BDD
$pdo = getDbConnection();

$stmtRecipeItem = $pdo->prepare("SELECT * FROM recettes WHERE id=:id_recette");
$stmtRecipeItem->execute(['id_recette' => $id]);

$recette = $stmtRecipeItem->fetch(); // soit le produit, s'il est trouvé, soit false


// Vérification de l'existence de l'ID dans le tableau 
if ($recette === false) {
    http_response_code(404);
    echo "Not found";
    exit;
}

?>

<!-- Détails Page recette en fonction de l'iD -->
<!-- Left part -->
        <div class="row"> 
            <div class="col-md-8 p-0"> 
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="uploads/img/<?php echo $recette['img_second']?>" class="d-block w-100" alt="<?php echo $recette['title'];?>">
                        </div>
                        <div class="carousel-item">
                            <img src="uploads/img/<?php echo $recette['img_tert']?>" class="d-block w-100" alt="<?php echo $recette['title'];?>">
                        </div>
                        <div class="carousel-item">
                            <img src="uploads/img/<?php echo $recette['img_quatr']?>" class="d-block w-100" alt="<?php echo $recette['title'];?>">
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
                            <p class="text-center">Auteur : <?php echo $recette['author'];?></p>
                            <h2 class="text-center" style="font-weight: 600;"><?php echo $recette['title'];?></h2>
                        </div>

                        <div class="row">
                            <p class="mb-5">
                                <div class="cat">
                                    <img src="assets/icons/<?php echo $recette['img_icon_cat']; ?>" style="width: 35px;">
                                    <?php echo $recette['name_cat']; ?>
                                </div>
                            </p>
                            <p class="mb-0">Date de publication : <?php echo $recette['publication_date']; ?></p>
                        </div>
                    </div>

                    <div>
                        <h4 class="my-3">Ingrédients</h4>
                        <ul>
                            <li><?php echo $recette['ingredient']; ?></li>
                        </ul>
                    </div>    

                    <div>
                        <h4 class="mb-3">Ustensiles</h4>
                        <ul>
                            <li><?php echo $recette['cooking_tool']; ?></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="mb-3">Préparation</h4>
                        <ul>
                            <li><?php echo $recette['steps']; ?></li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-center mb-0 border-top" style="background-color: #264653;">
                    <p class="mt-3 text-white">© 2022 Company, Inc. All rights reserved.</p>
                </div>
            </div>    
        </div> 

    </body>
</html>