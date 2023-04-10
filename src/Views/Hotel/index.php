<?php
ob_start();
?>
<h1>Accueil - Que voulez-vous faire ?</h1>
<ul class="action">
    <li>
        <a href="/newClient">
            <i class="fa-solid fa-user-plus" style="color: #fff;"></i>
            <h2>Ajouter un client</h2>
        </a>
    </li>
    <li>
        <a href="/allClients">
            <i class="fa-solid fa-users-gear" style="color: #fff;"></i>
            <h2>Voir tous les clients</h2>
        </a>
    </li>
    <li>
        <a href="/newReservation">
            <i class="fa-solid fa-hotel" style="color: #fff;"></i>
            <h2>Faire une rédervation client</h2>
        </a>
    </li>
</ul>







</section>




<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
