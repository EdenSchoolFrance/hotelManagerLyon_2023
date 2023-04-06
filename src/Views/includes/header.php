<?php ob_start() ?>
<nav>
    <a href="/"><img src="/img/logo.png" alt=""></a>
    <ul>
        <li><a href="/addClient">add client</a></li>
        <li><a href="/showClients">show client</a></li>
    </ul>
</nav>
<?php
$header = ob_get_clean();
?>