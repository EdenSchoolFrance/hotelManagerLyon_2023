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
                <div class="resto">
                    <a href="/showRestaurant/<?= $slug ?>">
                        Choissiez un restaurant
                    </a>
                    <div>
                        <div>
                            <label for="resto_yes">Oui</label>
                            <input type="radio" name="resto" id="resto_yes">
                        </div>
                        <div>
                            <label for="resto_no">Non</label>
                            <input type="radio" name="resto" id="resto_no">
                        </div>
                    </div>
                </div>
                <div class="chambre">
                    <a href="/showChambre/<?= $slug ?>">
                        Choisissez une chambre
                    </a>
                    <div>
                        <div>
                            <label for="chambre_yes">Oui</label>
                            <input type="radio" name="chambre" id="chambre_yes">
                        </div>
                        <div>
                            <label for="chambre_no">Non</label>
                            <input type="radio" name="bar" id="chambre_no">
                        </div>
                    </div>
                </div>
                <div class="piscine">
                    <a href="/showPiscine/<?= $slug ?>">
                        Choisissez une piscine
                    </a>
                    <div>
                        <div>
                            <label for="piscine_yes">Oui</label>
                            <input type="radio" name="piscine" id="piscine_yes">
                        </div>
                        <div>
                            <label for="piscine_no">Non</label>
                            <input type="radio" name="piscine" id="piscine_no">
                        </div>
                    </div>
                    <?php if (str_contains($_SERVER["REQUEST_URI"], "error")) : ?>
                        <p class="error">Veuillez rentrer une date correcte</p>
                    <?php endif ?>
                </div>
                <div class="salle">
                    <a href="/showSalle/<?= $slug ?>">
                        Choisissez une salle
                    </a>
                    <div>
                        <div>
                            <label for="salle_yes">Oui</label>
                            <input type="radio" name="salle" id="salle_yes">
                        </div>
                        <div>
                            <label for="salle_no">Non</label>
                            <input type="radio" name="salle" id="salle_no">
                        </div>
                    </div>
                </div>
                <div class="boisson">
                    <a href="/showBoisson/<?= $slug ?>">
                        Choisissez une boisson
                    </a>
                    <div>
                        <div>
                            <label for="boisson_yes">Oui</label>
                            <input type="radio" name="boisson" id="boisson_yes">
                        </div>
                        <div>
                            <label for="boisson_no">Non</label>
                            <input type="radio" name="boisson" id="boisson_no">
                        </div>
                    </div>
                    <a href="/showBoisson/<?= $_SESSION["idUser"] ?>" class="none boissonLink">Voir les boissons</a>
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