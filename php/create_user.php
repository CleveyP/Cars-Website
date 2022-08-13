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
        h1 {
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
    if (!$conn) {
        echo "Error connecting to mysql server.";
    }

   


    //pull in the user's entered account credentials from the register.php page's form element
    $firstname = "'" . $_POST["firstName"] . "'";
    $lastname  = "'" .  $_POST["lastName"] . "'";
    $password  = $_POST["password"];
    $email  = "'" . $_POST["email"] . "'";


     //check to make sure email is available (not in db already)
     $sql = "SELECT * FROM users WHERE email = " . $email;

     $result = mysqli_query($conn, $sql);
     if(mysqli_num_rows(($result)) !=0){ //if the email is already in the db
        echo "<h2 id='email-already-exists'>The entered email is already associated with an existing account.</h2> <br> 
        <a href='./login.php' id='return-login-link'>Click here to return to log in page.</a>"; //tell the user that the email already is associated with an existing account.
     }
     else{
    //hash the user's password 
    $hashed = "'" . password_hash($password, PASSWORD_DEFAULT) . "'";

    //insert the new user account into the users table
    $sql = "INSERT INTO users (firstname, lastname, email, h_password, dark_value)
    VALUES (" . $firstname . "," .  $lastname . "," . $email . ","  . $hashed .  ", '.bright')";
    if (mysqli_query($conn, $sql)) {

        echo "<h1>Okay, " . $_POST['firstName'] . ". Your account has been set up successfully!</h1> <br>";
        $_SESSION["isLoggedIn"] = TRUE;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $hashed;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['dark_value'] = ".dark";
    } else {
        echo "Error occurred in setting up the account.<br>";
    }
    //get user id and store it in the session variable
    $sql = "SELECT id FROM users WHERE firstname =" . $firstname . "AND email =" . $email;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $id = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $id['id'];
    } else {
        echo "Error getting user id from user table";
    }
}
    include("footer.php"); ?>
</body>

</html>