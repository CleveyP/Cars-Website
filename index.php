<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Automotive</title>
</head>
<body>
    <!--header-->

    <?php include("header.php"); ?>

    <!--end header-->


    <main>
        <!--main content -->
        <div id="hero-container">
            <img id="hero" src="./pictures/nissan_hero.jpg" alt="nissan GT">
        </div>
    
        <div id="filters-container">
            <form action="">
                <label for="mileage">Mileage</label>
                <input type="range" name="mileage">

                <label for="price">Price</label>
                <input type="text" name="price">

                <label for="mileage">Make</label>
                <input type="range" name="make">

                <label for="model">Model</label>
                <input type="text" name="model">

                <label for="new">New Cars</label>
                <input type="radio" name="new">
                <label for="used">Used Cars</label>
                <input type="radio" name="used">

            </form>
        </div>

        <div id="products-container">
            <h2>Offerrings</h2>
            <div id="car-grid" class="grid">

                <a href=""><div class="grid-item">
                    <img src="./pictures/2013lexus.jpg" alt="">
                    <p class="car-name">2013 Toyota Lexus</p>
                    <p class="car-price">$12,000.00</p>
                </div></a>

                <a href=""><div class="grid-item">
                    <img src="./pictures/2015forester.jpg" alt="">
                    <p class="car-name">2015 Suburu Forester</p>
                    <p class="car-price">$15,000.00</p>
                </div></a>

                <a href=""><div class="grid-item">
                    <img src="" alt="">
                    <p class="car-name"></p>
                    <p class="car-price"></p>
                </div></a>

                <a href=""><div class="grid-item">
                    <img src="./pictures/2013accord.jpg" alt="">
                    <p class="car-name">2013 Honda Accord</p>
                    <p class="car-price">$14,000.00</p>
                </div></a>

                <a href=""><div class="grid-item">
                    <img src="./pictures/2020civic.jpg" alt="">
                    <p class="car-name">2020 Honda Civic</p>
                    <p class="car-price">$24,000.00</p>
                </div></a>

                <a href=""><div class="grid-item">
                    <img src="./pictures/nissan_hero.jpg" alt="">
                    <p class="car-name">2021 Nissan GTR </p>
                    <p class="car-price">$120,000.00</p>
                </div></a>


            </div>

        </div>


    </main>



    <?php include("footer.php"); ?>    

</body>
</html>