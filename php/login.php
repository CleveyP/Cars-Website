<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <title>Login Page</title>
</head>
<body>
    <?php include("header.php"); ?>

    <div class="login-container">

        <form action="get_user_info.php" method="POST" id="login-form">
            <div class="login-title-section"> 
                <h2 id="login-title">Login</h2>
            </div>

            <div class="login-content">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter Email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
               
            <div class="button-section">
                <button type="submit" id="login-button">Login</button>
            </div>
        </form>
        <a href="register.php"><p id="register-link">Don't have an account?  Register here</a></p>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>