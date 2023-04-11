<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— Hotel —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/encrypt-storage@latest/dist/index.js"></script>
    <link rel="stylesheet" href="/style/css/style.css">
    <script src="/js/script.js" type="module"></script>
</head>

<body>
    <?php require VIEWS . "includes/header.php" ?>
    <header>
        <?= $header ?>
    </header>

    <?php require VIEWS . "includes/ariane.php" ?>
    <main>
        <?= $ariane ?>
        <?= $content; ?>
    </main>
    <script>
        if (window.location.href.includes("showClients") || window.location.href.includes("addClient")) {
            localStorage.removeItem("name_chambre")
            localStorage.removeItem("name_resto")
            localStorage.removeItem("name_piscine")
            localStorage.removeItem("name_salle");

            localStorage.removeItem("id_chambre");
            localStorage.removeItem("id_resto");
            localStorage.removeItem("id_piscine");
            localStorage.removeItem("id_salle");
        }
    </script>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
