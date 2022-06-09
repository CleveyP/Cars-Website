<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Account Confirmation
    </title>
    <style>
        h1{
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php 
    
    include("header.php"); 
    include("db_settings.php");
    $conn = mysqli_connect($server, $user, $password, $database);
    if(!$conn){
        echo "Error connecting to mysql server.";
    }

    $firstname = "'". $_POST["first-name"] . "'";
    $lastname  = "'" .  $_POST["last-name"] . "'";
    $password  = "'" . $_POST["password"] . "'";
    $email  = "'" . $_POST["email"] . "'";
   
    $hashed = "'" . password_hash($password, PASSWORD_DEFAULT) . "'"; //hash the password
    $sql = "INSERT INTO users (firstname, lastname, email, h_password)
  VALUES (" . $firstname . "," .  $lastname . "," . $email . ","  . $hashed .  ")";
  if(mysqli_query($conn, $sql)){
      echo "<h1>Okay, $firstname. Your account has been set up successfully!</h1> <br>";
  }
  else{
      echo "Error occurred in setting up the account.<br>";
  }
    include("footer.php"); ?>
</body>
</html>