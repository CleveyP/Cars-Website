<!DOCTYPE html>
<html lang="en">
<head>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Best Automotive</h1>
        <img id="logo" src="" alt="">
        <form action="search-results.php" method="post">
            <input id="search-bar" type="text" name="search-bar">
            <button type="submit" id="search-button">Go!</button>
        </form>
        <a href="sell.php"><button id="sell-button">I want to Sell</button></a>
        <a href="cart.php"><button id="cart"></button></a>
        <a href="profile.php"><button id="profile">Profile</button></a>
        <button onclick="logout()">Logout</button>
    </header>
</body>

<script>
    let logout = () =>{
        //set the session variables to undefined
    }
</script>
</html>
