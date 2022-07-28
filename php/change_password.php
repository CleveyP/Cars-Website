
    <?php
    session_start();

    if ($_POST['old-password']) {
        include("db_settings.php");
        $conn = mysqli_connect($server, $user, $password, $database);
        if ($conn) {

            $current_password = $_POST['old-password'];
            $current_password_hashed = $_SESSION['password'];
            
            if (password_verify($current_password, $current_password_hashed)) {
                $userid =  "'" . $_SESSION['user_id'] . "'";
                
                $new_password = $_POST['new-password'];
                $new_password_hashed = "'" . password_hash($new_password, PASSWORD_DEFAULT) . "'";
            
                $sql = "UPDATE users SET h_password = $new_password_hashed WHERE id = $userid";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo $sql . mysqli_error($conn);
                }
                
                ob_start();
                header("Location: profile.php");
                ob_end_flush();
                die();

            }
            else {
                ob_start();
                header("Location: change_password_form.php");
                ob_end_flush();
                die();
            }
            
        } 
        else {
            echo "Error connecting to database.<br>";
        }
    }
    ?>