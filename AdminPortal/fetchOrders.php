<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");  
 if(isset($_POST["order_id"]))  
 {  
      $query = "SELECT * FROM orders WHERE order_id = '".$_POST["order_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>