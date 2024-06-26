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
    <script src="/Recipe_Cook/javascript/toggleMenu.js"></script>
    <title>BackOffice - Coté recette</title>
</head>

<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 bg-header">
                <div class="dashboard">
                    <div class="dashboard-nav">
                        <div class="image-menu-container">
                            <div class="image-white-filter text-center">
                                <img width="150px" src="/Recipe_Cook/assets/logo.png" alt="">
                            </div>
                            <div onclick="toggleMenu()" class="menuBurgerResp">
                                <svg class="ham hamRotate ham1" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active')">
                                <path class="line top" d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                                <path class="line middle" d="m 30,50 h 40" />
                                <path class="line bottom" d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
                                </svg>
                            </div>
                        </div>

                        <div class="navbar-collapse pt-5" id="navbarSupportedContent">
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