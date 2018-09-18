<?php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");

 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $return_status = mysqli_real_escape_string($connect, $_POST["status"]); 
      $order_id = mysqli_real_escape_string($connect, $_POST["order_id"]);
      $shirt_id = mysqli_real_escape_string($connect, $_POST["shirt_id"]);
     

      if($_POST["order_id"] != '')  
      {  
          //echo($shirt_id);
           $query = "UPDATE user_returns SET return_status = '$return_status' WHERE order_id = '$order_id' and shirt_id = '$shirt_id'";
           
           $message = 'Data Updated';  
      }  
      else  
      {  
          
           //$query = "  
           //INSERT INTO users(first_name, last_name, email, permission,date_of_birth, age)  
          // VALUES('$first_name','$last_name', '$email', '$permission','$birthday', '$age');  
           //";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM user_returns ORDER BY order_id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                        <th width="15%">Order ID</th>
                        <th width="25%">Shirt Id</th>
                        <th width="25%">Request Date</th>
                        <th width="25%">Issue</th>
                        
                        <th width="25%">Return Status</th>
                                    <th width="25%">Edit</th> 
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                     <td>'.$row["order_id"].'</td>
                     <td>'.$row["shirt_id"].'</td>
                     <td>'.$row["request_date"].'</td>
                     <td>'.$row["issue"].'</td>
                     <td>'.$row["return_status"].'</td>
                     
                          <td><input type="button" name="edit" value="Edit" id="'.$row["order_id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                           
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>