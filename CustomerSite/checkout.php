<!DOCTYPE html>
<html lang="en">
<?php
	//We need to have a session started on ALL pages
    session_start();
    
    include_once 'includes/dbh.inc.php'; //connect to database
    $id = $_SESSION['user_id']; // get logged in user id
    $sql = "SELECT addresses FROM user_address WHERE usr_id = '$id'"; // select all adresess of logged in user
    $result = mysqli_query($conn,$sql);//send query
    while( $row = mysqli_fetch_assoc( $result)) //get query in a usable format
    { //fetch query result as array
      $adrresess[] = $row['addresses']; // adrresess array will have every adress that was in row aka the database
    }
       
?>
<head>
  <title>Tee Corner</title>
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
    <h1>Tee Corner</h1>      
    <p>Offering styles you'll love</p>
  </div>
</div>

<?php // navbar for a logged in user
    if(isset($_SESSION['user_id']) and $_SESSION['priviledge'] !== "ADMIN") { // navbar for a logged in user
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
            <li class="active"><a href="main_menu.php">Home</a></li>
            <li><a href="mens.php">Men</a></li>
            <li><a href="womans.php">Woman</a></li>
            <form action = "search.php" method = "POST" class="navbar-form navbar-left">
            <div class="input-group">
            <input id="search" type="text" class="form-control" name="search" placeholder="Search">
            </div>
            <div class="form-group"> 
            <button type="submit" name="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div> 
          </form> 
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
          
            <li><a href="edit_account.php"><span class="glyphicon glyphicon-user"></span>'. $_SESSION['user_first_name'] . '</a></li>
            <li><a href="viewOrders.php"><span class="glyphicon glyphicon-user"></span>View Orders</a></li>
            <li><a href="returns.php"><span class="glyphicon glyphicon-user"></span>Make a Return</a></li>
    <li>  <form action="includes/logout.inc.php" method="POST">
            <button type="submit" name="submit" class="btn btn-basic navbar-btn"><span class="glyphicon glyphicon-user"></span>log out</button>
          </form>
          
            </li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
          
          </ul>
        </div>
      </div>
    </nav>';
   
  }
  else if(isset($_SESSION['user_id']) and $_SESSION['priviledge'] === "ADMIN"){
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
            <li class="active"><a href="main_menu.php">Home</a></li>
            <li><a href="mens.php">Men</a></li>
            <li><a href="womans.php">Woman</a></li>
            <form action = "search.php" method = "POST" class="navbar-form navbar-left">
            <div class="input-group">
            <input id="search" type="text" class="form-control" name="search" placeholder="Search">
            </div>
            <div class="form-group"> 
            <button type="submit" name="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div> 
          </form> 
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
         <li> <form action="../AdminPortal/admin_menu.php" method="POST">
            <li><button type="submit" name="submit" class="btn btn-success navbar-btn"><span class="glyphicon glyphicon-user"></span>Portal</button></li>
              </form> 
          </li>
            <li><a href="edit_account.php"><span class="glyphicon glyphicon-user"></span>'. $_SESSION['user_first_name'] . '</a></li>
            <li><a href="viewOrders.php"><span class="glyphicon glyphicon-user"></span>View Orders</a></li>
            <li><a href="returns.php"><span class="glyphicon glyphicon-user"></span>Make a Return</a></li>
          
    <li>  <form action="includes/logout.inc.php" method="POST">
            <button type="submit" name="submit" class="btn btn-basic navbar-btn"><span class="glyphicon glyphicon-user"></span>log out</button>
          </form>
          
            </li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
          
          </ul>
        </div>
      </div>
    </nav>';

  }
  else { // navbar for guess
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
            <li class="active"><a href="main_menu.php">Home</a></li>
            <li><a href="mens.php">Men</a></li>
            <li><a href="womans.php">Woman</a></li>
          <form action = "search.php" method = "POST" class="navbar-form navbar-left">
            <div class="input-group">
            <input id="search" type="text" class="form-control" name="search" placeholder="Search">
            </div>
            <div class="form-group"> 
            <button type="submit" name="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div> 
          </form> 
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="create_account.php"><span class="glyphicon glyphicon-plus-sign"></span> Create Account</a></li>
            <li><a href="log_in.php"><span class="glyphicon glyphicon-user"></span> Log In</a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
          </ul>
        </div>
      </div>
    </nav>';
  }
?>
<?php
$total =0;

echo '<div class="container">    
  <div class="row">
    <div class="col-sm-7 col-sm-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">Order</div>
        <div class="panel-body">
      <div class="form-group">
      
      
      <form>
    <p><h3>Your Items:</h3></p>            
    <table class="table">
      <thead>
        <tr>
          <th>Item</th>
          <th>Size</th>
          <th>QTY</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>';
      $flag = "enabled";      
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
    $shirtID = $values['item_id'];
    $sqlimage = "SELECT imgfront FROM shirt_image WHERE shirt_id = '$shirtID'";
    $resultimage =  mysqli_query($conn,$sqlimage);
    $rowimage = mysqli_fetch_array($resultimage);
    $sqlSize = "SELECT * FROM shirt_size WHERE shirt_id = '$shirtID'";
    $resultSize = mysqli_query($conn,$sqlSize);
    $row2 = mysqli_fetch_array($resultSize);

    $sqlStock = "SELECT * FROM shirt WHERE shirt_id = '$shirtID'";
    $resultStock = mysqli_query($conn,$sqlStock);
    $row3 = mysqli_fetch_array($resultStock);
    $resta =0;

    $resta = $row3['stock'] - $values['item_quantity'];

    if($row2[$values['item_size']] <= 0 AND $flag == "enabled")
    {
      echo '<script>alert("One or more items in your shopping cart are not available for purchase!")</script>';
      $flag = "disabled";
    }

    if($resta<=0){
      echo '<script>alert("One or more items in your shopping cart are not available for purchase!")</script>';
      $flag = "disabled";
    }

    $total = $total +  $values["item_price"] * $values['item_quantity'];
    
      echo'
        <tr>
          <td>
            <img src="shirts/'.$rowimage['imgfront'].'" class="img-responsive" style="width:15%" alt="Image">
          </td>
          <td>'.$values['item_size'].' </td>
          <td>'.$values['item_quantity'].'</td>
          <td> $'.number_format($values['item_price'] * $values['item_quantity'],2) .'</td>
          <td>
          </td>
        </tr>';
  }
  echo'</tbody>
    </table>';  
    
    
    echo'<h4>
    <p class="text-right">Subtotal: $'.number_format($total, 2).' </p>
    </h4>';
    $shipping =$_SESSION['shipping'] = $total * .10;
    echo'
    <p class="text-right">Shipping: $'.number_format($shipping, 2).' </p>
  </div>
</form>';
$_SESSION['totalOrder'] = $total + $shipping;

//echo nl2br("\n/SELECT cost FROM shirt where shirt_id = '$/shirt_id'");
//echo nl2br("\n/INSERT INTO orders(order_id, usr_id, order_date, ship_date, total_order, revenue, payment_method, order_status, shipping_cost) 
//VALUES ('$/orderID', '$/usrID', '$/orderDate', '$/shipDate', '$/orderTotal','$/revenue','$/payment','PENDING','$/shipCost');");
//echo nl2br("\n/UPDATE shirt SET stock = stock -'$/quantity' WHERE shirt_id = '$/shirt_id'");
//echo nl2br("\nUPDATE shirt_size SET $/size = $/size -'$/quantity' WHERE shirt_id = '$/shirt_id'");
//echo nl2br("\nINSERT INTO cart(shirt_id, order_id, usr_id, quantity, size, shirt_price)
//VALUES ('$/shirt_id', '$/orderID', '$/usrID', '$/quantity','$/size', '$/price')");
    echo'</div>
  </div>

  </div>
</div>';

echo '<h3> 
  <div class="col-sm-offset-5">
      
  </div>
</h3>
<div class="container">    
  <div class="row">
    <div class="col-sm-7 col-sm-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">Checkout!</div>
        <div class="panel-body">
			
    <form action="includes/checkout.inc.php" method="POST">
        Billing Adress:      
         <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="street" type="text" class="form-control" name="street" placeholder="Street">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="state" type="text" class="form-control" name="state" placeholder="State">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="apartmentNo" type="text" class="form-control" name="apartmentNo" placeholder="Apartment No.">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="city" type="text" class="form-control" name="city" placeholder="City">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="zip_code" type="text" class="form-control" name="zip_code" placeholder="Zip Code">
              </div>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input id="country" type="text" class="form-control" name="country" placeholder="Country">
                  </div>
                <div>  
                    Select a ship address:
                    <select class="form-control" name="multiple_select_ship[]" class="selectpicker">';
                    foreach ($adrresess as $address) // show dropdown of every adress in the database
                    {
                        echo '<option>'.$address.'</option>';
                    }
                    echo'</select>
                </div>
                <div>
                    Payment Method:
                    <select name="multiple_select_payment[]" class="selectpicker">
					<option>Visa</option>
					<option>MasterCard</option>
				    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="nameCard" type="text" class="form-control" name="name_card" placeholder="Name on card">
                </div>
                <div class="input-group">
                Expiration Date:
					<input id="expDate" type="date" class="form-control" name="expDate" placeholder="ExpirationDate">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
					<input id="cardNum" type="text" class="form-control" name="cardNum" placeholder="Card number">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
					<input id="pin" type="text" class="form-control" name="pin" placeholder="Card pin">
                </div>






          <button type="submit" '.$flag.' name="submit" class="btn btn-info" >Buy Now!</button> 
	</form> 
			
		
		</div> 
		
      </div>
    </div>
    
  </div>
</div>';

?>	



    

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Address</h4>
      </div>
      <div class="modal-body">
        <p>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="street" type="street" class="form-control" name="street" placeholder="Street">
            </div>
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="state" type="state" class="form-control" name="state" placeholder="State">
            </div>
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="apartmentNo" type="apartmentNo" class="form-control" name="apartmentNo" placeholder="Apartment No.">
            </div>
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="city" type="city" class="form-control" name="city" placeholder="City">
            </div>
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="zip_code" type="zip_code" class="form-control" name="zip_code" placeholder="Zip Code">
            </div>
          </form> 
        </p>
      </div>
      <div class="modal-footer">
        <button id="add" name="add" class="btn btn-info" data-dismiss="modal">Add</button> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	
	
</div>

  
    
    
  </form>
</footer>


</body>



<footer class="container-fluid text-center">  



</html>
