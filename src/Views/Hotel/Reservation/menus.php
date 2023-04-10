<?php
ob_start();
?>
<section class="wrap-content">
  <div>
    <h1>Choisissez le menu</h1>
    <a href="/reservation" class="cta">Retour</a>
  </div>
 
<?php
foreach ($menu as $val) { ?>
  <article>
    <img src="/img/menus/<?= $val->getImageMenu() ?>" alt="<?= $val->getNameMenu() ?>">
    <h2><?= $val->getNameMenu() ?></h2>
    <p><?= $val->getDescriptionMenu() ?></p>
    <h3><?= $val->getPrixMenu() ?></h3>
    <button class="cta" name="id_menu" value="<?= $val->getIdMenu() ?>">Réserver</button>
    
  </article>
<?php } ?>
<script>

      const chambreBtn = document.querySelectorAll('button');
      let chambre;
      chambreBtn.forEach(e => {
        e.addEventListener('click', ()=>{
        chambre = encryptStorage.setItem('menu', `${e.value}`);
        window.location.href = '/reservation';
      });
      });
     
    </script>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
