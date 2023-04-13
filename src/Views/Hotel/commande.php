<?php
ob_start();
?>
<h1>Faire une commande</h1>

    <p>Prenom : <?= $client->getPrenom() ?></p>
    <p>Nom : <?= $client->getNom() ?></p>
    <p>Email : <?= $client->getEmail() ?></p>

    <h2>Menu :</h2>
    <div class="menus">
        <ul>
        <?php
        foreach($menus as $menu){
            ?>
            <li class="menu"><?= $menu->getName_menu() ?> <?= $menu->getPrix_menu() ?>€</li>
            <div class="hidden quantiteM">
                <form action="addCommandeMenu" method="POST">
                    
                    <input type="hidden" value="<?= $client->getId() ?>" name="clientId">
                    <input type="hidden" value="<?= $menu->getId_menu() ?>" name="menuId">
                    
                    <label for="<?= $menu->getId_menu() ?>"> | quantité :</label>
                    <input type="number" name="<?= $menu->getId_menu() ?>" id="<?= $menu->getId_menu() ?>">

                    <input type="submit" value="Valider la commande">
                </form>
            </div>
            <?php
        }
        ?>
        </ul>
    </div>

    <h2>Boissons :</h2>
    <div class="boissons">
        <ul>
        <?php
        foreach($boissons as $boisson){
            ?>
            <li class="boisson"><?= $boisson->getName_boisson() ?> <?= $boisson->getPrix_boisson() ?>€</li>
            <div class="hidden quantite">
                <form action="addCommandeBoisson" method="POST">
                    
                    <input type="hidden" value="<?= $client->getId() ?>" name="clientId">
                    <input type="hidden" value="<?= $boisson->getId_boisson() ?>" name="boissonId">

                    <label for="<?= $boisson->getId_boisson() ?>"> | quantité :</label>
                    <input type="number" name="<?= $boisson->getId_boisson() ?>" id="<?= $boisson->getId_boisson() ?>">

                    <input type="submit" value="Valider la commande">
                </form>
            </div>
            <br>
            <?php
        }
        ?>
        </ul>
    </div>
    

<script src="../js/commande.js"></script>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';