<?php
ob_start();
?>

<section class="liste">
    <h1>information sur les client</h1>
    
    <form action="./create/bdd" method="POST">
        <select name="liste">
            <?php
                foreach ($client as $clients) {
                    echo "<option value=".$clients->getIdClient().">Nom : ".$clients->getNomClient()." , Prenom : ".$clients->getPrenomClient()."</option>";
                }
            ?>
        </select>
        <input type="submit" value="recuper les information">
    </form>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
