<?php


//upload the file
$file = $_FILES['car-photo'];
$file_name = $file['name'];
$file_Tmpname = $file['tmp_name'];
$file_error = $file['error'];
$file_ext = explode(".", $file_name);
$file_ext = strtolower(end($file_ext));
$file_name_new;
$allowed_extensions = array('jpg', 'jpeg');

if(in_array($file_ext, $allowed_extensions)){
    if($file_error === 0 ){ //if there is no error flag on the file object then
        $file_name_new = uniqid('', true).".".$file_ext; //rename the file 
        $file_dest = '../pictures/'.$file_name_new; //set the destination folder for the file
        move_uploaded_file($file_Tmpname, $file_dest); //move the file into the destination folder.
        echo "successfully uploaded file!";
    }
    else{
        echo "There was an error uploading the file.";
    }

}
else{
    echo "Only jpgs are allowed. You entered a " . $file_ext;
}

//insert the file path and everything else into the products table
include('db_settings.php');
$conn = mysqli_connect($server, $user, $password, $database);

$product_make = $_POST['make'];
$product_model = $_POST['model'];
$product_color = $_POST['color'];
$product_price = $_POST['price'];
$product_year = $_POST['year'];
$product_name = $product_year . " " . $product_make . " " . $product_model;
$product_mileage = $_POST['mileage'];
$product_stock = 1;
$product_is_new = ($product_mileage === 0) ? 'TRUE' : 'FALSE';
$sql = "INSERT INTO products (product_name, product_make, product_model, product_price, product_mileage, product_stock, product_is_new, product_year, product_color, product_image_path) 
VALUES    ('" . $product_name ."', '" . $product_make ."', '" . $product_model ."', ". $product_price .", ".$product_mileage.", 1, " . $product_is_new . ", ". $product_year  .", '". $product_color . "', '" . $file_name_new . "')";
echo $sql;

//launch the insert query
$result = mysqli_query($conn, $sql);
if($result){
    echo "successfully inserted new row to product table!";
}
else{
    echo "did NOT successfully add row...";
}
?>

