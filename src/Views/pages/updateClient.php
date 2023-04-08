<?php ob_start() ?>

<h1>add staff details</h1>

<?php foreach ($el as $els) : ?>
    <form action="/updateClient/<?= $els->getid_client() ?>" method="post" class="homepage">
        <div class="name">
            <div>
                <input type="text" id="firstName" name="firstName" value="<?= $els->getprenom_client() ?>">
                <label for="firstName">first name</label>
                <?php if (error("firstName")) : ?>
                    <p class="error"><?= error("firstName") ?></p>
                <?php endif ?>
            </div>
            <div>
                <input type="text" id="lastName" name="lastName" value="<?= $els->getnom_client() ?>">
                <label for="lastName">last name</label>
                <?php if (error("lastName")) : ?>
                    <p class="error"><?= error("lastName") ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="email">
            <input type="email" id="email" name="email" value="<?= $els->getemail_client() ?>">
            <label for="email">email</label>
            <?php if (error("email")) : ?>
                <p class="error"><?= error("email") ?></p>
            <?php endif ?>
        </div>
        <div class="send">
            <input type="submit" value="submit">
            <input type="reset" value="cancel">
        </div>
    </form>
<?php endforeach ?>



<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>