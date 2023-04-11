<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 
    <title>Voyage</title> 
    <link rel="shortcut icon" href="<?= URL . "/img/copie_low.png"?>" type="image/x-icon"> 
    <link rel="stylesheet" href="<?= URL . "/style.css" ?> "> 
 
    <script src="https://kit.fontawesome.com/ac7bce0ab5.js" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script> 

</head> 
<header> 
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/list">Liste client</a></li>
            <li><a href="/add">Ajouter client</a></li>
            <!-- <li><a href="/reservation">Faire une reservation</a></li> -->
        </ul>
    </nav>
</header> 
<main> 
    <?php echo $content; ?> 
</main> 
<footer> 

</footer> 
<body> 
<?php 
unset($_SESSION['error']); 
unset($_SESSION['old']); 
