<?php
ob_start();
?>

<section class="register">
    <div class="loginWindow">
        <h2>Register</h2>
        <form action="/register" method="POST">
            <?php
            if (isset($_SESSION['erreur']))
                echo '<p style="color:red; font-size:1.6rem">' . $_SESSION['erreur'] . '</p>';
            unset($_SESSION['erreur']);
            ?>
            <input type="email" placeholder="Email" name="Email" id="email">
            <input type="password" placeholder="Password" name="Password" id="password">
            <input type="password" placeholder="Confirm password" name="PasswordVerif" id="passwordVerif">
            <input type="submit" value="Register">
        </form>

    </div>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'user/userLayout.php';
