<?php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $shirt_name = mysqli_real_escape_string($connect, $_POST["name_shirt"]);
      $stock = mysqli_real_escape_string($connect, $_POST["stock"]);    
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
      $neck_style = mysqli_real_escape_string($connect, $_POST["neck_style"]);
      $sleeve_style = mysqli_real_escape_string($connect, $_POST["sleeve_style"]);
      $color = mysqli_real_escape_string($connect, $_POST["color"]);
      $brand = mysqli_real_escape_string($connect, $_POST["brand"]);
      $shirt_material = mysqli_real_escape_string($connect, $_POST["shirt_material"]);
      $small = mysqli_real_escape_string($connect, $_POST["small"]);
      $medium = mysqli_real_escape_string($connect, $_POST["medium"]);   
      $large = mysqli_real_escape_string($connect, $_POST["large"]);
      $xlarge = mysqli_real_escape_string($connect, $_POST["xlarge"]); 
      $xxlarge = mysqli_real_escape_string($connect, $_POST["xxlarge"]); 
      $price = mysqli_real_escape_string($connect, $_POST["price"]); 
      $status = mysqli_real_escape_string($connect, $_POST["status"]); 
      $shirt_id =  mysqli_real_escape_string($connect, $_POST["shirt_id"]); 
      if($_POST["shirt_id"] != '')  
      {  
           $query = "  
           UPDATE shirt   
           SET name_shirt='$shirt_name',   
           stock = '$stock', 
           gender='$gender',
           price = '$price',
           neck_style = '$neck_style',
           sleeve_style = '$sleeve_style',
           color = '$color',
           brand = '$brand',
           shirt_material = '$shirt_material',
           stock = '$stock',
           shirt_status = '$status'                          
           WHERE shirt_id='".$_POST["shirt_id"]."'";
           $query2 = "  
           UPDATE shirt_size   
           SET small='$small',   
           medium = '$medium', 
           large ='$large',
           xlarge = '$xlarge',
           xxlarge = '$xxlarge'                          
           WHERE shirt_id='".$_POST["shirt_id"]."'"; 
           $message = 'Data Updated';  
      }  
      else  
      {  
          echo($shirt_id);
           //$query = "  
           //INSERT INTO shirt(name, last_name, email, permission,date_of_birth, age)  
           //VALUES('$first_name','$last_name', '$email', '$permission','$birthday', '$age');  
          // ";  
         //  $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {     
           mysqli_query($connect, $query2);
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM shirt ORDER BY shirt_id DESC";
           $select_query2 = "SELECT * FROM shirt_size ORDER BY shirt_id DESC";   
           $result = mysqli_query($connect, $select_query);
           $result2 = mysqli_query($connect, $select_query2);   
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                     <th width="15%">shirt ID</th>
                     <th width="15%">Status</th>
                     <th width="25%">shirt Name</th>
                     
                     <th width="25%">gender</th>
                     <th width="25%">Stock</th>
                     <th width="25%">Neck Style</th>
                     <th width="25%">Sleeve Style</th>
                     <th width="25%">Color</th>
                     <th width="25%">Brand</th>
                     <th width="25%">Material</th>
                     <th width="15%">S</th>
                     <th width="25%">M</th>
                     <th width="15%">L</th>
                     <th width="25%">XL</th> 
                     <th width="15%">XXL</th>
                     <th width="25%">Price</th>    
                     <th width="25%">Edit</th> 
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $row2 = mysqli_fetch_array($result2);
                $output .= '  
                     <tr>  
                           <td>'.$row["shirt_id"].'</td>
                           <td>'.$row["shirt_status"].'</td>
                                    <td>'.$row["name_shirt"].'</td>
                                    
                                    <td>'.$row["gender"].'</td>
                                    <td>'.$row["stock"].'</td>
                                    <td>'.$row["neck_style"].'</td>
                                    <td>'.$row["sleeve_style"].'</td>
                                    <td>'.$row["color"].'</td>
                                    <td>'.$row["brand"].'</td>
                                    <td>'.$row["shirt_material"].'</td>
                                    <td>'.$row2["small"].'</td>
                                    <td>'.$row2["medium"].'</td>
                                    <td>'.$row2["large"].'</td>
                                    <td>'.$row2["xlarge"].'</td>
                                    <td>'.$row2["xxlarge"].'</td>
                                    <td>'.$row["price"].'</td>
                          <td><input type="button" name="edit" value="Edit" id="'.$row["shirt_id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                           
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>