<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Automotive</title>
    <link href="../css/styles.css" rel="stylesheet">
</head> 
<body>
    <!--header-->

    <?php include("header.php"); ?>

    <!--end header-->


    <!--sign in user-->
    <?php 
    session_start();
    if(isset($_SESSION["email"])){

        $user_email = $_POST["email"];
        $user_password = $_POST["password"];
        if($user_email && $user_password){
            
            $_SESSION["email"] = $user_email;
            $_SESSION["password"] = $user_password;

            //connect to db
            include('db_settings.php');
            $conn = mysqli_connect($server, $user, $password, $database);
            if(!$conn){
                echo "Error connecting to db<br>";
            }
            //hash password 
            $hashed_password =  password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "SELECT * from users WHERE h_password = hashed_password AND email = user_email";
            $user_info = mysqli_query($conn, $sql);
            if($user_info){
                $user_info = mysqli_fetch_assoc($user_info);
                $_SESSION["firstname"] = $user_info["firstname"];
                $_SESSION["lastname"] = $user_info["lastname"];
                $_SESSION["user_id"] = $user_info["id"];
                echo "logged in successfully<br>";
            }
            else{
                echo "Error querying server for user info";
            }
        }
    }
   

    ?>
    <main>
        <!--main content -->
        <div id="hero-container">
            <img id="hero" src="../pictures/road.jpg" alt="nissan GT">
        </div>
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
                <button type="submit">Apply Filters</button> <!--TODO: Implement this filter feature. Either we'll use js or do it on the server side IDK yet -->
                <button>Reset Filters</button> <!--TODO: implement this button. It should restore the filters to their starting position of clear -->
            </form>
        </div>
        <!--end filters section -->

        <!--initial products selection -->
        <div id="products-container">
            <h2>Offerrings</h2>
            <div id="car-grid" class="grid">
                <a href="./product/" target="_blank" class="item-link" >
                    <div class="grid-item">
                        <img src="../pictures/lexus.jpg" alt="">
                        <p class="car-name">2013 Toyota Lexus</p>
                        <p class="car-price">$12,000.00</p>
                        <hr>
                    </div>
                </a>

                <a href="./product/" target="_blank" class="item-link" >
                    <div class="grid-item">
                        <img src="../pictures/forester.jpg" alt="">
                        <p class="car-name">2015 Suburu Forester</p>
                        <p class="car-price">$15,000.00</p>
                        <hr>
                    </div>
                </a>

                <a href="./product/" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Silverado.jpg" alt="">
                        <p class="car-name"> 2016 Chevrolet Silverado</p>
                        <p class="car-price">$7,000.00</p>
                        <hr>
                    </div>
                </a>

                <a href="./product/" target="_blank" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Accord.jpg" alt="">
                        <p class="car-name">2013 Honda Accord</p>
                        <p class="car-price">$14,000.00</p>
                        <hr>
                    </div>
                </a>

                <a href="" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/Civic.jpg" alt="">
                        <p class="car-name">2020 Honda Civic</p>
                        <p class="car-price">$24,000.00</p>
                        <hr>
                    </div>
                </a>

                <a href="" class="item-link">
                    <div class="grid-item">
                        <img src="../pictures/GTR.jpg" alt="">
                        <p class="car-name">2021 Nissan GTR </p>
                        <p class="car-price">$120,000.00</p>
                        <hr>
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