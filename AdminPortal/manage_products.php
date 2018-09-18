<?php
	//We need to have a session started on ALL pages
	session_start();
?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");  
 $query = "SELECT * FROM shirt ORDER BY shirt_id DESC";
 $query2 = "SELECT * FROM shirt_size ORDER BY shirt_id DESC";
 $result = mysqli_query($connect, $query);
 $result2 = mysqli_query($connect, $query2);  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tee Corner Admins</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Tee Corner Admin Portal</h1>      
    <p>Welcome Admin!</p>
  </div>
</div>
<?php
    if(isset($_SESSION['user_id'])) { // navbar for a logged in user
      echo '<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="admin_menu.php">Home</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
          <li>  <form action="../CustomerSite/main_menu.php" method="POST">
    <button type="submit" name="submit" class="btn btn-info navbar-btn"><span class="glyphicon glyphicon-user"></span>Store</button>
          </form>
          
            </li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>'. $_SESSION['user_first_name'] . '</a></li>
            <li><a href="admin_create.php"><span class="glyphicon glyphicon-plus-sign"></span> Create Account</a></li>
            
    <li>  <form action="includes/logout.inc.php" method="POST">
    <button type="submit" name="submit" class="btn btn-basic navbar-btn"><span class="glyphicon glyphicon-user"></span>log out</button>
          </form>
          
            </li>
            
          
          </ul>
        </div>
      </div>
    </nav>';
  }
?>
  
  <br /><br />  
           <div class="container" style="width:1500px;">  
                <h3 align="center">Products</h3>  
                <br />  
                <div class="table-responsive">  
                     
                     <br />  
                     <div id="employee_table">  
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
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                                   $row2 = mysqli_fetch_array($result2);
                               ?>  
                               <tr>  
                                    <td><?php echo $row["shirt_id"]; ?></td>
                                    <td><?php echo $row["shirt_status"]; ?></td>
                                    <td><?php echo $row["name_shirt"]; ?></td>
                                    <td><?php echo $row["gender"]; ?></td>
                                    <td><?php echo $row["stock"]; ?></td>
                                    <td><?php echo $row["neck_style"]; ?></td>
                                    <td><?php echo $row["sleeve_style"]; ?></td>
                                    <td><?php echo $row["color"]; ?></td>
                                    <td><?php echo $row["brand"]; ?></td>
                                    <td><?php echo $row["shirt_material"]; ?></td>
                                    <td><?php echo $row2["small"]; ?></td>
                                    <td><?php echo $row2["medium"]; ?></td>
                                    <td><?php echo $row2["large"]; ?></td>
                                    <td><?php echo $row2["xlarge"]; ?></td>
                                    <td><?php echo $row2["xxlarge"]; ?></td>
                                    <td><?php echo '$'.$row["price"]; ?></td>
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["shirt_id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                      
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Shirt Information</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Enter Shirt Name</label>  
                          <input type="text" name="name_shirt" id="name_shirt" class="form-control" />  
                          <br /> 
                          <label>Stock</label>  
                          <input type="text" name="stock" id="stock" class="form-control" />  
                          <br />
                          <label>Neck_style</label>  
                          <input type="text" name="neck_style" id="neck_style" class="form-control" />  
                          <br />
                          <label>Sleeve_style</label>  
                          <input type="text" name="sleeve_style" id="sleeve_style" class="form-control" />  
                          <br />
                          <label>Color</label>  
                          <input type="text" name="color" id="color" class="form-control" />  
                          <br />
                          <label>Brand</label>  
                          <input type="text" name="brand" id="brand" class="form-control" />  
                          <br />
                          <label>Material</label>  
                          <input type="text" name="shirt_material" id="shirt_material" class="form-control" />  
                          <br />
                          <label>Select Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="male">male</option>  
                               <option value="female">female</option>  
                          </select>  
                          <br />
                          <label>S</label>  
                          <input type="text" name="small" id="small" class="form-control" />  
                          <br />
                          <label>M</label>  
                          <input type="text" name="medium" id="medium" class="form-control" />  
                          <br />
                          <label>L</label>  
                          <input type="text" name="large" id="large" class="form-control" />  
                          <br />
                          <label>XL</label>  
                          <input type="text" name="xlarge" id="xlarge" class="form-control" />  
                          <br />
                          <label>XXL</label>  
                          <input type="text" name="xxlarge" id="xxlarge" class="form-control" />  
                          <br />                        
                          <label>Price</label>  
                          <input type="text" name="price" id="price" class="form-control" />  
                          <br/>
                          <label>Item Status</label> 
                          <select name="status" id="status" class="form-control">  
                               <option value="ACTIVE">ACTIVE</option>  
                               <option value="DISABLE">DISABLE</option>  
                          </select>
                          <br/>
                          <input type="hidden" name="shirt_id" id="shirt_id"/>  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var shirt_id = $(this).attr("id");  
           $.ajax({  
                url:"fetchShirt.php",  
                method:"POST",  
                data:{shirt_id:shirt_id},  
                dataType:"json",  
                success:function(data){  
                     $('#name_shirt').val(data.name_shirt);
                     $('#stock').val(data.stock);
                     $('#neck_style').val(data.neck_style);
                     $('#sleeve_style').val(data.sleeve_style);
                     $('#color').val(data.color);
                     $('#brand').val(data.brand);
                     $('#shirt_material').val(data.shirt_material);  
                     $('#gender').val(data.gender);  
                     $('#small').val(data.small);
                     $('#medium').val(data.medium);
                     $('#large').val(data.large);    
                     $('#xlarge').val(data.xlarge);  
                     $('#xxlarge').val(data.xxlarge);
                     $('#price').val(data.price);
                     $('#status').val(data.shirt_status);
                     $('#insert').val("Update");
                     $('#shirt_id').val(data.shirt_id);  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insertShirt.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var shirt = $(this).attr("id");  
           if(shirt_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{shirt_id:shirt_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>