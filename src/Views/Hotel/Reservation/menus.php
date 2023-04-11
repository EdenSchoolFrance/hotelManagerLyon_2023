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
    <input type="hidden" id="menu" name="id_menu" value="">
    <button class="cta" name="id_menu" value="<?= $val->getIdMenu() ?>">Réserver</button>
    
  </article>
<?php } ?>
<script>
 const menuBtn = document.querySelectorAll('button'); //Réserver button
    let menu;
    menuBtn.forEach(e => { //loop on all buttons
      e.addEventListener('click', () => { //when user select it
        menu = e.value; //chambre = button.id so => id chambre
        encryptStorage.setItem('menu', e.value); //store it encrypted
        document.getElementById("menu").value = menu; //select hidden input then set id chambre 
        window.location.href = '/reservation';
      });
    });
    </script>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
