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
<div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <img src="assets/logo.png" width="300px" alt="">
            
            <div class="mt-4">
                <h2>Nous vous confirmons votre inscription à notre newsletter <?php echo $_GET["email"]?> !</h2>
                <a href="index.php" class="btn btn-outline-dark mt-5" id="btn_co" type="button">Retour à l'accueil</a>
            </div>
        </div>
    </div>
</body>
</html>