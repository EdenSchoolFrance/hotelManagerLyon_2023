<?php
ob_start();
?>
<h1>Réservez</h1>
<h2>Parmis nos offres de chambres, restaurants, piscine...</h2>
<form action="config" method="POST">
    <fieldset>
        <legend>
            Souhaitez-vous réserver une chambre pour votre séjour ?
        </legend>

        <label for="chambre_true">Oui</label>
        <input type="radio" name="chambre" id="chambre_true" value="true">

        <label for="chambre_false">Non</label>
        <input type="radio" name="chambre" id="chambre_false" value="false">
    </fieldset>

    <fieldset>
        <legend>
            Souhaitez-vous réserver un menu dans le restaurant de l'hôtel ?
        </legend>

        <label for="menu_true">Oui</label>
        <input type="radio" name="menu" id="menu_true">

        <label for="menu_false">Non</label>
        <input type="radio" name="menu" id="menu_false">

    </fieldset>

    <fieldset>
        <legend>
            Souhaitez-vous réserver un horraire dans la piscine de l'hôtel ?
        </legend>

        <label for="piscine_true">Oui</label>
        <input type="radio" name="piscine" id="piscine_true">

        <label for="piscine_false">Non</label>
        <input type="radio" name="piscine" id="piscine_false">

    </fieldset>
    <input type="submit">
</form>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
