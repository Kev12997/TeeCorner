<!DOCTYPE html>
<?php
	//We need to have a session started on ALL pages
	session_start();
?>
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
<div class="container">    
  <div class="row">
    <div class="col-sm-2 col-sm-offset-5">
      <div class="panel panel-success">
        <div class="panel-heading">Admin Features</div>
        <div class="panel-body">
			<a 
				<form>
					<div class="btn-group-vertical">
                        <a href="manage_accounts.php" <button id="singlebutton" name="singlebutton" class="btn btn-success">Manage Accounts</button> </a>
                        <a href="manage_products.php" <button id="singlebutton" name="singlebutton" class="btn btn-success">Manage Products</button> </a>
                        <a href="manage_orders.php" <button id="singlebutton" name="singlebutton" class="btn btn-success">Manage Orders</button> </a>
                        <a href="manage_returns.php" <button id="singlebutton" name="singlebutton" class="btn btn-success">Manage Returns</button> </a>
                        <a href="add_product.php" <button id="singlebutton" name="singlebutton" class="btn btn-success">Add new product</button> </a>
                        <a href="sale_report.php"<button id="singlebutton" name="singlebutton" class="btn btn-success">Sales Reports</button> </a>
                        <a href="returns.php"<button id="singlebutton" name="singlebutton" class="btn btn-success">Return Reports</button> </a>
                        <a href="revenue.php"<button id="singlebutton" name="singlebutton" class="btn btn-success">Revenue reports</button></a>
                        <a href="single_item.php"<button id="singlebutton" name="singlebutton" class="btn btn-success">Item Report</button></a>
                      </div>
                      
				</form> 
			</a>
		
		</div> 
		
      </div>
    </div>
    
  </div>
</div>

<div class="col-md-4 col-sm-offset-5"> 
    
	
	
	
</div>
  
    
    
  </form>
</footer>



 







</body>








</html>