<?php
ob_start();
?>

<section class="salle">
    <h1>reserver une Bar</h1>
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
        <select name="bar">
            <?php
                    foreach ($bar as $bars) {
                        echo "<option value=".$bars->getIdBar().">Nom : ".$bars->getNameBar()."</option>";
                    }
            ?>
        </select>
        <select name="salle">
            <?php
                    foreach ($boisson as $boissons) {
                        echo "<option value=".$boissons->getIdBoisson().">Nom : ".$boissons->getNameBoisson()."</option>";
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
