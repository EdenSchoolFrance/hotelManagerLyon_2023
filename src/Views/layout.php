<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Manager</title>
    <script src="https://kit.fontawesome.com/51fc039d45.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/style.css">
</head>

<body class="h-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg p-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><i class="bi bi-building display-2"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item">
                            <a class="nav-link mx-2 active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Clients
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/client/nouveau">Nouveau Client</a></li>
                                <li><a class="dropdown-item" href="/client/liste">Liste</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Chambres
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/chambres">Réserver une chambres</a></li>
                                <li><a class="dropdown-item" href="/chambres/indisponnibles">Chambres occupées</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Réservations
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Salle</a></li>
                                <li><a class="dropdown-item" href="#">Piscine</a></li>
                                <li><a class="dropdown-item" href="#">Restaurant</a></li>
                                <li><a class="dropdown-item" href="#">Bar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="/stock">Stock</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="#">Menus</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <?php echo $content; ?>
    </main>
    <footer class="footer">
        <small>Copyright Hotel Management 2023</small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
