<?php
ob_start();
$_SESSION['client'] = $_COOKIE['client'];
echo $_SESSION['client'];
?>
<h1>Choisissez vos options</h1>

<form class="reservation" action="/reservationConfirm" method="POST">
    <div>
        <label for="restaurant">Restaurants</label>
        <select name="restaurant" id="restaurant" required>
            <option value="0">--Aucun--</option>
            <?php
            foreach ($restaurant as $restau) { ?>
                <option value="<?= $restau->getIdRestaurant() ?>"><?= $restau->getNameRestaurant() ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="bar">Bars</label>
        <select name="bar" id="bar" required>
            <option value="0">--Aucun--</option>
            <?php
            foreach ($bar as $bar) { ?>
                <option value="<?= $bar->getIdBar() ?>"><?= $bar->getNameBar() ?></option>
            <?php }
            ?>
        </select>
    </div>
    <div>

        <label for="piscine">Piscine</label>
        <select name="piscine" id="piscine" required>
            <option value="0">--Non--</option>
            <?php
            foreach ($piscine as $piscine) { ?>
                <option value="<?= $piscine->getIdPiscine() ?>"><?= $piscine->getNamePiscine() ?></option>
            <?php } ?>
        </select>

        <label for="debut_piscine">Début</label>
        <input type="date" id="debut_piscine" class="piscinedate" name="debut_piscine" required disabled>
        <label for="fin_piscine">Fin</label>
        <input type="date" id="fin_piscine" class="piscinedate" name="fin_piscine" required disabled>
    </div>
    <button type="submit" class="cta">Terminer la réservation</button>
</form>

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

<script>
    const form = document.querySelector('form');
    const submit = document.querySelector('button[type="submit"]');

    //CHAMBRE VALUE
    let chambreInput = document.createElement('input');
    chambreInput.setAttribute('type', 'hidden');
    chambreInput.setAttribute('name', 'id_chambre');
    if (localStorage.getItem('chambre') == undefined) { //si user ne prends pas de chambre, valeur=0
        chambreInput.setAttribute('value', 0);
    } else {
        //si user select chambre, value= id chambre
        chambreInput.setAttribute('value', `${encryptStorage.getItem('chambre')}`);
        submit.insertAdjacentElement('beforebegin', chambreInput);
        //génère input date
        form.insertAdjacentHTML('afterbegin', `<div>
        <label for="debut_chambre">Début res. chambre</label>
        <input type="date" name="debut_chambre" id="debut_chambre">

        <label for="fin_chambre">Fin res. chambre</label>
        <input type="date" name="fin_chambre" id="fin_chambre">
        </div>
        `);
    }

    //MENU VALUE
    let menuInput = document.createElement('input');
    menuInput.setAttribute('type', 'hidden');
    menuInput.setAttribute('name', 'id_menu');
    if (localStorage.getItem('menu') == undefined) { //si user ne prends pas de menu, valeur=0
        menuInput.setAttribute('value', 0);
    } else {
        menuInput.setAttribute('value', `${encryptStorage.getItem('menu')}`);
        //si user select menu, value= id menu
        submit.insertAdjacentElement('beforebegin', menuInput);
        //génère input date et quantite
        form.insertAdjacentHTML('afterbegin', `<div>
            <label for="date_menu">Date menu</label>
            <input type="date" name="date_menu" id="date_menu">
            <label for="quantite_menu">Quantité menu</label>
            <input type="number" name="quantite_menu" id="quantite_menu" value="1">
        </div>
        `);
    }

    //SALLES VALUE
    let salleInput = document.createElement('input');
    salleInput.setAttribute('type', 'hidden');
    salleInput.setAttribute('name', 'id_salle');
    if (localStorage.getItem('salle') == undefined) { //si user ne prends pas salle, value= 0
        salleInput.setAttribute('value', 0);
    } else {
        salleInput.setAttribute('value', `${encryptStorage.getItem('salle')}`);
        // si user en select une, value= id salle
        submit.insertAdjacentElement('beforebegin', salleInput);
        //génère input date
        form.insertAdjacentHTML('afterbegin', `<div>
        <label for="debut_salle">Début res. salle</label>
        <input type="date" name="debut_salle" id="debut_salle">
        <label for="fin_salle">Fin res. salle</label>
        <input type="date" name="fin_salle" id="fin_salle">
        </div>
        `);
    }

    //BOISSONS VALUE
    let boissonInput = document.createElement('input');
    boissonInput.setAttribute('type', 'hidden');
    boissonInput.setAttribute('name', 'id_boisson');
    if (localStorage.getItem('boisson') == undefined) { //si user ne prends pas salle, value= 0
        boissonInput.setAttribute('value', '0');
    } else {
        //si user prends salle, value= id salle
        boissonInput.setAttribute('value', `${encryptStorage.getItem('boisson')}`);
        submit.insertAdjacentElement('beforebegin', boissonInput);
        //génère input date, quantite
        form.insertAdjacentHTML('afterbegin', `<div>
            <label for="date_boisson">Date boisson</label>
            <input type="date" name="date_boisson" id="date_boisson">
            <label for="quantite_boisson">Quantité boisson</label>
            <input type="number" name="quantite_boisson" id="quantite_boisson" value="1">
        </div>
        `);
    }

    //Restaurant select
    const restaurantBtn = document.querySelector('#restaurant');
    let restaurant;
    restaurantBtn.addEventListener('click', () => {
        restaurant = encryptStorage.setItem('restaurant', `${[restaurantBtn.selectedIndex]}`);
    });

    //Bar select
    const barBtn = document.querySelector('#bar');
    let bar;
    barBtn.addEventListener('change', () => {
        bar = encryptStorage.setItem('bar', `${[barBtn.selectedIndex]}`);
        let id_bar = barBtn.options[barBtn.selectedIndex].value;
        document.cookie = `id_bar=${id_bar}`;
    });

    //Piscine select
    const piscineBtn = document.querySelector('#piscine');
    const piscineDateBtn = document.querySelectorAll('.piscinedate');
    piscineBtn.addEventListener('click', () => {
        piscineDateBtn.forEach(e => {
            console.log()
            if (piscineBtn.value == 0) {
                e.disabled = true;
            } else {
                e.disabled = false;
            }
        })
    })
</script>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
