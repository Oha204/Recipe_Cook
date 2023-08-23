<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/boostrap.min.css" />
    <link rel="stylesheet" href="/assets/style.css">
    <title>Recette cuisine</title>
</head>

<body>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between border-bottom" >
            <a href="../index_obj.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 ">
                <img class="bi me-2" width="200px" src ="/assets/logo.png" alt="" style="padding-left: 80px;">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../index_obj.php" class="nav-link px-2 link-secondary">Accueil</a></li>
                <li><a href="../nos_recettes.php" class="nav-link px-2 link-dark">Nos recettes</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQ</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Contact</a></li>
            </ul>

            <div class="text-center pt-4 mb-3 pb-1 col-md-3 text-end">
                <?php if (isset($_SESSION['email'])) { ?>
                    <a href="logout.php" class="btn btn-outline-danger" id="btn_deco" type="button">Se déconnecter</a>
                    
                <?php } else { ?>
                    <a href="index_connexion.php" class="btn btn-outline-dark" id="btn_co" type="button">Se connecter</a> 
                <?php } ?>

                <a href="active_recette.php" class="btn btn-outline-light" id="btn_addnew" type="button">Backoffice</a> <!-- Pour plus tard : faire en sorte que le bouton n'apparaisse que lorsque la session administrateur est lancé (invisible lorsqu'on n'est pas co) -->
            </div>
            


    </header>
