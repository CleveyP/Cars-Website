<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("header.php"); //log the user out
    if (($_SESSION['isLoggedIn'])) {
        $_SESSION["isLoggedIn"] = FALSE;
        $_SESSION["firstname"] = null;
        $_SESSION["lastname"] = null;
        $_SESSION["user_id"] = null;
        $_SESSION['email'] = null;
        $_SESSION['password'] = null;
    }

    ?>
    <h2 id='logout-h2'>You have been logged out successfully!</h2>
    <img id = 'logout-img' src="../pictures/car_driving_off.jpg" alt="car driving off into the distance">

    <?php include("footer.php"); ?>
</body>

</html>