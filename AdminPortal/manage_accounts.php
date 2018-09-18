<!DOCTYPE html>
<?php
	//We need to have a session started on ALL pages
	session_start();
?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");  
 $query = "SELECT * FROM users ORDER BY usr_id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>   
 <html>  
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
  
      //echo("View every user :    SELECT * FROM users ORDER BY usr_id DESC");
      //echo("<br>");
     // echo("View info from a single user:   /SELECT * FROM users WHERE usr_id = '$/_POST[usr_id]'");
     //echo("<br>");
      //echo("Update a user:    /UPDATE users   
      //SET first_name='$/first_name',   
      //last_name = '$/last_name', 
      //email='$/email',
      //permission = '$/permission',
     // date_of_birth = '$/birthday',              
     // age = '$/age'   
      //WHERE usr_id='$/_POST[usr_id]'");

    }
?>  
           <br /><br />  
           <div class="container" style="width:1000px;">  
                <h3 align="center">Accounts</h3>  
                <br />  
                <div class="table-responsive">  
                     
                     <br />  
                     <div id="employee_table">  
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
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["usr_status"]; ?></td>
                                    <td><?php echo $row["first_name"]; ?></td>
                                    <td><?php echo $row["last_name"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["permission"]; ?></td>
                                    <td><?php echo $row["date_of_birth"]; ?></td>
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["usr_id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                      
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
                     <h4 class="modal-title">User Information</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Enter First Name</label>  
                          <input type="text" name="first_name" id="first_name" class="form-control" />  
                          <br /> 
                          <label>Enter Last Name</label>  
                          <input type="text" name="last_name" id="last_name" class="form-control" />  
                          <br />
                          <label>Enter Email</label>  
                          <input type="text" name="email" id="email" class="form-control" />  
                          <br />
                          <label>Select Permission</label>  
                          <select name="permission" id="permission" class="form-control">  
                               <option value="CUSTOMER">CUSTOMER</option>  
                               <option value="ADMIN">ADMIN</option>  
                          </select>  
                          <br />
                          <label>Status</label>  
                          <select name="status" id="status" class="form-control">  
                               <option value="ACTIVE">ACTIVE</option>  
                               <option value="DISABLE">DISABLE</option>  
                          </select>  
                          <br />
                          
                          <label>Enter birthdate</label>  
                          <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" />  
                          <br />   
                          <label>Enter Age</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          <br />  
                          <input type="hidden" name="usr_id" id="usr_id" />  
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
           var usr_id = $(this).attr("id");  
           $.ajax({  
                url:"fetchUser.php",  
                method:"POST",  
                data:{usr_id:usr_id},  
                dataType:"json",  
                success:function(data){  
                     $('#first_name').val(data.first_name);
                     $('#last_name').val(data.last_name);  
                     $('#email').val(data.email);  
                     $('#permission').val(data.permission);
                     $('#status').val(data.usr_status);
                     $('#password').val("hidden");
                     $('#date_of_birth').val(data.date_of_birth);    
                     $('#age').val(data.age);  
                     $('#usr_id').val(data.usr_id);  
                     $('#insert').val("Update");  
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
                     url:"insertUser.php",  
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
           var usr_id = $(this).attr("id");  
           if(usr_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{usr_id:usr_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
 