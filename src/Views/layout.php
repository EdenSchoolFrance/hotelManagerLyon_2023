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

                <div class="hoverLink">
                    <a href="/client" class="icon"><i class="fa-solid fa-person"></i></a>
                    <p class="hidden">client</p>
                </div>
                <div class="hoverLink">
                    <a href="/backoffice/update" class="icon"><i class="fa-solid fa-utensils"></i></a>
                    <p class="hidden">réstaurent</p>
                </div>
                <div class="hoverLink">
                    <a href="/backoffice/supp" class="icon"><i class="fa-solid fa-wine-bottle"></i></a>
                    <p class="hidden">bar</p>
                </div>
                <div class="hoverLink">
                    <a href="/salle" class="icon"><i class="fa-solid fa-person-shelter"></i></a>
                    <p class="hidden">salle</p>
                </div>
                <div class="hoverLink">
                    <a href="/piscine" class="icon"><i class="fa-solid fa-water-ladder"></i></a>
                    <p class="hidden">piscine</p>
                </div>
                <div class="hoverLink">
                    <a href="/chambre" class="icon"><i class="fa-solid fa-bed"></i></a>
                    <p class="hidden">chambre</p>
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