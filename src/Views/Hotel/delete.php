<?php
ob_start();
?>

<section class="delete">
    <h1>supprimer un client</h1>
    
    <form action="./delete" method="POST">
        <div>
        <?php
                foreach ($client as $clients) {
                    echo "<p><input type='checkbox' name='client[]' value=".$clients->getIdClient().">Nom : ".$clients->getNomClient()." , Prenom : ".$clients->getPrenomClient()."</p>";
                }
            ?>
        </div>
        <input type="submit" value="supprimer les client">
    </form>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
