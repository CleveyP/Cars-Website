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
                <a href="./product.php?id=1" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Accord.jpg" alt="">
                        <p class="car-name">2013 Honda Accord</p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-price">$14,000.00</p>
                    </div>
                </a>

                <a href="./product.php?id=2" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/forester.jpg" alt="">
                        <p class="car-price">$15,000.00</p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-name">2015 Suburu Forester</p>
                    </div>
                </a>
                <a href="./product.php?id=3" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/lexus.jpg" alt="">
                        <p class="car-name">2013 Toyota Lexus</p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-price">$12,000.00</p>
                    </div>
                </a>

                <a href="./product.php?id=6" target="_blank" class="item-link">
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
                <a href="./product.php?id=7" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Forte.jpg" alt="">
                        <p class="car-name">2014 Kia Forte</p>
                        <p class="car-miles">102k Miles</p>
                        <p class="car-price">$10,850.00</p>
                    </div>
                </a>

                <a href="./product.php?id=8" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Huracan.jpg" alt="">
                        <p class="car-name">2019 Lamborghini Huracan</p>
                        <p class="car-miles">0 Miles</p>
                        <p class="car-price">$326,000.00</p>
                    </div>
                </a>

                <a href="./product.php?id=9" target="_blank" class="item-link">
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
        <!--fiters section -->
        <div id="filters-container">
            <form action="index.php" method="POST" id="filters-form">
                <label for="mileage">Mileage</label>
                <input type="range" name="mileage">

                <label for="price">Price</label>
                <input type="text" name="price">

                <label for="mileage">Make</label>
                <input type="range" name="make">

                <label for="model">Model</label>
                <input type="text" name="model">

                <label for="new">New Cars</label>
                <input type="radio" id="new-radio" name="new/used" value="new">
                <label for="used">Used Cars</label>
                <input type="radio" id="used-radio" name="new/used" value="used">
                <button type="submit">Apply Filters</button>
                <!--TODO: Implement this filter feature. Either we'll use js or do it on the server side IDK yet -->
                <button>Reset Filters</button>
                <!--TODO: implement this button. It should restore the filters to their starting position of clear -->
            </form>
        </div>
        <!--end filters section -->

        <!--initial products selection -->
        <div id="products-container">
            <h2 id="products-title">Offerrings</h2>

            <div class="car-grid">
                <a href="./product.php?id=3" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/lexus.jpg" alt="">
                        <p class="car-name">2013 Toyota Lexus</p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-price">$12,000.00</p>
                    </div>
                </a>

                <a href="./product.php?id=2" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/forester.jpg" alt="">
                        <p class="car-name">2015 Suburu Forester</p>
                        <p class="car-miles">40k Miles</p>
                        <p class="car-price">$15,000.00</p>
                    </div>
                </a>

                <a href="./product.php?id=6" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Silverado.jpg" alt="">
                        <p class="car-name">2016 Chevrolet Silverado</p>
                        <p class="car-miles">32K Miles</p>
                        <p class="car-price">$43,000.00</p>
                    </div>
                </a>

                <a href="./product.php?id=1" target="_blank" class="item-link">
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
                </a>
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