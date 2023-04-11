<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDEN Hotel</title>
    <script src="https://kit.fontawesome.com/6e59f38135.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/"><img src="/img/logo.png" alt="logo"></a></li>
                <li><a href="#">Réserver une chambre</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <script>
            if (window.location.href.indexOf('reservation') === -1 && window.location.href.indexOf('Reservation') === -1) {
                localStorage.clear();
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/encrypt-storage@latest/dist/index.js"></script>
        <script>
            const encryptStorage = new EncryptStorage('secret-key-value');
        </script>
        <?php
        echo $content;
        ?>
    </main>
    <footer>

    </footer>

</body>

</html>