<?php
ob_start();
?>
<table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
    </tr>
    <?php
    foreach($all as $el){
        ?>
        <tr>
            <td><?= $el->getNom()?></td>
            <td><?= $el->getPrenom()?></td>
            <td><?= $el->getEmail()?></td>
            <td><a href="/delete/<?= $el->getId() ?>">Supprimer</a></td>
            <td><a href="/update/<?= $el->getId() ?>">Modifier</a></td>
            <td><i class="fa-solid fa-calendar-days"></i><a href="/reservation/<?= $el->getId() ?>">Faire une reservation</a></td>
            <td><i class="fa-solid fa-utensils"></i><a href="/commande/<?= $el->getId() ?>">Faire une commande</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';