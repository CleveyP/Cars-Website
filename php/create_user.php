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

    //connect to the mysql server
    include("db_settings.php");
    $conn = mysqli_connect($server, $user, $password, $database);
    if(!$conn){
        echo "Error connecting to mysql server.";
    }

    //pull in the user's entered account credentials from the register.php page's form element
    $firstname = "'". $_POST["first-name"] . "'";
    $lastname  = "'" .  $_POST["last-name"] . "'";
    $password  = "'" . $_POST["password"] . "'";
    $email  = "'" . $_POST["email"] . "'";
   
    //hash the user's password 
    $hashed = "'" . password_hash($password, PASSWORD_DEFAULT) . "'"; 

    //insert the new user account into the users table
    $sql = "INSERT INTO users (firstname, lastname, email, h_password)
  VALUES (" . $firstname . "," .  $lastname . "," . $email . ","  . $hashed .  ")";
  if(mysqli_query($conn, $sql)){
      echo "<h1>Okay, $firstname. Your account has been set up successfully!</h1> <br>";
      $_SESSION["isLoggedIn"] = TRUE;
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $hashed;
      $_SESSION['firstname'] = $firstname;
      $_SESSION['lastname'] = $lastname;
  }
  else{
      echo "Error occurred in setting up the account.<br>";
  }
    include("footer.php"); ?>
    <form action="index.php" method='POST'>
    <input type="submit">
    </form>
</body>
</html>