<?php ob_start() ?>

<h1>add staff details</h1>

<form action="/addClient" method="post" class="homepage">
    <h2>basic information</h2>
    <div class="name">
        <div>
            <input type="text" id="firstName" name="firstName">
            <label for="firstName">first name</label>
        </div>
        <div>
            <input type="text" id="lastName" name="lastName">
            <label for="lastName">last name</label>
        </div>
    </div>
    <div class="email">
        <input type="email" id="email" name="email">
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