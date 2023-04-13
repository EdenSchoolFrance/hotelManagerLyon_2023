<?php
ob_start();
?>

<section class="salle">
    <h1>creer une salle</h1>
    <?php
    if(isset($_SESSION['error'])){
        echo "<p style='text-align : center;'>".$_SESSION['error']."</p>";
    }
    ?>
    <form action="/salle/create/bdd" method="POST" enctype="multipart/form-data">
        <select name="client">
            <?php
                foreach ($client as $clients) {
                    echo "<option value=".$clients->getIdClient().">Nom : ".$clients->getNomClient()." , Prenom : ".$clients->getPrenomClient()."</option>";
                }
            ?>
        </select>
        <select name="salle">
            <?php
                foreach ($salle as $salles) {
                    echo "<option value=".$salles->getIdSalle().">Nom : ".$salles->getNameSalle()."</option>";
                }
            ?>
        </select>
        <input type="date" name="datedeb">
        <input type="date" name="datefin">
        <input type="text" name="status_salle">
        <input type="submit" value="reserver">
    </form>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
