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
            <th>reservation</th>
            <th>restaurant</th>
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
                <td><a href="/updateClient/<?= $els->getid_client() ?>">update</a></td>
                <td><a href="/reservation/<?= $els->getid_client() ?>">reservation</a></td>
                <?php if (isset($_COOKIE["restaurant_" . $els->getid_client()])) : ?>
                    <td>
                        <div class="confirm_resto">
                            <a href="/showMenu/<?= $els->getid_client() ?>"><img src="/img/icons/plus.svg" alt=""></a>
                            <a href="/deleteMenu/<?= $els->getid_client() ?>"><span class="delete"></span></a>
                        </div>
                    </td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>