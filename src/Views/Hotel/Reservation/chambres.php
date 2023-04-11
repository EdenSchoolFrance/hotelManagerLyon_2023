<?php
ob_start();
?>
<section class="wrap-content">
  <div>
    <h1>Choisissez la chambre</h1>
    <a href="/reservation" class="cta">Retour</a>
  </div>

  <?php
  foreach ($chambre as $val) { ?>
    <article>
      <img src="/img/chambres/<?= $val->getImageChambre() ?>" alt="<?= $val->getNameChambre() ?>">
      <h2><?= $val->getNameChambre() ?></h2>
      <p><?= $val->getDescriptionChambre() ?></p>
      <h3><?= $val->getPrixChambre() ?></h3>
      <input type="hidden" id="chambre" name="id_chambre" value="">
      <button class="cta" name="id_chambre" value="<?= $val->getIdChambre() ?>">Réserver</button>

    </article>
  <?php } ?>
  <script>
    const chambreBtn = document.querySelectorAll('button'); //Réserver button
    let chambre;
    chambreBtn.forEach(e => { //loop on all buttons
      e.addEventListener('click', () => { //when user select it
        chambre = e.value; //chambre = button.id so => id chambre
        encryptStorage.setItem('chambre', e.value); //store it encrypted
        document.getElementById("chambre").value = chambre; //select hidden input then set id chambre 
        window.location.href = '/reservation';
      });
    });
  </script>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
