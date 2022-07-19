<?php include('header.php'); ?>

<h1>Change Password </h>

    <form id='change-password-form' method='POST' action='change_password.php'>
        <label for="old-password">Enter Your Existing Password</label>
        <input type='text' name='old-password' id='old-password' required>

        <label for="new-password"> Enter Your New Password</label>
        <input type='text' name='new-password' id='new-password' required>

        <label for="confirm-password"> Confirm Your New Password</label>
        <input type='text' name='confirm-password' id='confirm-password' required>
        <input type="submit">
    </form>

    <?php
    if ($_POST['old-password']) {
        include("db_settings.php");
        $conn = mysqli_connect($server, $user, $password, $database);
        if ($conn) {
            $hashed = "'" . password_hash($_POST['new-password'], PASSWORD_DEFAULT) . "'";
            $userid = $_SESSION['user_id'];
            $sql = "UPDATE users SET h_password"  . $hashed . "WHERE id = " . $userid;
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo $sql . mysqli_error($conn);
            }
        } else {
            echo "Error connecting to database.<br>";
        }
    }



    include('footer.php');
    ?>