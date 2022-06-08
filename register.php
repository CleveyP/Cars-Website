<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            color: white;
            background-color: #013C57;
        }
        #registration-form{
            margin-top: 50px;
            width: 60%;
            height: 400px;
            background-color:  #5994A4;
            position: relative;
            left: 25%;
        }
       #registration-form input{
            margin-left: 20%;
            margin-bottom: 10px;
        }
        #registration-form label{
            margin-left: 20%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>
    
        <form id="registration-form" action="create_user.php" method="POST">
            <fieldset>
                <legend>Create Account</legend>
                <label for="first-name">First Name</label>
                <br>
                <input type="text" name="first-name" id="first-name" required>
                <br>
                <label for="last-name">Last Name</label>
                <br>
                <input type="text" name="last-name" id="last-name" required>
                <br>
                <label for="email">Email</label>
                <br>
                <input type="email" name="email" id="email" required>
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" id="password" required>
                <br>
                <label for="confirm-password">Confirm Password</label>
                <br>
                <input type="password" name= "confirm-password" id="confirm-password" required>
                <br>
                <input type="submit">
            </fieldset>
        </form>
    <?php include("footer.php"); ?>
</body>
</html>