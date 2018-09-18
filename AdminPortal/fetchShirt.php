<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");  
 if(isset($_POST["shirt_id"]))  
 {  
      $query = "SELECT * FROM shirt NATURAL JOIN shirt_size WHERE shirt_id = '".$_POST["shirt_id"]."'"; 
      
      $result = mysqli_query($connect, $query); 
      
      $row = mysqli_fetch_array($result);
        
      echo json_encode($row); 

 }  
 ?>