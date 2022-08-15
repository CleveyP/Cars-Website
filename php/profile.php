<body>
    <?php
    include('header.php');

    $firstname = trim($_SESSION['firstname']);
    $lastname = trim($_SESSION['lastname']);

    $darkValue = $_SESSION['dark_value'];
    echo "<h2 id='username'>" . substr($firstname, 1, -1) . " " . $lastname . "'s Profile</h2><br>
    <section id='edit-profile'>
        <h3 id='change-user-credentials'>Danger field!</h3>
        <a href='change_password_form.php' id='change-password-a' class='change-user-a'>Change password</a><br>
        <a href='change_username_form.php' id='change-username-a' class='change-user-a'>Change Username</a><br>
    </section>";

    include('footer.php');
    ?>

    <script src="../js/dark_mode.js"></script>
</body>