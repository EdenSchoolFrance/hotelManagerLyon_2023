<?php
ob_start();
?>

<section class="update">
    <h1>mettre à jour les information d'un client</h1>
    
    <form action="./update" method="POST">
        <select name="liste">
            <?php
                foreach ($client as $clients) {
                    echo "<option value=".$clients->getIdClient().">Nom : ".$clients->getNomClient()." , Prenom : ".$clients->getPrenomClient()."</option>";
                }
            ?>
        </select>
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="prenom" placeholder="prenom">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="modifier">
    </form>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
