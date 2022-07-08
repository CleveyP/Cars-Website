
<?php
//connect to db
include("db_settings.php");
$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    echo "Error connecting to db<br>";
}
$password = $_POST['password'];
$user_email = $_POST['email'];
// retrieve user data from backend
//hash password 
$hashed_password = "'" . password_hash($password, PASSWORD_DEFAULT) . "'";
$sql = "SELECT * from users WHERE h_password = $hashed_password AND email = $user_email";
$user_info = mysqli_query($conn, $sql);
if ($user_info) {
    $user_info = mysqli_fetch_assoc($user_info);
    // set session variables
    session_start();
    $_SESSION["isLoggedIn"] = TRUE;
    $_SESSION["firstname"] = $user_info["firstname"];
    $_SESSION["lastname"] = $user_info["lastname"];
    $_SESSION["user_id"] = $user_info["id"];
    $_SESSION['email'] = $user_info["email"];
    $_SESSION['password'] = $user_info["h_password"];
    //. automatically redirect back to index.php
    header("./index.php"); //TODO FIX THIS-- it should navigate back to the home page when it hits this line.
    exit();
} else {
    header("login.php");
    $_SESSION["isLoggedIn"] = FALSE;
}

?>








