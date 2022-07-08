<!DOCTYPE html>

<head>
    <link href="../css/styles.css" rel="stylesheet">
    <?php include("fontawesome.php"); ?>
</head>

<header>

    <a href="./index.php">
        <h1>Best Automotive</h1>
    </a>
    <img id="logo" src="" alt="">
    <form action="search-results.php" method="post">
        <input id="search-bar" type="text" name="search-bar" placeholder="Search by Make or Model">
        <!-- <button type="submit" id="search-button">Go!</button> -->
    </form>
    <a href="sell.php"><button id="sell-button">I want to Sell</button></a>
    <a href="cart.php" id="cart-link"><i class="fa-solid fa-cart-shopping"></i></a>

    <?php
    session_start();

    if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == TRUE) {
        $firstname = $_SESSION['firstname'];
        $firstname = trim($firstname, "'");
        echo " <h3 id='username'>" . $firstname . "</h3><a href='profile.php' id='profile-link'><i class='fa-solid fa-user'></i></a>
                <button onclick='logout()'>Logout</button>";
    } else {
        echo "<a href='login.php'><button id='register-button'>Log In</button></a>";
    }

    ?>

</header>