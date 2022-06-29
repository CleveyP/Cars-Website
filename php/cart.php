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
    if(isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == TRUE){ //if they are logged in
        $firstname = $_SESSION['firstname'];
        $firstname = trim($firstname, "'");
        echo "<h1>" . $firstname . "'s Cart</h1><br>";
        //connect to database
        include("db_settings.php");
        $conn = mysqli_connect($server, $user, $password, $database);

        if($conn){
            //create query
            $id = $_SESSION['user_id'];
            $id = trim($id, "'"); //might need to trim " as well as '
            $sql = "SELECT product_id FROM cart WHERE" . $id . " = user_id";
            //launch query
            $result = mysqli_query($conn, $sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)) {
                    $sql = "SELECT * FROM products WHERE" . $row[0] . " = product_id";
                } //TODO FINISH THIS 
            }
            else{
                echo "problem querying database for user's cart<br>";
            }
        }
        else{
            echo "error connecting to SQL server. <br>";
        }
    }
    else{
        echo "<h1> Guest's Cart</h1><br>";
        echo "<a href='login.php'> Log in here to see your previous cart items!</a>";
    }


?>


<?php include("footer.php"); ?>
</body>
</html>