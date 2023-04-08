<?php
ob_start();
?>
<section class="services">
    <h1>Choississez vos services</h1>
    <form action="/reservation/options" method="POST">
        <label for="chambre">Chambre</label>
        <input type="checkbox" name="option[]" id="chambre" value="chambre">

         <label for="menu">Menu</label>
        <input type="checkbox" name="option[]" id="menu" value="menu">

        <label for="restaurant">Restaurant</label>
        <input type="checkbox" name="option[]" id="restaurant" value="restaurant">

        <label for="bar">Bar</label>
        <input type="checkbox" name="option[]" id="bar" value="bar">

        <label for="piscine">Piscine</label>
        <input type="checkbox" name="option[]" id="piscine" value="piscine">

    
        <label for="salle">Salle</label>
        <input type="checkbox" name="option[]" id="salle" value="salle">

        <input type="submit">
    </form>

    <?php
    $content = ob_get_clean();
    require VIEWS . 'layout.php';
    ?>