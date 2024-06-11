<?php
require_once 'layout/header.php';
require_once 'classes/ErrorMess.php';
require_once 'classes/Utils.php';

$error_message = null;

// Add News User
if (isset($_POST['mail']) && isset($_POST['password'])) {
    require_once 'functions/functionSQL.php';

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    // Validation des données
    $error_message = validateUserData($mail, $password);

    if (!$error_message) {
        try {
            addUsers($mail, $password);
        } catch (PDOException) {
            $error_message = "Erreur lors de la requête";
        }
    }
}
?>

<section class="h-100 gradient-form" style="background-color: #eee;"> 
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black">
            <div class="row g-0">
                <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

            <!-- Gauche : Connexion -->
                    <div class="text-center">
                        <img src="/Recipe_Cook/assets/logo.png" style="width: 185px;" alt="logo">
                        <h4 class="mt-3 mb-3 pb-1">Connectez-vous à votre compte</h4>
                        
                        <div class="mb-4" style="color:red;">
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="error">
                                    <?php echo ErrorMess::getErrorMessage(intval($_GET['error'])); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <form id="login-form" method="POST" action="auth.php">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email"  class="form-control" placeholder="Votre adresse email"/>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control" placeholder="●●●●●●●●●"/>
                            <div>
                                <a class="text-muted" href="#!">Mot de passe oublié ?</a>
                            </div>
                        </div>

                        <div class="text-center pt-4 mb-3 pb-1">
                            <button class="btn btn-outline-dark btn-lg" id="btn_co" name="connexion" type="submit">Connexion</button> 
                        </div>
                    </form>
                </div>
                </div>

            <!-- Droite : Création -->
                <div class="col-lg-6 d-flex align-items-center justify-content-center  gradient-custom-2">
                <div class="text-white pt-5">    
                    <div class="text-center">
                        <img src="/Recipe_Cook/assets/logo.png" style="width: 185px; filter: invert(100%);" alt="logo">
                        <h4 class="mt-3">Vous n'avez pas de compte ?</h4>
                        <p class="mb-4" style="font-size: 20px;"> Créez-vous en un </p>
                    </div>

                    <?php if ($error_message) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php } ?>

                    <form method="POST" action=""> 
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="mail">Email*</label>
                                <input name="mail" type="mail" class="form-control" required />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="paswword">Mot de passe*</label>
                                <input type="password" name="password" class="form-control" required />  
                            </div>
                        </div>
                        <p class="detailpassword  mb-4">Votre mot de passe doit contenir 8 caractères minimum.</p>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="paswwordok">Confirmez votre mot de passe*</label>
                                <input type="password" name="password_verif" class="form-control" required  />
                            </div>
                        </div>

                        <div class="text-center pt-1 mb-5 pb-1">
                            <button type="submit" class="btn btn-outline-light btn-lg " role="button">S'inscrire</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
</body>

</html>