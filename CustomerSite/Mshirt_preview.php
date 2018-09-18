<!DOCTYPE html>
<html lang="en">
<?php
	//We need to have a session started on ALL pages
	session_start();
?>
<?php
//check to see if url id exists
include 'includes/dbh.inc.php';
if (isset($_GET['id'])){ //get item id
  $id = $_GET['id'];
  $_SESSION["lastShirtId"] = $id;
  //in here the id can be cleanse using  preg_replace fix for next due date
  $sql = "SELECT * FROM shirt WHERE shirt_id = '$id'"; // select matching id shirt
  $result = mysqli_query($conn,$sql);// send query
  $row = mysqli_fetch_assoc($result);
  $sql2 = "SELECT * FROM shirt_size WHERE shirt_id = '$id'"; // select matching id shirt
  $result2 = mysqli_query($conn,$sql2);// send query
  $row2 = mysqli_fetch_assoc($result2);
  $smallSelect = "enabled";
  $mediumSelect = "enabled";
  $largeSelect = "enabled";
  $xlargeSelect = "enabled";
  $xxlargeSelect = "enabled";

  if($row2['small'] <= 0)
  {
    $smallSelect = "disabled";
  }
  if($row2['medium'] <= 0)
  {
    $mediumSelect = "disabled";
  }
  if($row2['large'] <= 0)
  {
    $largeSelect = "disabled";
  }
  if($row2['xlarge'] <= 0)
  {
    $xlargeSelect = "disabled";
  }
  if($row2['xxlarge'] <= 0)
  {
    $xxlargeSelect = "disabled";
  }

  
  $product_name = $row["name_shirt"];
  $price = $row["price"];
  $gender = $row["gender"];
  $brand = $row["brand"];
  $sleeve = $row["sleeve_style"];
  $material = $row["shirt_material"];
  $color = $row["color"];
  $neck = $row["neck_style"];
  $stock = $row["stock"];

  $small = $row2['small'];
  $medium = $row2['medium'];
  $large = $row2['large'];
  $xlarge = $row2['xlarge'];
  $xxlarge = $row2['xxlarge'];

  $sql2 = "SELECT * FROM shirt_image WHERE shirt_id = '$id'"; //get images
  $result2 = mysqli_query($conn,$sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $img = $row2['imgfront'];
  $img2 = $row2['imgdesc'];


  function get_string_between($string, $start, $end){ // function to get specific word from a string
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}


}else{
  echo "No product in the system with that ID.";
  exit();


}

if(isset($_POST['addToCart'])){
  if(isset($_SESSION["shopping_cart"]))
	{
    
		
    ++$_SESSION['dummy'];
    ob_start();
    var_dump($_POST['multiple_select_name']); // get dump of size selected
    $resultvar = ob_get_clean(); // get dump in string format of size selected
    ob_end_clean();

    
    $fullstring = $resultvar;
    $parsed = get_string_between($fullstring, '"', '"'); // returns size selected
    $quantity = $_POST['quantity'];

    if(empty($quantity) OR !preg_match("/^[0-9]*$/", $quantity))
    {
      echo '<script>alert("Enter a valid input")</script>';
      @header("Location: Mshirt_preview.php?id='.$id.'");
     
    }
    else{
      $count = count($_SESSION["shopping_cart"]);
		$item_array = array(
      'dummy_id'   =>  $_SESSION['dummy'],
			'item_id'			=>	$id,
			'item_name'			=>	$product_name,
      'item_price'		=>	$price,
      'item_size'     =>  $parsed,
      'item_quantity' =>  $quantity
    );
      
    $_SESSION["shopping_cart"][$count] = $item_array;
    }
      
		
	}
	else
	{
      ob_start();
      var_dump($_POST['multiple_select_name']); // get dump of size selected
      $resultvar = ob_get_clean(); // get dump in string format of size selected
      ob_end_clean();

    
    $fullstring = $resultvar;
    $parsed = get_string_between($fullstring, '"', '"'); // returns size selected
    $quantity = $_POST['quantity'];
    if(empty($quantity) OR !preg_match("/^[0-9]*$/", $quantity))
    {
      echo '<script>alert("Enter a valid input")</script>';
      @header("Location: Mshirt_preview.php?id='.$id.'");
      
    }else{
      $_SESSION['dummy'] = 1;
      //setcookie('dummy', $dummyID, time() + (86400 * 30), "/"); // 86400 = 1 day
      $item_array = array(
        'dummy_id'   =>  $_SESSION['dummy'],
        'item_id'			=>	$id,
        'item_name'			=>	$product_name,
        'item_price'		=>	$price,
        'item_size'     =>  $parsed,
        'item_quantity' =>  $quantity
      );
      $_SESSION["shopping_cart"][0] = $item_array;
    }
    
	}

}
?>
<head>
  <title>Tee Corner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php
  echo'<script>
  function diffImage(img) 
  {
    if(img.src.match("Back"))
    {
      
      img.src = "shirts/'.$img.'";  
    }
    else
    {
      
      img.src = "shirts/'.$img2.'";
    }
  }
  </script>'; 
  ?> 
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
    //echo("/SELECT * FROM shirt WHERE shirt_id = $/id");
    //echo nl2br("\n/SELECT * FROM shirt_image WHERE shirt_id = $/id");
?>
<?php

    echo'<div class="container">

       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>'.$product_name.'</small>
                </h1>
            </div>
        </div>
        

       
        <div class="row">
  
            <div class="col-md-8">
                <img class="img-responsive" src="shirts/'.$img.'" id="image1" onclick=diffImage(this)>
            </div>

            <div class="col-md-4">
				<h3> $'.$price.' 
						
					</h3>
        <h3>Select Size:</h3>
      <form action = "Mshirt_preview.php?id='.$id.'"  method= "POST">
				<p>
				<select name="multiple_select_name[]" class="selectpicker">
				<option '.$smallSelect.'>small</option> 
					<option '.$mediumSelect.'>medium</option>
					<option '.$largeSelect.'>large</option>
					<option '.$xlargeSelect.'>xlarge</option>
					<option '.$xxlargeSelect.'>xxlarge</option>
				</select>
				</p>
				<p>
          Quantity to add to cart: <input type="text" name="quantity" value="1" class="form-control" />

				  <button type="submit" class="btn btn-default btn-lg" name= "addToCart" ><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
			</form>		
				</p>	
                <h3>Product Information</h3>
                <ul>
                    <li>Brand: '.$brand.'</li>
                    <li>Material:' .$material.'</li>
                    <li>Color:' .$color.'</li>
                    <li>Gender:' .$gender.'</li>
					<li>Neck style: '.$neck.'</li>
					<li>Sleeve style: '.$sleeve.' </li>
                </ul>	
	
			
								
				
            </div>

        </div>
        
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Photos</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="shirts/'.$img.'" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="shirts/'.$img2.'" alt="">
                </a>
            </div>
			
         

        </div>
    

        <hr>

        
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Tee Corner 2018</p>
                </div>
            </div>
           
        </footer>

    </div>'
?>    
    <script src="js/jquery.js"></script>

    
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

