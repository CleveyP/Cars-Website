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
        <div id="ad-container">
                <img src="./pictures/cola_ad.gif" alt="coca cola advertisement">
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



    </main>



    <?php include("footer.php"); ?>    

</body>
</html>