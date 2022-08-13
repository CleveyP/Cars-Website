
    <?php
    session_start();

        include("db_settings.php");
        $conn = mysqli_connect($server, $user, $password, $database);
        if ($conn) {
                $userid =  "'" . $_SESSION['user_id'] . "'";
                
                $new_firstname = "'" . $_POST['new-firstname']. "'";
                $new_lastname = "'". $_POST['new-lastname']. "'";
                $sql = "UPDATE users SET firstname = $new_firstname, lastname = $new_lastname WHERE id =" . $userid;
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo $sql . mysqli_error($conn);
                }
                else{
                    $_SESSION['firstname'] = $new_firstname;
                    ob_start();
                    header("Location: profile.php");
                    ob_end_flush();
                    die();
                }
            }
            else {
                ob_start();
                header("Location: change_username_form.php");
                ob_end_flush();
                die();
            }
    ?>