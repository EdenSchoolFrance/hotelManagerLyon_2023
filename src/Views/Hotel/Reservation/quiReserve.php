<?php
ob_start();
?>
<h1>Liste des clients</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($clients as $client) { ?>
            <tr>
                <td>
                    <?= $client->getIdClient() ?>
                </td>
                <td>
                    <?= $client->getNomClient() ?>
                </td>
                <td>
                    <?= $client->getPrenomClient() ?>
                </td>
                <td>
                    <?= $client->getEmailClient() ?>
                </td>
                <td>
                    <a href="/reservation" class="cta" value="<?= $client->getIdClient() ?>">Réserver</a>
                </td> <?php
                 $_SESSION['client'] = $client->getIdClient();
                 
                ?>
            </tr>
    </tbody>



<?php } ?>
<script>
    const clientBtn = document.querySelectorAll('a');
    let client;
    clientBtn.forEach(e => {
        e.addEventListener('click', () => {
            client = encryptStorage.setItem('client', `${e.getAttribute('value')}`);
           
            
        });
    });
</script>
</table>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
