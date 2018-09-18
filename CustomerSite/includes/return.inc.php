<?php
 // session start not necessary since no user is logged in to create an account
if (isset($_POST['submit']) ){
   
    include_once 'dbh.inc.php'; // conect to database

    //get user info
    $orderId = $_POST['orderId'];
    $shirtId = $_POST['shirtId'];
    $issue = $_POST['issue'];

    if (empty($orderId) || empty($shirtId) || empty($issue)){
        header("Location: ../returns.php?info=empty");
        exit();
    }
    $usr = $_SESSION['user_id'];
    $sql = "SELECT order_id from orders WHERE order_id = '$orderId'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    $sql2 = "SELECT shirt_id from shirt WHERE shirt_id = '$shirtId'";
    $result2 = mysqli_query($conn,$sql2);
    $resultCheck2 = mysqli_num_rows($result2);
    
    if($resultCheck <= 0){ // order not in database
        
        header("Location: ../returns.php?orderid=invalid");
        //echo '<script>alert("test")</script>';
        exit();

    }elseif($resultCheck2 <= 0 ){
        header("Location: ../returns.php?shirtid=invalid");
        exit();
    }
    else
    {

        $requestDay = date("Y/m/d");

        $sql = "INSERT INTO user_returns(order_id, shirt_id, return_status, request_date, issue) VALUE ('$orderId', '$shirtId', 'PENDING','$requestDay', '$issue');";
        mysqli_query($conn,$sql);
        header("Location: ../main_menu.php?Return=Succes");
    }
}