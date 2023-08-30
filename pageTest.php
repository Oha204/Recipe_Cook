<?php
require_once 'layout/header.php';
require 'functions/functionSQL.php';

try {
    $recettes = getRecipesCook();
} catch (PDOException) {
    echo "Erreur lors de la récupération des produits";
    exit;
}

foreach ($recettes as $recette) { ?>
        <div>
    <h2>
        <a href="recettes.php?id=<?php echo $recettes['id']; ?>">
        <?php echo $recettes['title']; ?>
        </a>
    </h2>
</div>
    <?php } ?>


<?php require_once 'layout/footer.php'; ?>
</body>

</html>