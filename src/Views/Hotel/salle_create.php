<?php
ob_start();
?>

<section class="salle">
    <h1>reserver une <?=$option?></h1>
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
        <select name="salle">
            <?php
                if($option==="Salle"){
                    foreach ($salle as $salles) {
                        echo "<option value=".$salles->getIdSalle().">Nom : ".$salles->getNameSalle()."</option>";
                    }
                }else if($option==="Piscine"){
                    foreach ($piscine as $piscines) {
                        echo "<option value=".$piscines->getIdPiscine().">Nom : ".$piscines->getNamePiscine()."</option>";
                    }
                }
            ?>
        </select>
        <?php
                if($option==="Piscine"){
                    ?>
                    <input type="time" name="datetime">
                    <?php
                }
            ?>
        <input type="date" name="datedeb">
        <input type="date" name="datefin">
        <input type="text" name="status_salle">
        <input type="submit" value="reserver">
    </form>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
