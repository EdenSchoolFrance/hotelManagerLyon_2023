<?php ob_start() ?>
<table class="showClient">
    <thead>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>last name</th>
            <th>first name</th>
            <th>delete</th>
            <th>modification</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($el as $els) : ?>
            <tr>
                <td><?= $els->getid_client() ?></td>
                <td><?= $els->getemail_client() ?></td>
                <td><?= $els->getnom_client() ?></td>
                <td><?= $els->getprenom_client() ?></td>
                <td><a href="/deleteClient/<?= $els->getid_client() ?>">delete</a></td>
                <td><a href="/dupdateClient/<?= $els->getid_client() ?>">update</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>