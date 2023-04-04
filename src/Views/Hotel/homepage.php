<?php
ob_start();
?>

<section class="homepage">
    <h2>Que voulez-vous consulter ?</h2>
    <div id="formulaire">
        <form action="/" method="post">
            <select name="chambre" id="select">
                <option value="chambre">Chambre</option>
                <option value="Spa">Spa</option>
                <option value="Retaurant">Retaurant</option>
                <option value="Salle">Salle</option>
            </select>
            <button type="submit">Yep</button>
        </form>
    </div>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
