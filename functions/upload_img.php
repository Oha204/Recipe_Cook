<?php

// Uploads image principale recettes

function uploadImg() {
    if (isset($_FILES['img_principale']) && $_FILES['img_principale']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['img_principale'];
    
        $filename = $file['name'];
        $destination = 'uploads/img_plat/' . $filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            echo "<p>Fichier enregistré</p>";
            }
    } 

    if (isset($_FILES['img_second']) && $_FILES['img_second']['error'] === UPLOAD_ERR_OK) {
        $file1 = $_FILES['img_second'];
    
        $filename1 = $file1['name'];
        $destination1 = 'uploads/img_plat/' . $filename1;

        if (move_uploaded_file($file1['tmp_name'], $destination1)) {
            echo "<p>Fichier enregistré</p>";
            }
    } 

    if (isset($_FILES['img_tert']) && $_FILES['img_tert']['error'] === UPLOAD_ERR_OK) {
        $file2 = $_FILES['img_tert'];
    
        $filename2 = $file2['name'];
        $destination2 = 'uploads/img_plat/' . $filename2;

        if (move_uploaded_file($file2['tmp_name'], $destination2)) {
            echo "<p>Fichier enregistré</p>";
            }
    } 

    if (isset($_FILES['img_quatr']) && $_FILES['img_quatr']['error'] === UPLOAD_ERR_OK) {
        $file3 = $_FILES['img_quatr'];
    
        $filename3 = $file3['name'];
        $destination3 = 'uploads/img_plat/' . $filename3;
    
        if (move_uploaded_file($file3['tmp_name'], $destination3)) {
            echo "<p>Fichier enregistré</p>";
            }
    } 

    
}