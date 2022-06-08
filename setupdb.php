<?php // this file should be run before interacting with the site. It sets up the automotive database. TODO: once testng is complete delete the drop db line

include("db_settings.php");

// Create connection to mysqli server (the i in mysqli stands for "improved")
$conn = mysqli_connect($server, $user, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DROP DATABASE IF EXISTS automotive"; //if the database exists then we drop it.
if(mysqli_query($conn, $sql)){
    echo "database dropped successfully<br>";
}
else{
    echo "error.<br>";
}
// Create database
$sql = "CREATE DATABASE automotive"; //recreate or create the initial database which will be populated below.
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn); 

//connect again to the newly created db.
$conn = mysqli_connect($server, $user, $password, $database);

//create the user table
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    h_password CHAR(255) NOT NULL, 
    email VARCHAR(50)
    )"; //h_password is user's HASHED password
if (mysqli_query($conn, $sql)) {
    echo "Table users created successfully";
  } else {
    echo "Error creating users table: " . mysqli_error($conn);
  }
//insert dummy users into the users table
$hashed = "'" . password_hash("1234", PASSWORD_DEFAULT) . "'";
  $sql = "INSERT INTO users (firstname, lastname, email, h_password)
VALUES ('Cleveland', 'Plonsey', 'clevelandplonsey@gmail.com', " . $hashed .  ")";

if (mysqli_query($conn, $sql)) {
  echo "New account created successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$hashed = "'" . password_hash("lounes", PASSWORD_DEFAULT) . "'";
  $sql = "INSERT INTO users (firstname, lastname, email, h_password)
VALUES ('Lounes', 'Allache', 'locolounes@gmail.com', " . $hashed . ")";

if (mysqli_query($conn, $sql)) {
  echo "New account created successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//end user table setup

//setup products table
$sql = "CREATE TABLE products (
  product_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  product_name VARCHAR(100),
  product_make VARCHAR(50),
  product_model VARCHAR(50),
  product_price INT(10),
  product_mileage INT(10),
  product_stock INT(10),
  product_is_new BOOLEAN,
  product_year INT(4),
  product_color VARCHAR(30)
  )";

  if(mysqli_query($conn, $sql)){
    echo "products table created successfully";
  }
  else{
    echo "Error: " . $sql . "<br" . mysqli_error($conn);
  }

  //insert products into products table
  $sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
                    VALUES    ('2013 Honda Accord', 'Honda', 'Accord', 14000, 50432, 1, FALSE, 2013, 'gold')";
if(mysqli_query($conn, $sql)){
  echo "inserted 2013 Honda Accord successfully. <br>";
}
else{
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2015 Subaru Forester', 'Subaru', 'Forester',        15000,           45000,          1,            FALSE,        2015,        'gold')";
if(mysqli_query($conn, $sql)){
echo "inserted 2015 Subaru Forester successfully. <br>";
}
else{
echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

mysqli_close($conn);
?> 

