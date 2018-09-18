<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");  
 if(isset($_POST["usr_id"]))  
 {  
      $query = "SELECT * FROM users WHERE usr_id = '".$_POST["usr_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>