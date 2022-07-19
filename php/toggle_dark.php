<?php
//toggle the dark mode value in the user table
//update database
// update the session variable that contains whether or not the user is in dark mode
//every page's body element should now have a class '.dark' or '.bright' that loads in the value through the session variable from the user table. 
include('db_settings.php');
$conn = mysqli_connect($server, $user, $password, $database);
if ($conn) {
    session_start();
    $darkValue = ($_POST['dark-mode-button']) ? ".dark" : ".bright";
    $userid = $_SESSION['user_id'];
    $sql = 'UPDATE users SET dark_value = ' . $darkValue . ' WHERE id = ' . $userid;
    if (mysqli_query($conn, $sql)) {
        $_SESSION['is_dark'] = $darkValue;
        ob_start();
        header("Location: profile.php");
        ob_end_flush();
        die();
    } else {
        echo $sql . " Error issuing the query " . mysqli_error($conn);
    }
} else {
    echo "Error connecting to mysql server. <br>";
}
