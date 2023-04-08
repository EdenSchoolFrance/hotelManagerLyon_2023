<?php
ob_start();
?>
<h1>Accueil - Que voulez-vous faire ?</h1>
<ul id="action-menu">
    <li>
        <i class="fa-solid fa-user-plus" style="color: #3f90d3;"></i>
        <a href="/newClient" class="cta">Ajouter un client</a>
    </li>
    <li>
        <i class="fa-solid fa-users-gear" style="color: #3f90d3;"></i>
        <a href="/allClients" class="cta">Voir tous les clients</a>
    </li>
    <li>
    <i class="fa-solid fa-hotel" style="color: #3f90d3;"></i>
        <a href="/newReservation" class="cta">Faire une rédervation client</a>
    </li>
</ul>







</section>




<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
