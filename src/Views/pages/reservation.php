<?php ob_start() ?>

<div class="reservation">
    <div class="welcome">
        <h1>welcome to the Eden Hotel</h1>
        <p>Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
    </div>
    <div class="reserv">
        <div>
            <h2>search your <span>offer</span></h2>
            <form action="/showClients" method="post">
                <div>
                    <a href="/showRestaurant/<?= $slug ?>">
                        Choissiez un restaurant
                        <span>
                            <script>
                                const encryptStorage = new EncryptStorage("storageType");
                                document.write(encryptStorage.getItem("name_resto") ?? "");
                            </script>
                        </span>
                    </a>
                </div>
                <div>
                    <a href="/showChambre/<?= $slug ?>">
                        Choisissez une chambre
                        <span>
                            <script>
                                document.write(encryptStorage.getItem("name_chambre") ?? "");
                            </script>
                        </span>
                    </a>
                </div>
                <div class="piscine">
                    <a href="/showPiscine/<?= $slug ?>">
                        Choisissez une piscine
                        <span>
                            <script>
                                document.write(encryptStorage.getItem("name_piscine") ?? "");
                            </script>
                        </span>
                    </a>
                </div>
                <div>
                    <a href="/showSalle/<?= $slug ?>">
                        Choisissez une salle
                        <span>
                            <script>
                                document.write(encryptStorage.getItem("name_salle") ?? "");
                            </script>
                        </span>
                    </a>
                </div>
                <script>
                    document.write(`<input type="hidden" name="id_chambre" value="${encryptStorage.getItem("id_chambre")}">`);
                    document.write(`<input type="hidden" name="id_resto" value="${encryptStorage.getItem("id_resto")}">`);
                    document.write(`<input type="hidden" name="id_piscine" value="${encryptStorage.getItem("id_piscine")}">`);
                    document.write(`<input type="hidden" name="id_salle" value="${encryptStorage.getItem("id_salle")}">`);
                </script>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</div>

<?php
require "../src/Controllers/Breadcrumbs.php";
$breadcrumbs = new Breadcrumbs();

$breadcrumbs->add('Accueil', '/');
$breadcrumbs->add('ShowClients', '/ShowClients');

$breadcrumbs->display();

$content = ob_get_clean();
require VIEWS . "layout.php";
?>