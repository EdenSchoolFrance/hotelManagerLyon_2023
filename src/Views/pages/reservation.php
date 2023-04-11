<?php ob_start() ?>
<?php $_SESSION["idUser"] = $slug ?>
<div class="reservation">
    <div class="welcome">
        <h1>welcome to the Eden Hotel</h1>
        <p>Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
    </div>
    <div class="reserv">
        <div>
            <h2>search your <span>offer</span></h2>
            <form action="/showClients" method="post">
                <div class="restaurant">
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
                <div class="chambre">
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
                    <?php if (str_contains($_SERVER["REQUEST_URI"], "error")) : ?>
                        <p class="error">Veuillez rentrer une date correcte</p>
                    <?php endif ?>
                </div>
                <div class="salle">
                    <a href="/showSalle/<?= $slug ?>">
                        Choisissez une salle
                        <span>
                            <script>
                                document.write(encryptStorage.getItem("name_salle") ?? "");
                            </script>
                        </span>
                    </a>
                </div>
                <div class="boisson">
                    <p>Choisissez votre boisson</p>
                    <div>
                        <div>
                            <label for="bar_yes">Oui</label>
                            <input type="radio" name="bar" id="bar_yes">
                        </div>
                        <div>
                            <label for="bar_no">Non</label>
                            <input type="radio" name="bar" id="bar_no">
                        </div>
                    </div>
                    <a href="/showBoisson/<?= $_SESSION["idUser"] ?>" class="none boissonLink">Voir les boissons</a>
                    <span class="none">
                        <script>
                            document.write(encryptStorage.getItem("name_boisson") ?? "");
                        </script>
                    </span>
                </div>
                <script>
                    if (encryptStorage.getItem(`id_chambre`) != null) {
                        document.write(`<input type="hidden" name="id_chambre" value="${encryptStorage.getItem("id_chambre")}">`);
                    }
                    if (encryptStorage.getItem(`id_resto`) != null) {
                        document.write(`<input type="hidden" name="id_resto" value="${encryptStorage.getItem("id_resto")}">`);
                    }

                    if (encryptStorage.getItem(`id_piscine`) != null) {
                        document.write(`<input type="hidden" name="id_piscine" value="${encryptStorage.getItem("id_piscine")}">`);
                    }

                    if (encryptStorage.getItem(`id_salle`) != null) {
                        document.write(`<input type="hidden" name="id_salle" value="${encryptStorage.getItem("id_salle")}">`);
                    }

                    if (encryptStorage.getItem(`id_boisson`) != null) {
                        document.write(`<input type="hidden" name="id_boisson" value="${encryptStorage.getItem("id_boisson")}">`);
                        document.write(`<input type="hidden" name="quantity_boisson" value="${encryptStorage.getItem("quantity_boisson")}">`);
                    }
                </script>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>