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
    <input type="hidden" id="boisson" name="id_boisson" value="">
    <button class="cta" name="id_boisson" value="<?= $val->getIdBoisson() ?>">Réserver</button>
    
  </article>
<?php } ?>
<script>
const boissonBtn = document.querySelectorAll('button'); //Réserver button
    let boisson;
    boissonBtn.forEach(e => { //loop on all buttons
      e.addEventListener('click', () => { //when user select it
        boisson = e.value; //chambre = button.id so => id chambre
        encryptStorage.setItem('boisson', e.value); //store it encrypted
        document.getElementById("boisson").value = boisson; //select hidden input then set id chambre 
        window.location.href = '/reservation';
      });
    });
    </script>
    </script>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
