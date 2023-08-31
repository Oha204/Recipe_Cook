<?php 

require_once 'functions/functionSQL.php';

$id = $_GET['id'] ?? null;
// Si pas de paramètre 'id' dans l'URL
if ($id === null) {
  echo "Merci de préciser un id";
  exit;
}

$pdo = getDbConnection(); // N'oubliez pas le try/catch
// Requête préparée (recommandée) :
// 1 - Je prépare une requête (avec des paramètres de requête)
$stmtRecipeItem = $pdo->prepare("SELECT * FROM recettes WHERE id=:id_recettes");
// 2 - J'exécute ma requête préparée, en lui fournissant
// À CE MOMENT-LÀ une valeur pour mon paramètre
$stmtRecipeItem->execute(['id_recettes' => $id]);

$recette = $stmtRecipeItem->fetch(); // soit le produit, s'il est trouvé, soit false

if ($recette === false) {
  http_response_code(404);
  echo "Not found";
  exit;
}

require_once 'layout/header.php';
?>

<h2 class="text-center" style="font-weight: 600;">
  <?php echo $recette['title']; ?>
</h2>