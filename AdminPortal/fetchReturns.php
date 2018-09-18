<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");
 $order_id = mysqli_real_escape_string($connect, $_POST["order_id"]);  
 if(isset($_POST["order_id"]))  
 {  
      $query = "SELECT * FROM user_returns WHERE order_id = '".$_POST["order_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>