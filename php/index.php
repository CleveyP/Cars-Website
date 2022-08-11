<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Automotive</title>
</head>

<body id="index-body">
    <script src="../js/index.js" defer></script>
    <!--header-->
    <?php include("header.php"); ?>


    <!--end header-->

    <main>
        <!--main content -->
        <img id="index-picture" src="../pictures/road.jpg" alt="nissan GT">
        <!-- Carousel -->
        <div class="carousel">
            <div class="slide" id="slide-1">
                <a href="./product.php?id=1" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Accord.jpg" alt="">
                        <p class="car-name">2013 Honda Accord</p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-price">$14,000.00</p>
                    </div>
                </a>

                <a href="./product.php?id=2" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/forester.jpg" alt="">
                        <p class="car-price">$15,000.00</p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-name">2015 Suburu Forester</p>
                    </div>
                </a>
                <a href="./product.php?id=3" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/lexus.jpg" alt="">
                        <p class="car-name">2013 Toyota Lexus</p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-price">$12,000.00</p>
                    </div>
                </a>

                <a href="./product.php?id=6" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Silverado.jpg" alt="">
                        <p class="car-name"> 2016 Chevrolet Silverado</p>
                        <p class="car-price">$7,000.00</p>
                        <p class="car-miles">40k Miles</p>
                    </div>
                </a>

                <a href="./product.php?id=4" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Civic.jpg" alt="">
                        <p class="car-name">2020 Honda Civic</p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-price">$24,000.00</p>
                    </div>
                </a>
            </div>
            <div class="slide" id="slide-2">
                <a href="./product.php?id=5" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/GTR.jpg" alt="">
                        <p class="car-name">2021 Nissan GTR </p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-price">$120,000.00</p>
                    </div>
                </a>
                <a href="./product.php?id=7" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Forte.jpg" alt="">
                        <p class="car-name">2014 Kia Forte</p>
                        <p class="car-miles">102k Miles</p>
                        <p class="car-price">$10,850.00</p>
                    </div>
                </a>

                <a href="./product.php?id=8" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Huracan.jpg" alt="">
                        <p class="car-name">2019 Lamborghini Huracan</p>
                        <p class="car-miles">0 Miles</p>
                        <p class="car-price">$326,000.00</p>
                    </div>
                </a>

                <a href="./product.php?id=9" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Jetta.jpg" alt="">
                        <p class="car-name">2011 Volkswagen Jetta</p>
                        <p class="car-miles">70k Miles</p>
                        <p class="car-price">$12,888.00</p>
                    </div>
                </a>

                <a href="./product.php?id=10" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Tacoma.jpg" alt="">
                        <p class="car-name">2022 Toyota Tacoma</p>
                        <p class="car-miles">0 Miles</p>
                        <p class="car-price">$27,000.00</p>
                    </div>
                </a>
            </div>

            <button id="left-chevron" class="chevron">
                < </button>
                    <button id="right-chevron" class="chevron">></button>
        </div>
        <!-- End Carousel -->
        <!--filters section -->
        <div id="filters-container">
            <form action="?" method="POST" id="filters-form">
                <label for="mileage">Mileage</label>
                <input id='mileage-slider' type="range" name="mileage" max='400000' min='0' steps='75' >
                <p id='mileage-display'>Mileage:</p>

                <label for="price">Price</label>
                <input type="text" name="price">

                <label for="new">New Cars</label>
                <input type="radio" id="new-radio" name="new_used" value="new">
                <label for="used">Used Cars</label>
                <input type="radio" id="used-radio" name="new_used" value="used">

                <button type="submit" id="apply-filters-button" >Apply Filters</button>
            </form>
        </div>
        <!--end filters section -->

        <!--initial products selection -->
        <div id="products-container">
            <h2 id="products-title">Offerrings</h2>

            <div class="car-grid" id="car-grid">
                <?php
                    if(!empty($_POST)){
                        $priceFilter = ($_POST['price']!= "") ? (int) $_POST['price'] : 10000000;
                        $mileageFilter = ($_POST['mileage']!= "") ? (int) $_POST['mileage'] : 10000000;
                        if (isset($_POST['new_used']) && $_POST['new_used'] === 'new') {
                            $isNew = 'true';
                        }
                        else if (isset($_POST['new_used']) && $_POST['new_used'] === 'used') {
                            $isNew = 'false';
                        }
                        else {
                            $isNew = null;
                        }
                    //connect to db
                    include("db_settings.php");
                    $conn = mysqli_connect($server, $user, $password, $database);
                    if($conn){
                        if ($isNew != null) {
                            $sql = 'SELECT * FROM products WHERE product_price <= ' .  $priceFilter . ' AND product_mileage <= ' . $mileageFilter . ' AND product_is_new = ' . $isNew;
                        } 
                        else {
                            $sql = 'SELECT * FROM products WHERE product_price <= ' .  $priceFilter . ' AND product_mileage <= ' . $mileageFilter;
                        }
                        $result = mysqli_query( $conn, $sql);
                        if($result){
                            while ($row = mysqli_fetch_assoc($result)) {
                                $img_path;
            
                                if($row['product_image_path'] === 'local'){
                                    $img_path = $row['product_model'] . ".jpg";
                                }
                                else{
                                    $img_path = $row['product_image_path'];
                                }
                                echo  '<a href="./product.php?id=' . $row["product_id"]  . '"class="item-link">
                                <div class="grid-item">
                                    <img  src="../pictures/' . $img_path . '" alt="">
                                    <p class="car-name">' . $row["product_name"] . '</p>
                                    <p class="car-miles">Miles: ' . $row["product_mileage"] . '</p>
                                    <p class="car-price">$' . $row["product_price"] . '</p>
                                </div>
                            </a>';
                            }
                        }
                        else{
                            echo 'error in mysql query ' . $sql;
                        }
                    }
                    else{
                        echo 'error connectiong to server.';
                    }
                }
                else{
                    echo 
                    '<a href="./product.php?id=3" class="item-link">
                        <div class="grid-item">
                            <img src="../pictures/lexus.jpg" alt="">
                            <p class="car-name">2013 Toyota Lexus</p>
                            <p class="car-miles">40k Miles</p>
                            <p class="car-price">$12,000.00</p>
                        </div>
                    </a>

                    <a href="./product.php?id=2" class="item-link">
                        <div class="grid-item">
                            <img src="../pictures/forester.jpg" alt="">
                            <p class="car-name">2015 Suburu Forester</p>
                            <p class="car-miles">40k Miles</p>
                            <p class="car-price">$15,000.00</p>
                        </div>
                    </a>

                    <a href="./product.php?id=6" class="item-link">
                        <div class="grid-item">
                            <img src="../pictures/Silverado.jpg" alt="">
                            <p class="car-name">2016 Chevrolet Silverado</p>
                            <p class="car-miles">32K Miles</p>
                            <p class="car-price">$43,000.00</p>
                        </div>
                    </a>

                    <a href="./product.php?id=1" class="item-link">
                        <div class="grid-item">
                            <img src="../pictures/Accord.jpg" alt="">
                            <p class="car-name">2013 Honda Accord</p>
                            <p class="car-miles">50k Miles</p>
                            <p class="car-price">$14,000.00</p>
                        </div>
                    </a>

                    <a href="./product.php?id=4" class="item-link">
                        <div class="grid-item">
                            <img src="../pictures/Civic.jpg" alt="">
                            <p class="car-name">2020 Honda Civic</p>
                            <p class="car-miles">0 Miles</p>
                            <p class="car-price">$24,000.00</p>
                        </div>
                    </a>

                    <a href="./product.php?id=5" class="item-link">
                        <div class="grid-item">
                            <img src="../pictures/GTR.jpg" alt="">
                            <p class="car-name">2021 Nissan GTR </p>
                            <p class="car-miles">0 Miles</p>
                            <p class="car-price">$120,000.00</p>
                        </div>
                    </a>';
                }
                ?>
            </div>
        </div>
        <!-- end initial products selection -->

        <!--make this section like the cars.com site's section with drop down menus instead of links -->
        <h2 id="popular-searches-header">Popular Searches</h2>
        <div id="popular-searches">
            <a href="">Popular New Cars For Sale</a>
            <a href="">Popular Used Cars For Sale</a>
        </div>
    </main>

    <?php include("footer.php"); ?>

</body>

</html>