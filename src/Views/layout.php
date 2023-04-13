<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 
    <title>Hotel</title> 
    <link rel="shortcut icon" href="<?= URL . "/img/logo.png" ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL . "/style.css" ?> "> 
 
    <script src="https://kit.fontawesome.com/ac7bce0ab5.js" crossorigin="anonymous"></script> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
</head> 
<body>
    <header>
        <a href="/"><img src="<?= URL . "/img/logo.png" ?>" alt="logo"></a>
        <h1>Hotel Ibis</h1>
        <nav>
            <ul>
                <li><a href="/client">Ajouter un client</a></li>
                <li><a href="/salle">Louer une salle</a></li>
                <li><a href="/piscine">Louer la piscine</a></li>
                <li><a href="/commande">Faire une commande pour un client</a></li>
                <li><a href="/restaurant">Réserver restaurant</a></li>
                <li><a href="/bar">Réserver bar</a></li>
            </ul>
        </nav>
        <button id="burger">🏨</button>
    </header>
    <main> 
        <?php echo $content; ?> 
    </main> 
<script src="js/app.js"></script>
</body>

<?php 
unset($_SESSION['error']); 
unset($_SESSION['old']); 
unset($_SESSION['success']); 
unset($_SESSION['erreur']); 