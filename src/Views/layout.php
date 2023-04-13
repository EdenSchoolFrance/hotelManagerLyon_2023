<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— EDEN Hotel —</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/" class="logo"><img src="../pictures/logoEden.png" alt="logo EDEN Hotel"></a>
            <div class="open">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="menu closed-menu">
                <div class="close">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <ul>
                    <li>
                        <a href="/">Accueil</a>
                    </li>
                    <li>
                        <a href="/allChambres">Chambres</a>
                    </li>
                    <li>
                        <a href="/food">Restaurants/Bars</a>
                    </li>
                    <li>
                        <a href="#">Piscine</a>
                    </li>
                    <li>
                        <a href="#">Salles Evénementielles</a>
                    </li>
                    <li>
                        <a href="/clients">Nos Clients</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>
    <script src="https://kit.fontawesome.com/587bfa743c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
