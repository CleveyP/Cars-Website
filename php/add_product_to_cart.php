<?php
session_start();
if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == TRUE) {
    //add item to cart
    $userID = $_SESSION['user_id'];
    $productID = $_POST['add-to-cart-button']; //from the product page's add-to-cart-button
    include('db_settings.php');

    $conn = mysqli_connect($server, $user, $password, $database);
    if ($conn) { //if conection is good
        $sql = "INSERT INTO cart (user_id, product_id) VALUES (" . $userID . "," .  $productID . ")";

        if (mysqli_query($conn, $sql)) {
            //navigate user back to the product.php page
            ob_start();
            header("Location: product.php?id=" . $productID);
            ob_end_flush();
            die();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error connecting to the database. <br>";
    }
}
