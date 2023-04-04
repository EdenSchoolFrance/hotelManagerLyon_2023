<?php ob_start() ?>

<h1>add staff details</h1>

<form action="/add/client" method="post" class="homepage">
    <h2>basic information</h2>
    <div class="name">
        <div>
            <input type="text">
            <label for="firstName">first name</label>
        </div>
        <div>
            <input type="text">
            <label for="lastName">last name</label>
        </div>
    </div>
    <div class="email">
        <input type="email">
        <label for="email">email</label>
    </div>
    <div class="send">
        <input type="submit" value="submit">
        <input type="reset" value="cancel">
    </div>
</form>

<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>