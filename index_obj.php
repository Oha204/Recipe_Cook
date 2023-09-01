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


$recettes = getRecipesCook();
?>

<!-- Background image -->
<div class="text-center bg-image d-flex justify-content-center align-items-center" style="background-image: url('uploads/img/home_img.png'); height: 50vh;">
        <div>
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-2 mb-3">Coté recette est là pour vous ! </h1>
                    <h4 class="mb-4 mb-5">Découvrez comment préparer de bons petits plats pas-à-pas grâce à de nombreuses recettes. <br /> Plats chauds, desserts, apéros, cocktails, vous y trouverez votre bonheur ! </h4>
                    <a class="btn btn-outline-light btn-lg " href="nos_recettes.php" role="button">C'est par ici</a>
                </div>
            </div>
        </div>
</div>
<!-- Background image -->


<!-- Block 1 : the news -->
<h2 class="text-center mb-5 mt-5">Les dernières nouveautés</h2>
    <div class="container">
        <div class="row justify-content-center">
            <?php 
                $count = 0; 
                foreach ($recettes as $recette) { 
                    if ($count < 4) { 
            ?>
            
            <div class=" col-md-5 col-lg-3 ">
                <div class="card rounded h-100 justify-content-center align-items-center" style="box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);">
                    <img src="uploads/img_plat/<?php echo $recette['img_principale']?>" class="card-img-top" alt="">
                    
                    <div class="card-body d-flex flex-column text-center h-100"> 
                        <div>
                            <h2 class="card-title"><?php echo $recette['title']; ?></h2>
                            
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
            
            <?php 
                $count++; 
                } 
            ?>
            <?php } ?>
        </div>
    </div>

<!-- Block 2 : newsletter suscribe -->
<div id="NL" class="row p-5 align-baseline" style="background-color: rgba(0, 192, 146, 0.3)">
    <div class="col-md-5 offset-md-1 mb-3">
            <h5 style="font-size: 32px; font-weight: bold; margin-bottom: 20px;">Inscrivez-vous à notre newsletter</h5>

        <form method="POST" action="">
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <input type="text" class="form-control"  name="email"  placeholder="Votre adresse email">
                <button class="btn btn-primary" type="submit" >S'inscrire</button>
            </div>
        </form>

        <p class="mt-3" >
            <?php if (isset($errorMessage)) { ?>
                <div class="alert alert-danger">
                    <?php echo $errorMessage; ?>
                </div>
            <?php } ?>
        </p>
    </div>

    <div class="col-md-3 " >
        <p class="text-end">Pour ne rien manquer des nouveautés ! Des recettes exclusives vous y attendent, des jeux concours mais aussi pleins d'autres choses.</p>
    </div>
</div>


<?php require_once 'layout/footer.php'; ?>
</body>

</html>