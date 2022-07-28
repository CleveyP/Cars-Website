<?php include('header.php'); ?>
<h1>Change Password </h>

    <form id='change-password-form' method='POST' action='change_password.php'>
        <label for="old-password">Enter Your Existing Password</label>
        <input type='text' name='old-password' id='old-password' required>

        <label for="new-password"> Enter Your New Password</label>
        <input type='text' name='new-password' id='password' required>

        <label for="confirm-password"> Confirm Your New Password</label>
        <input type='text' name='confirm-password' id='confirm-password' required>
        <button type="submit">Confirm</button>
    </form>

    <?php include('footer.php');?>


<script defer src="../js/javascript.js"></script>