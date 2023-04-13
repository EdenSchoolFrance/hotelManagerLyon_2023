<?php ob_start() ?>
<?php
$uniq = uniqid();
$date = date("Y-m-d H:i:s");
?>
<h1>Facture</h1>


<?php $total = 0 ?>
<div class="facture">
    <div>
        <table class="facture">
            <tbody>
                <tr>
                    <td>n° facture</td>
                    <td>date</td>
                </tr>
                <tr>
                    <td><?= $uniq ?></td>
                    <td><?= $date ?></td>
                </tr>
                <tr>
                    <td>ref client</td>
                    <td>condition</td>
                </tr>
                <tr>
                    <?php foreach ($item["client"] as $el) : ?>
                        <td><?= $el->getid_client() ?></td>
                    <?php endforeach ?>
                    <td>Paimement dû à la reception</td>
                </tr>
            </tbody>
        </table>
        <div class="client">
            <h2>facturer à</h2>
            <ul>
                <?php foreach ($item["client"] as $el) : ?>
                    <li>nom : <?= $el->getnom_client() ?></li>
                    <li>prenom : <?= $el->getprenom_client() ?></li>
                    <li>email : <?= $el->getemail_client() ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <table class="options">
        <thead>
            <tr>
                <th>description</th>
                <th>montant</th>
                <th>quantitées</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>

                    <ul>
                        <?php foreach ($item["chambres"] as $chambre) : ?>
                            <li><?= $chambre->getname_chambre() ?></li>
                        <?php endforeach ?>

                        <?php foreach ($item["boissons"] as $boissons) : ?>
                            <li><?= $boissons->getname_boisson() ?></li>
                        <?php endforeach ?>

                        <?php foreach ($item["salles"] as $salle) : ?>
                            <li><?= $salle->getname_salle() ?></li>
                        <?php endforeach ?>

                        <?php foreach ($item["piscines"] as $piscines) : ?>
                            <li><?= $piscines->getname_piscine() ?></li>
                        <?php endforeach ?>

                        <?php foreach ($item["menus"] as $menus) : ?>
                            <li><?= $menus->getname_menu() ?></li>
                        <?php endforeach ?>
                    </ul>
                </td>
                <td>
                    <ul>
                        <?php foreach ($item["chambres"] as $chambre) : ?>
                            <li><?= $chambre->getprix_chambre() ?> €</li>
                            <?php $total += $chambre->getprix_chambre() ?>
                        <?php endforeach ?>

                        <?php foreach ($item["boissons"] as $boissons) : ?>
                            <li><?= $boissons->getprix_un_boisson() ?> €</li>
                            <?php $total += $boissons->getprix_un_boisson() ?>
                        <?php endforeach ?>

                        <?php foreach ($item["salles"] as $salle) : ?>
                            <li><?= $salle->getprix_salle() ?> €</li>
                            <?php $total += $salle->getprix_salle() ?>
                        <?php endforeach ?>

                        <?php foreach ($item["piscines"] as $piscines) : ?>
                            <li><?= $piscines->getprix_piscine() ?> €</li>
                            <?php $total += $piscines->getprix_piscine() ?>
                        <?php endforeach ?>

                        <?php foreach ($item["menus"] as $menus) : ?>
                            <li><?= $menus->getprix_menu() ?> €</li>
                            <?php $total += $menus->getprix_menu() ?>
                        <?php endforeach ?>
                    </ul>
                </td>
                <td>
                    <ul>
                        <?php foreach ($item["chambres"] as $chambre) : ?>
                            <?php $num_chambres = 0 ?>
                            <?php $num_chambres++ ?>
                            <li><?= $num_chambres ?></li>
                        <?php endforeach ?>

                        <?php foreach ($item["boissons"] as $boissons) : ?>
                            <li><?= $boissons->getQuantite_client_boisson() ?></li>
                        <?php endforeach ?>

                        <?php foreach ($item["salles"] as $salle) : ?>
                            <?php $num_salles = 0 ?>
                            <?php $num_salles++ ?>
                            <li><?= $num_salles ?></li>
                        <?php endforeach ?>

                        <?php foreach ($item["piscines"] as $piscines) : ?>
                            <?php $num_piscine = 0 ?>
                            <?php $num_piscine++ ?>
                            <li><?= $num_piscine ?></li>
                        <?php endforeach ?>

                        <?php foreach ($item["menus"] as $menus) : ?>
                            <li><?= $menus->getQuantite_client_menu() ?></li>
                        <?php endforeach ?>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    <p class="total">Total : <?= $total ?> €</p>
</div>

<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>