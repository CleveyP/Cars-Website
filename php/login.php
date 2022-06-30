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
            <h2 id="login-title">Log In</h2>

            <div class="login-content">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter Email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
               
            <div class="login-submit">
                <button type="submit" id="login-button">Log In</button>
            </div>
        </form>

        <div class="register-link">
            <p>or</p>
            <p>Don't have an account? <a href="register.php"> Register here</a></p>
        </div>
        
    </div>

    <!-- <div class="login-footer">
        <?php include("footer.php"); ?>
    </div> -->
</body>
</html>