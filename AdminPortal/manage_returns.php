<?php
	//We need to have a session started on ALL pages
	session_start();
?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "teecorner");  
 $query = "SELECT * FROM user_returns ORDER BY order_id DESC";
 //$query2 = "SELECT * FROM shirt_size ORDER BY shirt_id DESC";
 $result = mysqli_query($connect, $query);
 //$result2 = mysqli_query($connect, $query2);  
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
           <div class="container" style="width:1000px;">  
                <h3 align="center">Returns</h3>  
                <br />  
                <div class="table-responsive">  
                     
                     <br />  
                     <div id="employee_table">  
                          <table class="table table-bordered">  
                               <tr>  
                                    <th width="15%">Order ID</th>
                                    <th width="25%">Shirt Id</th>
                                    <th width="25%">Request Date</th>
                                    <th width="25%">Issue</th>
                                    
                                    <th width="25%">Return Status</th>
                                    <th width="25%">Edit</th>                                                                        
                               </tr>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["order_id"]; ?></td>
                                    <td><?php echo $row["shirt_id"]; ?></td>
                                    <td><?php echo $row["request_date"]; ?></td>
                                    <td><?php echo $row["issue"]; ?></td>
                                    <td><?php echo $row["return_status"]; ?></td>
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["order_id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                      
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
                     <h4 class="modal-title">Return Status</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Select Order Status</label>  
                          <select name="status" id="status" class="form-control">  
                               <option value="PENDING">Pending</option>  
                               <option value="APPROVED">Approved</option>
                               <option value="DENIED">Denied</option>  
                          </select> 
                          <input type="hidden" name="order_id" id="order_id"/>
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
           var order_id = $(this).attr("id");  
           $.ajax({  
                url:"fetchReturns.php",  
                method:"POST",  
                data:{order_id:order_id},  
                dataType:"json",  
                success:function(data){  
                     $('#status').val(data.return_status);   
                     $('#insert').val("Update");
                     $('#order_id').val(data.order_id);
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
                     url:"insertReturns.php",  
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
           if(order_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{order_id:order_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>