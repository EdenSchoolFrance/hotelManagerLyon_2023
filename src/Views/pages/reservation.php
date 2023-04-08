<?php ob_start() ?>

<div class="reservation">
    <div class="welcome">
        <h1>welcome to the eden hotel</h1>
        <p>Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
        <a href="/">get started now</a>
    </div>
    <div class="reserv">
        <h2>search your <span>offer</span></h2>
        <form action="/showClient" method="post">
            <div>
                <a href="/showRestaurant/<?= $slug ?>">
                    Vous choisissez le restaurant
                    <script>
                        document.write(localStorage.getItem("id_resto"));
                    </script>
                </a>
            </div>
            <div>
                <a href="/showChambre/<?= $slug ?>">
                    Choisissez une chambre
                    <span>
                        <script>
                            document.write(localStorage.getItem("id_chambre"));
                        </script>
                    </span>
                </a>
            </div>
            <div>
                <label for="bar">Bar</label>
                <div class="bar">
                    <label for="bar_yes">Oui</label>
                    <input type="radio" name="bar" id="bar_yes">
                    <label for="bar_no">Non</label>
                    <input type="radio" name="bar" id="bar_no">
                </div>
            </div>
            <div>
                <label for="bar">Piscine</label>
                <div class="piscine">
                    <label for="piscine_yes">Oui</label>
                    <input type="radio" name="piscine" id="piscine_yes">
                    <label for="piscine_no">Non</label>
                    <input type="radio" name="piscine" id="piscine_no">
                </div>
            </div>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>