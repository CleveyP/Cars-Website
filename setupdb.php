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
    h_password VARCHAR(30) NOT NULL, 
    email VARCHAR(50)
    )"; //h_password is user's HASHED password
if (mysqli_query($conn, $sql)) {
    echo "Table users created successfully";
  } else {
    echo "Error creating users table: " . mysqli_error($conn);
  }

mysqli_close($conn);
?> 

