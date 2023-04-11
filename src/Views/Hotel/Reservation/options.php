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
        <div>
            <p>Piscine</p>
            <label for="piscine_true">Oui</label>
            <input type="radio" name="piscine[]" id="piscine_true" value="1">
            <label for="piscine_false">Non</label>
            <input type="radio" name="piscine[]" id="piscine_false" class="piscinefalse" value="0">
        </div>

        <label for="debut">Début</label>
        <input type="datetime-local" id="debut" name="piscinedate[]" min="2023-04-10T10:00" required>
        <label for="fin">Fin</label>
        <input type="datetime-local" id="fin" name="piscinedate[]" max="2023-04-10T23:00" required>
    </div>

    <button type="submit" class="cta">Terminer la réservation</button>
</form>


<script>
    const submit = document.querySelector('button[type="submit"]');

    //CHAMBRE VALUE
    let chambreInput = document.createElement('input');
    chambreInput.setAttribute('type', 'hidden');
    chambreInput.setAttribute('name', 'id_chambre');
    if (localStorage.getItem('chambre') == undefined) { //if user doesn't select chambre -> value 0
        chambreInput.setAttribute('value', 0);
    }
    else{
        chambreInput.setAttribute('value', `${encryptStorage.getItem('chambre')}`); //if user select one -> value = id chambre
    }
    submit.insertAdjacentElement('beforebegin', chambreInput);

    //MENU VALUE
    let menuInput = document.createElement('input');
    menuInput.setAttribute('type', 'hidden');
    menuInput.setAttribute('name', 'id_menu');
    if (localStorage.getItem('chambre') == undefined) { //if user doesn't select chambre -> value 0
        chambreInput.setAttribute('value', 0);
    }
    else{
        chambreInput.setAttribute('value', `${encryptStorage.getItem('chambre')}`); //if user select one -> value = id chambre
    }
    menuInput.setAttribute('value', `${encryptStorage.getItem('menu')}`);
    submit.insertAdjacentElement('beforebegin', menuInput);

    //SALLES VALUE
    let salleInput = document.createElement('input');
    salleInput.setAttribute('type', 'hidden');
    salleInput.setAttribute('name', 'id_salle');
    salleInput.setAttribute('value', `${encryptStorage.getItem('salle')}`);
    submit.insertAdjacentElement('beforebegin', salleInput);

    //BOISSONS VALUE
    let boissonInput = document.createElement('input');
    boissonInput.setAttribute('type', 'hidden');
    boissonInput.setAttribute('name', 'id_boisson');
    boissonInput.setAttribute('value', `${encryptStorage.getItem('boisson')}`);
    submit.insertAdjacentElement('beforebegin', boissonInput);

    /*
        //RESTAURANT VALUE
        const restaurantBtn = document.querySelector('#restaurant'); //select list
        let restaurantInput = document.createElement('input');
        restaurantInput.setAttribute('type', 'hidden');
        restaurantInput.setAttribute('name', 'id_restaurant');
        restaurantInput.setAttribute('value', 0); //set input hidden default value to 0
        submit.insertAdjacentElement('beforebegin', restaurantInput);

        restaurantBtn.addEventListener('click', () => { //if user select option 
            let restaurant = encryptStorage.setItem('restaurant', `${[restaurantBtn.selectedIndex]}`); //store value in localStorage (with encrypt api)
            let restaurantValue = encryptStorage.getItem('restaurant'); //decrypt value to set it in input value
            restaurantInput.setAttribute('value', `${restaurantValue}`); //option selected replace value input
        });
     */

    //Restaurant select
    const restaurantBtn = document.querySelector('#restaurant');
    let restaurant;
    restaurantBtn.addEventListener('click', () => {
        restaurant = encryptStorage.setItem('restaurant', `${[restaurantBtn.selectedIndex]}`);
    });

    //Bar select
    const barBtn = document.querySelector('#bar');
    let bar;
    barBtn.addEventListener('click', () => {
        bar = encryptStorage.setItem('bar', `${[barBtn.selectedIndex]}`);
    });

    //Piscine radio
    const piscineBtn = document.getElementsByName('piscine[]');
    const piscineDateBtn = document.getElementsByName('piscinedate[]');
    let piscine;
    let piscine_debut;
    let piscine_fin;
    for (let i = 0; i < piscineBtn.length; i++) {
        piscineBtn[i].addEventListener('change', () => {
            piscine = encryptStorage.setItem('piscine', piscineBtn[i].value);

            for (let j = 0; j < piscineDateBtn.length; j++) {
                if (piscineBtn[i].value == 1) {
                    piscineDateBtn[j].disabled = false;
                    piscineDateBtn[j].addEventListener('change', () => {
                        piscine_debut = encryptStorage.setItem('piscine_debut', `${piscineDateBtn[0].value}`);
                        piscine_fin = encryptStorage.setItem('piscine_fin', `${piscineDateBtn[1].value}`);
                    });

                } else {
                    piscineDateBtn[j].disabled = true;
                    piscine_debut = encryptStorage.setItem('piscine_debut', 0);
                    piscine_fin = encryptStorage.setItem('piscine_fin', 0);
                }
            }
        });

    }
</script>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
