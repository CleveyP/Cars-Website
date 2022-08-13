<?php include('header.php'); ?>
<h1>Change Username </h>

    <form id='change-username-form' method='POST' action='change_username.php'>

        <label for="new-firstname"> Enter Your New first name</label>
        <input type='text' name='new-firstname' id='password' required>


        <label for="new-lastname"> Enter Your New last name</label>
        <input type='text' name='new-lastname' id='password' required>

        <button type="submit">Confirm</button>
    </form>

    <?php include('footer.php');?>


<script defer src="../js/javascript.js"></script>