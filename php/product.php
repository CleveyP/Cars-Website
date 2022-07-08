<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>

<body id="product-page-body">
    <?php include("header.php"); ?>

    <?php
    include("db_settings.php");
    $conn = mysqli_connect($server, $user, $password, $database);
    if (!$conn) {
        echo "error connecting to database. <br>";
    } else {
        //TODO get product ID from url... examine the line below and check for correctness. We want each product page to be generated via the query param ?id=some_number 
        $productID = $_GET['id'];
        echo "" . $productID; //   <-------debugging line

        $sql = "SELECT * FROM products WHERE product_id =" . $productID;

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $product_info = mysqli_fetch_assoc($result);

            //picture of car
            echo "<img class='product-page-img' src='../pictures/" . $product_info['product_model'] . ".jpg' alt='picture of car'/><br><br>";
            //name of car 
            echo "<h2 id = 'product-name'>" . $product_info['product_name'] . "</h2><br><br>";
            //car specs
            echo "<h3>Car specs</h3><br><hr><br>";


            //START section for all the product specs
            echo "<section id='product-specs-container'>";
            echo "<p class='product-specs-p' id='product-price'> Price: " . $product_info['product_price'] . "</p><br>";

            echo "<p class='product-specs-p'> year: " . $product_info['product_year'] . "</p><br>";

            echo "<p class='product-specs-p'> Mileage: " . $product_info['product_mileage'] . "</p><br>";

            echo "<p class='product-specs-p'> Color: " . $product_info['product_color'] . "</p><br>";

            echo "<form action='add_product_to_cart.php' method='post'><button name='add-to-cart-button' value='" . $productID . "' id='add-to-cart-button' type='submit'>Add to Cart</button></form><br><br>";
            echo "</section>";
            //END products specs section


            //additional pictures of car maybe?

            //reviews section 
            //TODO: create reviews table in mysql and display the reviews here between the section tags below
            echo "<section id='reviews-section'>";


            echo "</section>"; //end reviews section
        } else {
            echo "Error getting product info from the products table.<br>";
        }
    }
    ?>

    <?php include("footer.php"); ?>
</body>

</html>