<?php

include('db_settings.php');
session_start();
$conn = mysqli_connect($server, $user, $password, $database);
$userID = $_SESSION['user_id'];
$productID = $_POST['item-to-remove'];

if ($conn) {
    //remove item from database
    $sql = "DELETE from cart WHERE users_id = " . $userID . " AND product_id = " . $productID;
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo " " . $sql . " " .  mysqli_error($conn);
    }
    ob_start();
    header("Location: cart.php");
    ob_end_flush();
    die();
} else {
    echo "Error trying to connect to database.<br>";
}
