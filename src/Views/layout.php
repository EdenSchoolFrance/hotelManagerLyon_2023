<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grand hôtel du golfe</title>
    <!-- Logo de la page -->
    <link rel="icon" href="/assets/logo.png">
    <!-- Font family Kaushan Script -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Pacifico&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/affdc3fe7d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>

<body>

    <header>
        <a href="/" class="logo">
            <img src="/assets/logo.png" alt="logo de l'hotel">
        </a>
        <div class="burger">
            <span class="barre"></span>
            <span class="barre"></span>
            <span class="barre"></span>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="/">
                        <p>Hotel</p>
                    </a>
                </li>
                <li>
                    <a href="/catalog">Choisir une destination</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>
    <script src="/app.js"></script>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
