<?php
require_once 'layout/headerback.php';
require_once 'functions/functionSQL.php';

// CO BDD + récup recettes
try {
    $recettes = getDesactivRecipes();
} catch (PDOException) {
    echo "Erreur lors de la récupération des recettes";
    exit;
} 

// Changer valeur desact
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['toggle_desact'])) {
    $toggle_id = isset($_POST['toggle_desact_id']) ? intval($_POST['toggle_desact_id']) : null;

    if ($toggle_id !== null) {
        try {
            toggleRecipeActive($toggle_id);
            echo    '<script type="text/javascript">',
                    'redirectTo("desact_recipe.php");',
                    '</script>';
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de la recette : " . $e->getMessage();
        }
    }
}
?>
<div class="col-lg-9">
    <!-- Menu -->
    <div class="container d-flex flex-column justify-content-center align-items-center mt-4">
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="active_recette.php">Recettes actives</a></li>
                <li class="nav-item"><a class="nav-link active" href="desact_recipe.php">Recettes désactivées</a></li>
            </ul>
        </nav>
    </div>

    <!-- Liste recettes désactivées -->
    <div class="container">
        <div class="row">
            <?php if (empty($recettes)) { ?>
                <div class="col-md-12 text-center mt-4 custMess">
                    <p>Aucune recette désactivée</p>
                </div>
            <?php } else { ?>
                <ul class="list-group">
                    <?php foreach ($recettes as $recette) { ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-12 px-4">
                                    <div class="d-flex justify-content-between mt-3">
                                        <div>
                                            <h3 class="recipe-title"><?php echo $recette['title']; ?></h3>

                                            <div class="d-flex recipe-category">
                                                <div class="cat">
                                                    <img src="assets/icons/<?php echo $recette['img_icon_cat']; ?>" class="recipe-icon">
                                                    <?php echo $recette['name_cat']; ?>
                                                </div>
                                            </div>

                                            <div class="mt-2 recipe-details">
                                                <p class="mb-0">Date de publication : <?php echo $recette['publication_date']; ?></p>
                                                <p class="mb-1">Note: 3/5</p> <!-- évolution : mettre en place un syst de note -->

                                                <a href="recette.php?id=<?php echo $recette['id']; ?>" class="recipe-link">Voir la recette</a>
                                            </div>
                                        </div>

                                        <div>
                                            <form method="POST" action="">
                                                <input type="hidden" name="toggle_desact_id" value="<?php echo $recette['id']; ?>">
                                                <button type="submit" class="btn btn-light pt-0 px-2" name="toggle_desact" value="1">
                                                    <img src="assets/icons/view.png" class="card-img-top btn-icon" alt="">
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>

</div>
</div>
</body>
</html>