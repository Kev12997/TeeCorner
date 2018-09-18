<!DOCTYPE html>
<html lang="en">
<?php
	//We need to have a session started on ALL pages
    session_start();
    include 'includes/dbh.inc.php';
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

<?php
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
    $total =0;
    $orderId = $_SESSION['order_id'];
    $orderTotal = $_SESSION['order_total'];
?>



<?php
 echo'<div class="container">
 <form>
     <p><h3>Your Receipt:</h3></p>            
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
   foreach($_SESSION["shopping_cart"] as $keys => $values)
   {
     $shirtID = $values['item_id'];
     $sqlimage = "SELECT imgfront FROM shirt_image WHERE shirt_id = '$shirtID'";
     $resultimage =  mysqli_query($conn,$sqlimage);
     $rowimage = mysqli_fetch_array($resultimage);
     $total = $total +  $values["item_price"] * $values['item_quantity'];
     
       echo'
         <tr>
           <td>
             <img src="shirts/'.$rowimage['imgfront'].'" class="img-responsive" style="width:15%" alt="Image">
           </td>
           <td>'.$values['item_size'].' </td>
           <td>'.$values['item_quantity'].'</td>
           <td> $'.number_format($values['item_price'] * $values['item_quantity'],2) .'</td>           
         </tr>';
   }
   echo'</tbody>
     </table>
 </form>
 Your order ID:'.$orderId.' Your order total:$'.$orderTotal;


 unset($_SESSION['order_id']);
 unset($_SESSION['order_total']);
 unset($_SESSION["shopping_cart"]);


?>