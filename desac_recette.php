<?php
require_once 'layout/headerback.php';
require_once 'data/recettes.php';
?>

<!-- Menu -->

<div class="container d-flex flex-column justify-content-center align-items-center mt-4">
        <nav >
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="active_recette.php">Recettes active</a></li>
                <li class="nav-item"><a class="nav-link active" href="desac_recette.php">Recettes désactivé</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Poubelle</a></li>
            </ul>
        </nav>
    </div>