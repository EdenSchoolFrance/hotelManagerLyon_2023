<?php
ob_start();
?>

<section class="clients">
    <h1>Nos Clients</h1>
    <div class="allClients">
        <h3>Toutes nos clients...</h3>
        <div id="btnAddClient" class="btn">Ajouter un client</div>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th colspan="3">Email</th>
            </tr>
            <?php foreach ($clients as $client) { ?>
                <tr>
                    <td><?= $client->getNom() ?></td>
                    <td><?= $client->getPrenom() ?></td>
                    <td><?= $client->getMail() ?></td>
                    <td><a href="/updateClient">Modifier</a></td>
                    <td><a href="/deleteClient">Supprimer</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div id="addClient" class="close">
        <div id="btnCloseClient">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <form action="/addClient" method="post">
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prenom">
            <input type="email" name="email" placeholder="xxzz@exemple.com">
            <input type="password" name="password" placeholder="Mot de passe">
            <button class="btn" type="submit">Ajouter</button>
        </form>
    </div>
</section>
<script>
    //open and close form to add client
    const btnOpenAddClient = document.querySelector("#btnAddClient");
    const btnCloseAddClient = document.querySelector("#btnCloseClient");
    const formAddClient = document.querySelector("#addClient");

    btnOpenAddClient.addEventListener("click", () => {
        formAddClient.classList.remove("close");
        formAddClient.classList.add("open");
    });
    btnCloseAddClient.addEventListener("click", () => {
        formAddClient.classList.remove("open");
        formAddClient.classList.add("close");
    });
</script>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
