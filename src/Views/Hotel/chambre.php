<?php
ob_start();
?>
<section>
    <form action="/chambre/" method="POST">
        <div>
            <label for="name"><i class="fas fa-user-tie"></i>Client :</label>
            <select name="client" id="client">
                <?php
                    foreach($allClient as $client){
                        echo '<option value="' . $client->getId() . '">' . $client->getName() . " " . $client->getPrenom() . '</option>';
                    }
                ?>
            </select>
            <span class="error"><?php echo error("client");?></span>
        </div>
        <div id="chambre">
            <label for="chambre"><i class="fa-solid fa-bed"></i>Chambre :</label>
                <?php
                    foreach($allChambre as $chambre){
                        if($chambre->getOccupe() == "0"){
                            echo '<article>';
                            echo '<h2>' . $chambre->getName() . '</h2>';
                            echo '<img src="' . URL . "/db/chambre/" . $chambre->getImg() . '">'; 
                            echo '<p> <span>Description:</span> ' . $chambre->getDescription() . "</p>";
                            echo '<p> <span>Options:</span> ' . $chambre->getOptions() . "</p>";
                            echo '<p> <span>Prix:</span> ' . $chambre->getPrix() . "€</p>";
                            echo '<input type="radio" name="choosed" value="' . $chambre->getId() . '">';
                            echo '</article>';
                        }
                    }
                ?>
            <span class="error"><?php echo error("chambre");?></span>
        </div>
        <div>
            <label for="debut"><i class="fa-solid fa-hourglass-start"></i>Debut :</label>
            <input type="date" id="debut" name='debut'aria-describedby="debut" autocomplete="on" value="<?php echo old("debut");?>">
            <span class="error"><?php echo error("debut");?></span>
        </div>
        <div>
            <label for="fin"><i class="fa-solid fa-hourglass-end"></i>Fin :</label>
            <input type="date" name='fin' id="fin" autocomplete="on" value="<?php echo old("fin");?>">
            <span class="error"><?php echo error("fin");?></span>
        </div>
        <button type="submit" class="button" id="connexion">Choisir</button>
        <span class="error"><?php echo error("message");?></span>
    </form>
    <?php if(success()) echo "<script>alert('" . success() . "')</script>"; ?>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';