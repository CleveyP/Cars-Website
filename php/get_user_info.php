
<?php
//connect to db
include("db_settings.php");
$conn = mysqli_connect($server, $user, $password, $database);
session_start();

if (!$conn) {
    echo "Error connecting to db<br>";
}
$password = $_POST['password'];
$user_email = $_POST['email'];
// retrieve user data from backend
$password = $password;
$user_email = "'" . $user_email . "'";
$sql = "SELECT * from users WHERE email = $user_email";
$result = mysqli_query($conn, $sql);

if ($result) {
    $user_info = mysqli_fetch_assoc($result);

    // set session variables
    if (password_verify($password, $user_info["h_password"])) {
        $_SESSION["isLoggedIn"] = TRUE;
        $_SESSION["firstname"] = $user_info['firstname'];
        $_SESSION["lastname"] = $user_info["lastname"];
        $_SESSION["user_id"] = $user_info["id"];
        $_SESSION['email'] = $user_info["email"];
        $_SESSION['password'] = $user_info["h_password"];
        $_SESSION['dark_value'] = $user_info['dark_value'];

        //. automatically redirect back to index.php
        ob_start();
        header("Location: index.php");
        ob_end_flush();
        die();
    }
    else {
        echo "Email or Passsword is incorrect <br>";    
    } 
} else {
    //header("login.php");
    //$_SESSION["isLoggedIn"] = FALSE;
    echo "Error: " . $sql . mysqli_error($conn);
}

mysqli_close($conn);
?>








