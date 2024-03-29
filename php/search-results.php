<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Automotive Search Results</title>
    <link href="../css/styles.css" rel="stylesheet">
    <style>
        h1 {
            color: white;
        }

        .search-result-container {
            margin: 5px;
            padding: 20px;
            background-color: #5994A4;
            border: 3px solid white;
            height: 300px;
            width: 300px;
        }

        .search-result-img {
            height: 200px;
            width: 200px;
        }

        .search-result-info-p {
            color: white;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>
    <h1>Search Results...</h1>
    <?php
    include("db_settings.php");
    $conn = mysqli_connect($server, $user, $password, $database);
    if (!$conn) {
        echo "Error connecting to mysql server!<br>";
    }
    $search_term = "'%" . $_POST["search-bar"] . "%'";
    $sql = "SELECT product_id, product_name, product_price, product_model, product_image_path FROM products WHERE product_name LIKE $search_term";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $img_path;
            
            if($row['product_image_path'] === 'local'){
                $img_path = $row['product_model'] . ".jpg";
            }
            else{
                $img_path = $row['product_image_path'];
            }
            echo "<a href='./product.php?id=" . $row['product_id']  . "' target='_blank' class='item-link'><div class='search-result-container'><img class='search-result-img' src='../pictures/" . $img_path . "' alt='picture of car'/><br>
    <p class='search-result-info-p'>" . $row['product_name'] . "<br>
     $" . $row['product_price'] . ".00</p>
    </div></a><br>";
        }
    } else {
        echo "0 search results";
    }


    ?>

    <?php include("footer.php"); ?>
</body>

</html>