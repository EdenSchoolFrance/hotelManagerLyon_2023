<?php
ob_start();
?>
<section>
    <form action="/salle/" method="POST">
        <div>
            <label for="name"><i class="fas fa-user-tie"></i>Client :</label>
            <select name="client" id="client">
                <?php
                    foreach($allClient as $client){
                        if($client->getId() !== 12){
                            echo '<option value="' . $client->getId() . '">' . $client->getName() . " " . $client->getPrenom() . '</option>';
                        }
                    }
                ?>
            </select>
            <span class="error"><?php echo error("client");?></span>
        </div>
        <div id="chambre">
            <label for="salle"><i class="fa-solid fa-bed"></i>Salle :</label>
                <?php
                    foreach($allSalle as $salle){
                        echo '<article>';
                        echo '<h2>' . $salle->getName() . '</h2>';
                        echo '<img src="' . URL . "/db/salle/" . $salle->getImg() . '">'; 
                        echo '<p> <span>Description:</span> ' . $salle->getDescription() . "</p>";
                        echo '<p> <span>Options:</span> ' . $salle->getOptions() . "</p>";
                        echo '<input type="radio" name="choosed" value="' . $salle->getId() . '">';
                        echo '</article>';
                    }
                ?>
        </div>
        <span class="error"><?php echo error("choosed");?></span>
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
        <button type="submit" class="button" id="ajouter">ajouter</button>
        <span class="error"><?php echo error("message");?></span>
    </form>
    <?php if(success()) echo "<script>alert('" . success() . "')</script>"; ?>
    <?php if(erreur()) echo "<script>alert('" . erreur() . "')</script>"; ?>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';