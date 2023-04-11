<?php
ob_start();
?>

<section class="client">
    <h1>creer un client</h1>
    <?php
    if(isset($_SESSION['error'])){
        echo "<p>".$_SESSION['error']."</p>";
    }
    ?>
    <form action="./create/bdd" method="POST">
        <input required type="text" name="nom" placeholder="nom">
        <input required type="text" name="prenom" placeholder="prenom">
        <input required type="email" name="email" placeholder="email">
        <input required type="password" name="password" placeholder="password">
        <input type="submit" value="envoyer">
    </form>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
