<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="../css/styles.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    
    <header class="form-header">
        <a href="./index.php">Best Automotive</a>
    </header>
    
    <div class="register-container">
        <form id="registration-form" action="create_user.php" method="POST">

            <h2 id="register-title">Register</h2>

            <div class="register-content">
                <label for="first-name">First Name</label>
                <input type="text" name="first-name" id="first-name" placeholder="Enter Name" required>

                <label for="last-name">Last Name</label>
                <input type="text" name="last-name" id="last-name" placeholder="Enter Last Name" required>
                
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Email" required>
                
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
                
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name= "confirm-password" id="confirm-password" placeholder="Confirm Password" required> <!--TODO enforce that the confirm pass is the same as the first entered password via js -->
            </div>
            
            <div class="register-submit">
                <button type="submit">Register</button>
            </div>
        </form>
    </div> 
</body>
</html>