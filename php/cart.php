<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Automotive Cart</title>
    <script src="../js/show_details.js" defer></script>
</head>

<body>
    <?php include("header.php"); ?>

    <?php
    //check if they are logged in
    if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == TRUE) {
        $firstname = $_SESSION['firstname'];
        $firstname = trim($firstname, "'");
        echo "<h1 id='cart-title'>" . $firstname . "'s Cart</h1><br>";

        //connect to database
        include("db_settings.php");
        $conn = mysqli_connect($server, $user, $password, $database);

        //check if connection to to MySql server is good
        if ($conn) {
            //create query
            $id = $_SESSION['user_id'];
            $id = trim($id, "'"); //might need to trim " as well as '
            $sql = "SELECT product_id FROM cart WHERE " . $id . " = users_id";

            //launch query
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $sql = "SELECT * FROM products WHERE " . $row['product_id'] . " = product_id";
                    $product_values = mysqli_query($conn, $sql);
                    if ($product_values) {
                        $values = mysqli_fetch_assoc($product_values);
                        // (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
                        $is_new = $values['product_is_new'] ? "New" : "Used";
                        echo
                            "<div class='product-container'>
                                <img class='cart-product-img' src='../pictures/" . $values['product_model'] . ".jpg' alt='picture of car'/>

                                <div class='specs-container'>
                                    <p class='cart-product-name'>" . $is_new . " " . $values['product_name'] . "</p>

                                    <div class='price-mileage'>
                                        <h2 class='product-spec' class='product-price'>$" . $values['product_price'] . "</h2>
                                        <h2 class='product-spec'>" . $values['product_mileage'] . " miles</h2>
                                    </div>

                                    <form method='post' action='remove_cart_item.php'>
                                        <button type='submit' class='remove-cart-item-button'>X</button>
                                        <input class = 'invisible' type='text' name='item-to-remove' value='" . $values['product_id'] . "'/>
                                    </form>
                                </div>
                                <p value= '" . $values['product_id'] . "' class='cart-show-details'>Show Details</p>
                            </div>
                            <div class='product-details-container not-displayed' id = '" . $values['product_id'] . "'>
                                <h3>Details...</h3>
                                <p class='product-details'> Color: ". $values['product_color'] . "</p>
                            </div>";
                    } else {
                        echo "Error Parsing Product Row <br>";
                    }
                }
            } else {
                echo "<h3>Cart is Empty<h3>";
            }
        } else {
            echo "error connecting to SQL server. <br>";
        }
    } else {
        echo "<h1> Guest's Cart</h1><br>";
        echo "<a href='login.php'> Log in here to see your previous cart items!</a>";
    }


    ?>

    <?php include("footer.php"); ?>
</body>

</html>