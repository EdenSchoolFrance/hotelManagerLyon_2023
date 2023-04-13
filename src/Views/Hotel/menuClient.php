<?php
ob_start();
?>
<section>
    <a href="/client" id="add">Ajouter Client</a>
    <?php
        foreach($allClient as $client){
            if($client->getId() !== 10){
                echo "<article class='client'>";
                echo "<h2>" . $client->getName() . " " . $client->getPrenom() . "</h2>";
                echo "<p>Email : " . $client->getMail() . "</p>";
                echo "<p>Téléphone : " . $client->getTel() . "</p>";
                echo "<a href='/deleteclient/" . $client->getId() . "'>Supprimer</a>";
                echo "</article>";
            }
        }
    ?>
    <?php if(success()) echo "<script>alert('" . success() . "')</script>"; ?>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';