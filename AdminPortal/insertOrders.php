<?php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $order_status = mysqli_real_escape_string($connect, $_POST["status"]);
      $date = date("Y/m/d");  
      if($_POST["order_id"] != '')  
      {    
          if($order_status === 'SHIPPED'){
            $query = "  
            UPDATE orders   
            SET order_status='$order_status', ship_date = '$date'      
            WHERE order_id='".$_POST["order_id"]."'";  
            $message = 'Data Updated';

          }else{
            
           $query = "  
           UPDATE orders   
           SET order_status='$order_status'       
           WHERE order_id='".$_POST["order_id"]."'";  
           $message = 'Data Updated';
          }  
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
           $select_query = "SELECT * FROM orders ORDER BY order_date DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                                    <th width="15%">Order ID</th>
                                    <th width="25%">User Id</th>
                                    <th width="25%">Order Total</th>
                                    <th width="25%">Order Date</th>
                                    <th width="15%">Payment Method</th>
                                    <th width="25%">Order Status</th>
                                    <th width="25%">Edit</th> 
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                     <td>'.$row["order_id"].'</td>
                     <td>'.$row["usr_id"].'</td>
                     <td>'.$row["total_order"].'</td>
                     <td>'.$row["order_date"].'</td>
                     <td>'.$row["payment_method"].'</td>
                     <td>'.$row["order_status"].'</td> 
                          <td><input type="button" name="edit" value="Edit" id="'.$row["order_id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                           
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>