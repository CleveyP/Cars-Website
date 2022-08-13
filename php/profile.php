<body>
    <?php
    include('header.php');

    $firstname = trim($_SESSION['firstname']);
    $lastname = trim($_SESSION['lastname']);

    $darkValue = $_SESSION['dark_value'];
    echo "<h2 id='username'>" . substr($firstname, 1, -1) . " " . $lastname . "'s Profile<br>
    <section id='edit-profile'>
        <a href='change_password_form.php' id='change-password-a'>Change password</a><br>
        <a href='change_username_form.php' id='change-username-a'>Change Username</a><br>
        <form id='dark-form' method='post' action='toggle_dark.php'>
            <button id='dark-mode-button' name='dark-mode-button' value='" . $darkValue . "' type='submit'>Toggle Dark Mode</button>
        </form>
    </section>";

    include('footer.php');
    ?>

    <script src="../js/dark_mode.js"></script>
</body>