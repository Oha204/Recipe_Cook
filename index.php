<?php
require_once 'layout/header.php';
require_once 'data/recettes.php';
require_once 'functions/functionSQL.php';
?>

<?php 
if (isset($_POST['email'])) { // Formulaire soumis
    require_once 'classes/DuplicateChecker.php';
    require_once 'classes/Email.php';
    require_once 'classes/EmailFile.php';
    require_once 'classes/Utils.php';
    
    try {
        $email = new Email($_POST['email']);
        $emailsFile = new EmailFile(new DuplicateChecker());
        $emailsFile->add($email);
        Utils::redirect('confirm_sub.php?email=' . $_POST['email']);
    } catch (Exception $ex) {
        $errorMessage = $ex->getMessage();  
    }
}

$recettes = getActiveRecipes();
?>

<!-- Background image -->
<div class="background-image-container text-center d-flex justify-content-center align-items-center">
    <div class="text-white fade-in custAnim">
        <img class="bi mb-4 logoInverted" src="/Recipe_Cook/assets/logo.png" alt="">
        <h4 class="mb-5">Découvrez comment préparer de bons petits plats pas-à-pas grâce à de nombreuses recettes.<br />Plats chauds, desserts, apéros, cocktails, vous y trouverez votre bonheur !</h4>
        <a class="btn btncust btn-outline-light btn-lg" href="nos_recettes.php" role="button">C'est par ici</a>
    </div>
</div>


<!-- Block 1 : the news -->
<h2 class="titleh2 text-center">Les dernières nouveautés</h2>
    <div class="container">
        <div class="row justify-content-center">
            <?php 
                $count = 0; 
                foreach ($recettes as $recette) { 
                    if ($count < 4) { 
            ?>
            
            <div class="col-md-5 col-lg-3">
                <div class="card rounded h-100 justify-content-center align-items-center custom-card">
                    <img src="uploads/img_plat/<?php echo $recette['img_principale']?>" class="card-img-top" alt="">
                    
                    <div class="card-body d-flex flex-column text-center h-100"> 
                        <div>
                            <h3 class="card-title"><?php echo $recette['title']; ?></h3>
                            
                            <div class="d-flex justify-content-center align-items-center mb-2">    
                                <div class="cat">
                                    <img src="assets/icons/<?php echo $recette['img_icon_cat']; ?>" class="cat-icon">
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

            <?php 
                $count++; 
                } 
            ?>
            <?php } ?>
        </div>
    </div>

<!-- Block 2 : newsletter suscribe -->
<div id="NL" class="row p-5 align-baseline custom-background">
    <div class="col-md-5 offset-md-1 mb-3">
        <h5 class="title-heading">Inscrivez-vous à notre newsletter</h5>

        <form method="POST" action="">
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <input type="text" class="form-control"  name="email"  placeholder="Votre adresse email">
                <button class="btn btn-primary" type="submit" >S'inscrire</button>
            </div>
        </form>

        <p class="mt-3">
            <?php if (isset($errorMessage)) { ?>
                <div class="alert alert-danger">
                    <?php echo $errorMessage; ?>
                </div>
            <?php } ?>
        </p>
    </div>

    <div class="col-md-4 d-flex justify-content-center align-items-center">
        <p class="text-end">Pour ne rien manquer des nouveautés ! Des recettes exclusives vous y attendent, des jeux concours mais aussi pleins d'autres choses.</p>
    </div>
</div>



<?php require_once 'layout/footer.php'; ?>
</body>

</html>