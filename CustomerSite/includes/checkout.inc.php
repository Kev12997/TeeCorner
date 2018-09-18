<?php
session_start();
if(isset($_SESSION['user_id'])){
    function get_string_between($string, $start, $end){ // function to get specific word from a string
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
    if (isset($_POST['submit']) ){
    
        include_once 'dbh.inc.php'; // conect to database

        //get billing
        $street = $_POST['street'];
        $state = $_POST['state'];
        $apartmentNo = $_POST['apartmentNo'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];
        $country = $_POST['country'];
        $billAddress = $street . "\n". $state . "\n". $apartmentNo . "\n". $city . "\n". $zip_code . "\n". $country;


        ob_start();
        var_dump($_POST['multiple_select_ship']); // get dump of size selected
        $resultvar = ob_get_clean(); // get dump in string format of size selected
        

        
        $fullstring = $resultvar;
        $ship = get_string_between($fullstring, '"', '"'); // returns size selected

        ob_start();
        var_dump($_POST['multiple_select_payment']); // get dump of size selected
        $resultvar = ob_get_clean(); // get dump in string format of size selected


        
        $fullstring = $resultvar;
        $payment = get_string_between($fullstring, '"', '"'); // returns size selected

        $nameCard = $_POST['name_card'];
        $expDate = $_POST['expDate'];
        $expDate = strtotime($expDate);
        $cardNum = $_POST['cardNum'];

        $pin = $_POST['pin'];

        $orderID = rand(111111111,999999999);
        $usrID = $_SESSION['user_id'];
        date_default_timezone_set("America/Puerto_Rico");
        $orderDate = date('Y-m-d H:i:s', time());
        $shipDate = NULL;
        
        $orderTotal=number_format($_SESSION['totalOrder'], 2);
        $revenue =0;
        $shipCost=number_format($_SESSION['shipping'], 2);
        

        if (empty($street) || empty($state) || empty($apartmentNo) || empty($city) || empty($zip_code) || empty($billAddress) || empty($zip_code) || empty($nameCard) || empty($nameCard) || empty($pin) || empty($expDate) || empty($cardNum)){
            header("Location: ../checkout.php?info=empty");
            exit();
        }

        if (empty($ship))
        {
            header("Location: ../checkout.php?address=empty");
            exit();
        }
        
             
        if ($expDate < strtotime('today'))
        {
            header("Location: ../checkout.php?card=expired");
            exit();
        }
        
        if(!preg_match("/^[0-9]*$/", $cardNum) || !preg_match("/^[0-9]*$/", $pin) ){
            header("Location: ../checkout.php?nums=invalid");
            exit();
        }
        if($pin<=99 OR $pin>999){
            header("Location: ../checkout.php?pin=invalid");
            exit();
        }
        if($cardNum>9999999999999999 OR $cardNum<1111111111111111){
            header("Location: ../checkout.php?cardnum=invalid");
            exit();
        }


        foreach($_SESSION["shopping_cart"] as $keys => $values)
    {

        $shirt_id = $values['item_id'];
        $quantity = $values['item_quantity'];
        $size = $values['item_size'];
        $sql = "SELECT cost FROM shirt where shirt_id = '$shirt_id'"; // view the cost of the item 
        $result = mysqli_query($conn,$sql);// send query
        $row = mysqli_fetch_assoc($result);
        
        $cost = $row['cost'];
        
        $sql2 = "SELECT stock FROM shirt where shirt_id = '$shirt_id'";
        $result2 = mysqli_query($conn,$sql);// send query
        $row2 = mysqli_fetch_assoc($result2);
       // $stock = $row2['stock'];
        

        $sql3 = "UPDATE shirt SET stock = stock -'$quantity' WHERE shirt_id = '$shirt_id'";
        mysqli_query($conn,$sql3);
        $sql4 = "UPDATE shirt_size SET $size = $size -'$quantity' WHERE shirt_id = '$shirt_id'";
        mysqli_query($conn,$sql4);
        $revenue += ($values['item_price'] * $values['item_quantity']) - ($cost * $values['item_quantity']);
    }
        
        $sql = "INSERT INTO orders(order_id, usr_id, order_date, ship_date, total_order, revenue, payment_method, order_status, shipping_cost, ship_address)
        VALUES ('$orderID', '$usrID', '$orderDate', '$shipDate', '$orderTotal','$revenue','$payment','PENDING','$shipCost', '$ship');";
        mysqli_query($conn,$sql);// send query


        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            $shirt_id = $values['item_id'];
            $quantity = $values['item_quantity'];
            $size = $values['item_size'];
            $price = $values['item_price'];
            $sql2 = "INSERT INTO cart(shirt_id, order_id, usr_id, quantity, size, shirt_price)
            VALUES ('$shirt_id', '$orderID', '$usrID', '$quantity','$size', '$price');";
            mysqli_query($conn,$sql2);// send query               
        }        
        


        
        $_SESSION['order_id'] = $orderID;
        $_SESSION['order_total'] = $orderTotal;

        header("Location: ../receipt.php");

        
    }
}else{
    echo("You need to be logged in to make a purchase.");
}