<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phoenix Holiday</title>
    <link rel="icon" href="/assets/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/affdc3fe7d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>

<body>

    <header>
        <a href="/" class="logo">
            <img src="/assets/logo.png" alt="logo phoenix">
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
                        <p>Phoenix</p>
                    </a>
                </li>
                <li>
                    <a href="/catalog">Choisir une destination</a>
                </li>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <li>
                        <a href="/logout">se déconecter</a>
                    </li>
                <?php
                }
                ?>
                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <li>
                        <a href="/login">Login</a>
                    </li>
                    <li>
                        <a href="/register">Register</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <div class="burger">
            <span class="barre"></span>
            <span class="barre"></span>
            <span class="barre"></span>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="/catalog"><i class="fa-solid fa-umbrella-beach"></i> Vos vacances de rêve ... </a>
                </li>
                <li>
                    <a href="/filtered/Plage"><i class="fa-solid fa-sun"></i> Plage ... </a>
                </li>
                <li>
                    <a href="/filtered/Urbain"><i class="fa-solid fa-building"></i> Urbaine ... </a>
                </li>
                <li>
                    <a href="/filtered/Croisière"><i class="fa-solid fa-sailboat"></i> Croisière ... </a>
                </li>
                <li>
                    <a href="/filtered/Montagne"><i class="fa-solid fa-image"></i> Montagne ... </a>
                </li>
                <li>
                    <a href="/filtered/prix/"><i class="fa-solid fa-euro-sign"></i> A prix tout doux ... <i class="fa-solid fa-umbrella-beach"></i></a>
                </li>
            </ul>
        </nav>

    </footer>
    <script src="/app.js"></script>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
