<?php
ob_start();
?>
<section class="wrap-content">
  <div>
    <h1>Choisissez la boisson</h1>
    <a href="/reservation" class="cta">Retour</a>
  </div>
 
<?php
foreach ($boisson as $val) { ?>
  <article>
    <img src="/img/boissons/<?= $val->getImageBoisson() ?>" alt="<?= $val->getNameBoisson() ?>">
    <h2><?= $val->getNameBoisson() ?></h2>
    <p><?= $val->getDescriptionBoisson() ?></p>
    <h3><?= $val->getPrixBoisson() ?></h3>
    <button class="cta" name="id_boisson" value="<?= $val->getIdBoisson() ?>">Réserver</button>
    
  </article>
<?php } ?>
<script>

      const boissonBtn = document.querySelectorAll('button');
      let boisson;
      boissonBtn.forEach(e => {
        e.addEventListener('click', ()=>{
        boisson = localStorage.setItem('boisson', `${e.value}`);
        window.location.href = '/reservation';
      });
      });
     
    </script>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
