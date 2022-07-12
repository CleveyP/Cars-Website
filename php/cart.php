<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Automotive Cart</title>
</head>

<body>
    <?php include("header.php"); ?>

    <?php
    //check if they are logged in
    if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == TRUE) {
        $firstname = $_SESSION['firstname'];
        $firstname = trim($firstname, "'");
        echo "<h1>" . $firstname . "'s Cart</h1><br>";

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
                        $is_new = $values['product_is_new'] ? "new" : "used";
                        echo "<h2 class='product-name-h2'>" . $is_new . " " . $values['product_name'] . "</h2><br>";
                        echo "<img src='#' alt='TODO'>"; //Below, print out all product specs and then add a remove button that POSTS the product to remove through a input value
                        echo
                        "<div class='specs-container'>
                                <p class='product-spec'>Make: " . $values['product_make'] . "</p><br>
                                <p class='product-spec'>Model: " . $values['product_model'] . "</p><br>
                                <p class='product-spec' class='product-price'>Price: $" . $values['product_price'] . "</p><br>
                                <p class='product-spec'>Mileage: " . $values['product_mileage'] . "</p><br>
                                <p class='product-spec'>Color: " . $values['product_color'] . "</p><br>


                                <form method='post' action='remove_cart_item.php'>
                                <button type='submit' class='remove-cart-item-button'>X</button>
                                <input class = 'invisible' type='text' name='item-to-remove' value='" . $values['product_id'] . "'/>
                                </form>

                            </div>";
                    } else {
                        echo "Error Parsing Product Row <br>";
                    }
                }
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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