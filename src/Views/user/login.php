<?php
ob_start();
?>

<section class="login">
    <div class="loginWindow">
        <h2>Login</h2>
        <form action="/login" method="POST">
            <?php
            if (isset($_SESSION['erreur']))
                echo '<p style="color:red; font-size:1.6rem">' . $_SESSION['erreur'] . '</p>';
            unset($_SESSION['erreur']);
            ?>
            <input type="email" placeholder="Email" name="Email" id="email">
            <input type="password" placeholder="Password" name="Password" id="password">
            <input type="submit" value="Login">
        </form>
    </div>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
