<?php
function get_string_between($string, $start, $end){ // function to get specific word from a string
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
	//We need to have a session started on ALL pages
    session_start();
    include 'dbh.inc.php';

    $shirt_name = $_POST['shirt_name'];
    $shirtID = $_POST['shirtID'];
    $brand = $_POST['brand'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $cost = $_POST['cost'];
    $image = $_POST['image'];
    $image2 = $_POST['image2'];
    $material = $_POST['material'];
    $cost = $_POST['cost'];
    $small = $_POST['small'];
    $medium = $_POST['medium'];
    $large = $_POST['large'];
    $xlarge = $_POST['xlarge'];
    $xxlarge = $_POST['xxlarge'];

    ob_start();
    var_dump($_POST['neck']); // get dump of size selected
    $resultvar = ob_get_clean(); // get dump in string format of size selected           
    $fullstring = $resultvar;
    $neck = get_string_between($fullstring, '"', '"'); // returns size selected

    ob_start();
    var_dump($_POST['sleeve']); // get dump of size selected
    $resultvar = ob_get_clean(); // get dump in string format of size selected           
    $fullstring = $resultvar;
    $sleeve = get_string_between($fullstring, '"', '"'); // returns size selected

    ob_start();
    var_dump($_POST['gender']); // get dump of size selected
    $resultvar = ob_get_clean(); // get dump in string format of size selected           
    $fullstring = $resultvar;
    $gender = get_string_between($fullstring, '"', '"'); // returns size selected

    

    $sql1 = "INSERT INTO shirt(shirt_id,name_shirt, gender, price, cost, stock,neck_style, sleeve_style, color, brand, shirt_material) VALUES ('$shirtID','$shirt_name', '$gender', '$price', '$cost', '$stock','$neck', '$sleeve', '$color', '$brand', '$material');";
    $sql2 = "INSERT INTO shirt_size(shirt_id, small, medium, large, xlarge, xxlarge) VALUES ('$shirtID','$small', '$medium', '$large', '$xlarge', '$xxlarge')";
    $sql3 = "INSERT INTO shirt_image(shirt_id, imgfront, imgdesc) VALUES ('$shirtID','$image', '$image2')";

    mysqli_query($conn,$sql1);
    mysqli_query($conn,$sql2);
    mysqli_query($conn,$sql3);
    header("Location: ../admin_menu.php");
