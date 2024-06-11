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
            
        <div class="dropdown col-md-3" style="display: flex; align-items: center;">
            <select id="categorySelect" class="form-control" onchange="filterByCategory()">
                <option value="">Choisir une catégorie</option>
                <option value="Entrée">Entrées</option>
                <option value="Plat chaud">Plats chaud</option>
                <option value="Plat froid">Plats froid</option>
                <option value="Dessert">Desserts</option>
            </select>

            <span id="resetFilterButton" onclick="resetFilter()" >
                <img src="assets/icons/delete.png" alt="Réinitialiser" class="iconDelete">
            </span>
        </div>
    </div>
</div>

<!-- Block 1 : liste recette -->
<div class="container mb-5 mt-5">
    <div class="row">
        <?php foreach ($recettes as $recette) { ?>
            <div class="col-md-5 col-lg-3 recipe-card <?php echo $recette['name_cat']; ?>" data-category="<?php echo $recette['name_cat']; ?>">
                <div class="card rounded h-100 justify-content-center align-items-center <?php echo $recette['name_cat']; ?>" style="box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);">
                    <img src="uploads/img_plat/<?php echo $recette['img_principale']?>" class="card-img-top" alt="">

                    <div class="card-body d-flex flex-column text-center h-100"> 
                        <h3 class="card-title"><?php echo $recette['title'];?></h3>
                        <div class="d-flex justify-content-center align-items-center mb-2">    
                            <div class="cat">
                                <img src="assets/icons/<?php echo $recette['img_icon_cat']; ?>" style="width: 35px;">
                                <?php echo $recette['name_cat']; ?>
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
</div>

<?php require_once 'layout/footer.php'; ?>
</body>
</html>
