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
    include 'includes/dbh.inc.php';
    $lenght = $_GET['optradio'];
    $date = date("Y-m-d", strtotime($_GET['date']));
    $itemID = $_GET['item'];
    if($lenght == 'day'){
        $sql = "SELECT* FROM orders NATURAL JOIN cart NATURAL JOIN shirt WHERE order_date = '$date' and shirt_id = '$itemID'";
        $sql2 = "SELECT SUM(quantity) FROM cart NATURAL JOIN orders WHERE order_date = '$date' and shirt_id = '$itemID' Group BY shirt_id";
        $result = mysqli_query($conn,$sql);
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);
        $row = mysqli_fetch_array($result);
        
        
    }elseif($lenght=='week'){
        $sql = "SELECT* FROM orders NATURAL JOIN cart NATURAL JOIN shirt WHERE order_date >= subdate('$date', INTERVAL 1 week) AND order_date <= '$date' and shirt_id = '$itemID'";
        $sql2 = "SELECT SUM(quantity) FROM cart NATURAL JOIN orders WHERE order_date >= subdate('$date', INTERVAL 1 week) AND order_date <= '$date' and shirt_id = '$itemID' Group BY shirt_id";
        
        $result = mysqli_query($conn,$sql);
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);
        $row = mysqli_fetch_array($result);
        
    }elseif($lenght=='month'){
        $sql = "SELECT* FROM orders NATURAL JOIN cart NATURAL JOIN shirt WHERE order_date >= subdate('$date', INTERVAL 1 month) AND order_date <= '$date' and shirt_id = '$itemID'";
        $sql2 = "SELECT SUM(quantity) FROM cart NATURAL JOIN orders WHERE order_date >= subdate('$date', INTERVAL 1 month) AND order_date <= '$date' and shirt_id = '$itemID' Group BY shirt_id";
        $result = mysqli_query($conn,$sql);
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);
        $row = mysqli_fetch_array($result);
        
    }
    ?>
<h1>
        <p class="text-center">Report</p>
        <hr>
        
</h1>
<div class="container">
        <p><h3>Item Sales:</h3></p>            
        <table class="table">
          <thead>
            <tr>
              <th>Order Id</th>
              <th>Order Date</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Cost</th>
              <th>Price</th>
              <th>Revenue By Item</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $total =0;
          $total2=0;
            
                $price =$row['price']*$row2['SUM(quantity)'];
                $cost = $row['cost']*$row2['SUM(quantity)'];
                $price2 =$row['price'];
                $cost2 = $row['cost'];
                $revenueTotal = $price - $cost;
                $revenue = $price2 - $cost2;
                $total += $revenueTotal;
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result))
                {
                  echo'<td>'.$row['order_id'].'</td>
                  <td>'.$row['order_date'].'</td>
                  <td>'.$row['name_shirt'].'</td>
                  <td>'.$row['quantity'].'</td>
                  <td>$'.$row['cost'].'</td>
                  <td>$'.$row['price'].'</td>
                  <td>$'.number_format($revenue,2). '</td>
                </tr>'; 
                }
            
            ?>
          </tbody>
          <h4>
            Total sales: <?php echo($row2['SUM(quantity)']) ?>
            <br>
            Total Revenue: $<?php echo(number_format($total,2))?>
        </h4>
        </table>

    
	
	
	
</div>


    
    
  </form>
</footer>


</body>








</html>