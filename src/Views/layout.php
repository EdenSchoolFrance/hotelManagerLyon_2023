<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— Hotel —</title>
    <link rel="icon" href="/avatar.ico">
    <script src="https://kit.fontawesome.com/affdc3fe7d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/" class="logo"><i class="fa-solid fa-hotel"></i></a>

                <!-- <div class="hoverLink">
                    <a href="/login" class="icon"><i class="fas fa-user-tie"></i></a>
                    <p class="hidden">Login</p>
                </div> -->
                <div class="hoverLink">
                    <a href="/dashboard/client" class="icon"><i class="fa-solid fa-bed"></i></a>
                    <p class="hidden">client</p>
                </div>
                <div class="hoverLink">
                    <a href="/dashboard/backoffice/update" class="icon"><i class="fa-solid fa-utensils"></i></a>
                    <p class="hidden">réstaurent</p>
                </div>
                <div class="hoverLink">
                    <a href="/dashboard/backoffice/supp" class="icon"><i class="fa-solid fa-wine-bottle"></i></a>
                    <p class="hidden">bar</p>
                </div>
                <div class="hoverLink">
                    <a href="/dashboard/nouveau" class="icon"><i class="fa-regular fa-square-h"></i></a>
                    <p class="hidden">salle</p>
                </div>
                <div class="hoverLink">
                    <a href="/dashboard/panier" class="icon"><i class="fa-solid fa-cart-shopping"></i></a>
                    <p class="hidden">panier</p>
                </div>
                <div class="hoverLink">
                    <a href="/dashboard/historique" class="icon"><i class="fa-solid fa-clock-rotate-left"></i></a>
                    <p class="hidden">Historique</p>
                </div>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);