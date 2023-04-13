<?php
ob_start();
?>

<section class="salle">
    <h1>reserver un restaurant</h1>
    <?php
    if(isset($_SESSION['error'])){
        echo "<p style='text-align : center;'>".$_SESSION['error']."</p>";
    }
    ?>
    <form action="./bdd" method="POST" enctype="multipart/form-data">
        <select name="client">
            <?php
                foreach ($client as $clients) {
                    echo "<option value=".$clients->getIdClient().">Nom : ".$clients->getNomClient()." , Prenom : ".$clients->getPrenomClient()."</option>";
                }
            ?>
        </select>
        <select name="restaurant">
            <?php
                    foreach ($restaurant as $restaurants) {
                        echo "<option value=".$restaurants->getIdRestaurant().">Nom : ".$restaurants->getNameRestaurant()."</option>";
                    }
            ?>
        </select>
        <select name="menu">
            <?php
                    foreach ($menu as $menus) {
                        echo "<option value=".$menus->getIdMenu().">Nom : ".$menus->getNameMenu()."</option>";
                    }
            ?>
        </select>
        <input type="number" name="quantite">
        <input type="date" name="datedeb">
        <input type="submit" value="commander">
    </form>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
