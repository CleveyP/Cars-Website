<?php // this file should be run before interacting with the site. It sets up the automotive database. TODO: once testng is complete delete the drop db line

include("db_settings.php");
session_start();

// Create connection to mysqli server (the i in mysqli stands for "improved")
$conn = mysqli_connect($server, $user, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DROP DATABASE IF EXISTS automotive"; //if the database exists then we drop it.
if (mysqli_query($conn, $sql)) {
  echo "database dropped successfully<br>";
} else {
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
    email VARCHAR(50),
    dark_value VARCHAR(30) DEFAULT '.dark'
    )"; //h_password is user's HASHED password
if (mysqli_query($conn, $sql)) {
  echo "Table users created successfully<br>";
} else {
  echo "Error creating users table: " . mysqli_error($conn);
}
//insert dummy users into the users table
$hashed = "'" . password_hash("1234", PASSWORD_DEFAULT) . "'";
$sql = "INSERT INTO users (firstname, lastname, email, h_password, dark_value)
VALUES ('Cleveland', 'Plonsey', 'clevelandplonsey@gmail.com', " . $hashed .  ", '.bright')";

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

if (mysqli_query($conn, $sql)) {
  echo "products table created successfully<br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

//insert products into products table
$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
                    VALUES    ('2013 Honda Accord', 'Honda', 'Accord', 14000, 50432, 1, FALSE, 2013, 'gold')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2013 Honda Accord successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2015 Subaru Forester', 'Subaru', 'Forester',        15000,           45000,          1,            FALSE,        2015,        'white')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2015 Subaru Forester successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2013 Toyota Lexus', 'Toyota', 'Lexus',        12000,           60000,          1,            FALSE,        2013,        'navy')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2013 Toyota Lexus successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2020 Honda Civic', 'Honda', 'Civic',        24000,           0,          3,            TRUE,        2020,        'gray')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2020 Honda Civic successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2021 Nissan GTR', 'Nissan', 'GTR',        120000,           0,          2,            TRUE,        2021,        'gray')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2021 Nissan GTR successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2016 Chevrolet Silverado', 'Chevrolet', 'Silverado',        43000,           32000,          1,            FALSE,        2016,        'white')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2016 Chevrolet Silverado successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2014 Kia Forte', 'Kia',           'Forte',       10850,           102280,          1,            FALSE,        2014,        'navy')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2014 Kia Forte successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2019 Lamborghini Huracan', 'Lamborghuni', 'Huracan',     326000,    00000,       1,           TRUE,          2019,        'green')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2019 Lambarghini Huracan successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2011 Volkswagen Jetta', 'Volkswagen', 'Jetta',        12888,           70000,          1,            FALSE,        2011,        'white')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2011 Volkswagen Jetta successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color) 
              VALUES    ('2022 Toyota Tacoma', 'Toyota', 'Tacoma',        27000,           00000,          1,            TRUE,        2022,        'blue')";
if (mysqli_query($conn, $sql)) {
  echo "inserted 2022 Toyota Tacoma successfully. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

$sql = "CREATE TABLE cart (
  users_id INT(6), 
  product_id INT(100)
  )";

if (mysqli_query($conn, $sql)) {
  echo "cart table created successfully. <br>";
} else {
  echo "Error: failed to create a cart table. <br>";
}

$sql = "INSERT INTO cart (users_id, product_id) VALUES (1, 1)";
if (mysqli_query($conn, $sql)) {
  echo "inserted a honda accord into Cleveland cart. <br>";
} else {
  echo "Error: " . $sql . "<br" . mysqli_error($conn);
}

mysqli_close($conn);