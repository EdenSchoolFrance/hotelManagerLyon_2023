<?php
ob_start();
?>
<section class="wrap-content">
  <div>
  <h1>Choisissez le menu</h1>
  <a href="/reservation" class="cta">Retour</a>
  </div>
 
<?php
foreach ($salle as $val) { ?>
  <article>
    <img src="/img/salles/<?= $val->getImageSalle() ?>" alt="<?= $val->getNameSalle() ?>">
    <h2><?= $val->getNameSalle() ?></h2>
    <p><?= $val->getDescriptionSalle() ?></p>
    <h3><?= $val->getOptionsSalle() ?></h3>
    <input type="hidden" id="salle" name="id_salle" value="">
    <button class="cta" name="id_salle" value="<?= $val->getIdSalle() ?>">Réserver</button>
    
  </article>
<?php } ?>
<script>
const salleBtn = document.querySelectorAll('button'); //Réserver button
    let salle;
    salleBtn.forEach(e => { //loop on all buttons
      e.addEventListener('click', () => { //when user select it
        salle = e.value; //chambre = button.id so => id chambre
        encryptStorage.setItem('salle', e.value); //store it encrypted
        document.getElementById("salle").value = salle; //select hidden input then set id chambre 
        window.location.href = '/reservation';
      });
    });
    </script>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';