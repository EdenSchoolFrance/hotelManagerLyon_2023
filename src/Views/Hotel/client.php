<?php
ob_start();
?>
<section>
    <form action="/client/" method="POST">
        <div>
            <label for="name"><i class="fas fa-user-tie"></i>Nom :</label>
            <input type="text" name="name" id="name" autocomplete="on" require value="<?php echo old("name");?>">
            <span class="error"><?php echo error("name");?></span>
        </div>
        <div>
            <label for="prenom"><i class="fas fa-user-tie"></i>Prenom :</label>
            <input type="text" name="prenom" id="prenom" autocomplete="on" require value="<?php echo old("prenom");?>">
            <span class="error"><?php echo error("prenom");?></span>
        </div>
        <div>
            <label for="mail"><i class="fas fa-user-tie"></i>Email :</label>
            <input type="mail" id="mail" name='mail'aria-describedby="emailHelp" autocomplete="on" value="<?php echo old("mail");?>">
            <span class="error"><?php echo error("mail");?></span>
        </div>
        <div>
            <label for="tel"><i class="fa-solid fa-phone"></i>Téléphone :</label>
            <input type="tel" name='tel' id="tel" autocomplete="on" value="<?php echo old("tel");?>">
            <span class="error"><?php echo error("tel");?></span>
        </div>
        <button type="submit" class="button" id="connexion">Ajouter</button>
        <span class="error"><?php echo error("message");?></span>
    </form>
    <?php if(success()) echo "<script>alert('" . success() . "')</script>"; ?>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';