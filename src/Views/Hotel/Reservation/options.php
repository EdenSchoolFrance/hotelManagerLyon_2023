<?php
ob_start();
?>
<h1>Choisissez vos options</h1>
<ul class="action">
    <li>
        <a href="reservation/chambres">
            <i class="fa-solid fa-bed" style="color: #fff;"></i>
            <h2>Voir toutes les chambres</h2>
        </a>
    </li>
    <li>
        <a href="reservation/menus">
            <i class="fa-solid fa-burger" style="color: #fff;"></i>
            <h2>Voir tous les menus</h2>
        </a>
    </li>
    <li>
        <a href="reservation/salles">
            <i class="fa-regular fa-hospital" style="color: #fff;"></i>
            <h2>Voir toutes les salles</h2>
        </a>
    </li>

    <li>
        <a href="reservation/boissons">
            <i class="fa-solid fa-utensils" style="color: #fff;"></i>
            <h2>Voir toutes les boissons</h2>
        </a>
    </li>
</ul>
<form class="reservation" action="confirmReservation" method="POST">
    <div>
        <label for="restaurant">Restaurants</label>
        <select name="restaurant" id="restaurant">
            <option value="">--Aucun--</option>
            <?php
            foreach ($restaurant as $restau) { ?>
                <option value="<?= $restau->getIdRestaurant() ?>"><?= $restau->getNameRestaurant() ?></option>
            <?php }
            ?>

        </select>
    </div>
    <div>
        <label for="bar">Bars</label>
        <select name="bar" id="bar">
            <option value="">--Aucun--</option>
            <?php
            foreach ($bar as $bar) { ?>
                <option value="<?= $bar->getIdBar() ?>"><?= $bar->getNameBar() ?></option>
            <?php }
            ?>
        </select>
    </div>
    <div>

        <div>
            <p>Piscine</p>
            <label for="piscine_true">Oui</label>
            <input type="radio" name="piscine[]" id="piscine_true" value="1">

            <label for="piscine_false">Non</label>
            <input type="radio" name="piscine[]" id="piscine_false" class="piscinefalse" value="0">
        </div>

        <label for="debut">Début</label>
        <input type="datetime-local" id="debut" name="piscinedate[]">

        <label for="fin">Fin</label>
        <input type="datetime-local" id="fin" name="piscinedate[]">
    </div>
</form>
<script>
    //Restaurant select
    const restaurantBtn = document.querySelector('#restaurant');
    let restaurant;
    restaurantBtn.addEventListener('change', () => {
        restaurant = localStorage.setItem('restaurant', `${[restaurantBtn.selectedIndex]}`);
    });

    //Bar select
    const barBtn = document.querySelector('#bar');
    let bar;
    barBtn.addEventListener('change', () => {
        bar = localStorage.setItem('bar', `${[barBtn.selectedIndex]}`);
    });

    //Piscine radio
    const piscineBtn = document.getElementsByName('piscine[]');
    const piscineDateBtn = document.getElementsByName('piscinedate[]');
    let piscine;

    for (let i = 0; i < piscineBtn.length; i++) {
        piscineBtn[i].addEventListener('change', () => {
            piscine = localStorage.setItem('piscine', piscineBtn[i].value);

            for (let j = 0; j < piscineDateBtn.length; j++) {
                if (piscineBtn[i].value == 0) {
                    piscineDateBtn[j].disabled = true;
                } else {
                    piscineDateBtn[j].disabled = false;
                }
            }




        });
    }


    //LES VALEURS DU RADIO CLIQUÉ SENregistre dans localstorage
    //si radio 0, griser input date
    //si radio 1, enregistrer date dans localstorage
</script>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
