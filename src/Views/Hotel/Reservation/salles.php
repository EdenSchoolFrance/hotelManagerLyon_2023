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
    <button class="cta" name="id_salle" value="<?= $val->getIdSalle() ?>">Réserver</button>
    
  </article>
<?php } ?>
<script>

      const chambreBtn = document.querySelectorAll('button');
      let chambre;
      chambreBtn.forEach(e => {
        e.addEventListener('click', ()=>{
        chambre = encryptStorage.setItem('salle', `${e.value}`);
        window.location.href = '/reservation';
      });
      });
     
    </script>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';