<?php
session_start();

if (isset($_SESSION['email'])) {
    $welcomeMessage = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/boostrap.min.css" />
    <link rel="stylesheet" href="/Recipe_Cook/assets/styleBack.css">

    <script src="/Recipe_Cook/javascript/redirectTo.js"></script>
    <title>BackOffice - Coté recette</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 bg-header">
                <div class="dashboard">
                    <div class="dashboard-nav">
                        <div href="index.php" class="image-white-filter text-center pb-4">
                            <img width="150px" src="/Recipe_Cook/assets/logo.png" alt="">
                        </div>

                        <div class="iconprofilbloc pt-1 pb-3">
                            <div class="profile-picture">
                                <img src="/Recipe_Cook/assets/icons/profil.png" width="45px;" class="image-white-filter" alt="icon profil">
                            </div>
                            <div class="text-white m-0">
                                <p class="txt-cust-hello">Bonjour</p>
                                <p><?php echo $welcomeMessage; ?> !</p>
                            </div>
                        </div>
                        
                        <div class="lineCust mt-3"></div>

                        <nav class="pt-3">
                            <div class="d-flex flex-column">
                                <a href="../Recipe_Cook/active_recette.php" class="dashboard-nav-item">
                                    <img src="/Recipe_Cook/assets/icons/liste.png" class="image-white-filter" alt="Icône de liste"> 
                                    Liste Recettes 
                                </a>
                                <a href="addrecette.php" class="dashboard-nav-item">
                                    <img src="/Recipe_Cook/assets/icons/add.png" class="image-white-filter" alt="Icône add recipe">
                                    Add new
                                </a>
                            </div>

                            <div class="nav-item-divider"></div>

                            <div class="d-flex flex-column btn-container gap-2">
                                <a href="../Recipe_Cook/index.php" class="btn " id="btn_deco" type="button">Retour Site</a>
                                <a href="logout.php" class="btn " id="btn_deco" type="button">Se déconnecter</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>



<!-- <div class='dashboard-nav-dropdown'>
    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-photo-video"></i> User </a>
    <div class='dashboard-nav-dropdown-menu'>
        <a href="#" class="dashboard-nav-dropdown-item">Administrateur</a>
        <a href="#" class="dashboard-nav-dropdown-item">utilisateurs</a>
    </div>
</div> 

/* 
.dashboard-nav-dropdown {
    background: #443ea2;
} */

/* .dashboard-nav-dropdown-menu {
    display: none;
    padding-left: 20px;
} */

/* .dashboard-nav-dropdown-toggle:after {
    content: ">";
    float: right;
    transform: rotate(90deg);
} */

/* .dashboard-nav-dropdown-toggle:hover + .dashboard-nav-dropdown-menu {
    display: block;
} */

/* .dashboard-content {
    margin-left: 238px;
    width: calc(100% - 238px);
} */

/* .custom-header {
    display: flex;
    justify-content: flex-end;
    padding: 20px;
    background: #f8f9fa;
} */
-->