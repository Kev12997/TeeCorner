<?php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
      $last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);    
      $email = mysqli_real_escape_string($connect, $_POST["email"]);  
      $permission = mysqli_real_escape_string($connect, $_POST["permission"]);
      $birthday = mysqli_real_escape_string($connect, $_POST["date_of_birth"]);   
      $age = mysqli_real_escape_string($connect, $_POST["age"]);  
      $status = mysqli_real_escape_string($connect, $_POST["status"]);
      if($_POST["usr_id"] != '')  
      {  
           $query = "  
           UPDATE users   
           SET first_name='$first_name',   
           last_name = '$last_name', 
           email='$email',
           permission = '$permission',
           date_of_birth = '$birthday',
           usr_status = '$status',              
           age = '$age'   
           WHERE usr_id='".$_POST["usr_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
          echo("TEST");
           $query = "  
           INSERT INTO users(first_name, last_name, email, permission,date_of_birth, age)  
           VALUES('$first_name','$last_name', '$email', '$permission','$birthday', '$age');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM users ORDER BY usr_id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                     <th width="15%">Status</th>
                     <th width="15%">First Name</th>
                     <th width="25%">Last Name</th>
                     <th width="25%">Email</th>
                     <th width="15%">Permission</th>
                     <th width="25%">Birthdate</th>  
                     <th width="25%">Edit</th> 
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                     <td>' . $row["usr_status"] . '</td>
                          <td>' . $row["first_name"] . '</td>                           
                          <td>'.$row["last_name"].'</td>
                          <td>'.$row["email"].'</td>
                          <td>'. $row["permission"].'</td>
                          <td>'. $row["date_of_birth"].'</td> 
                          <td><input type="button" name="edit" value="Edit" id="'.$row["usr_id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                           
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>