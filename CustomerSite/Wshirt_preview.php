<!DOCTYPE html>
<html lang="en">
<?php
	//We need to have a session started on ALL pages
	session_start();
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
    if(isset($_SESSION['user_id'])) {
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
              <form class="navbar-form navbar-left" role="Search">
              <div class="form-group">
                <input type="text" class="form-control">
                <a href="mens.php"<button class="btn btn-default" button type="submit" name = "submit"><i class="glyphicon glyphicon-search"></i></button></a>
              </div>
              </form>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
            
              <li><a href="edit_account.php"><span class="glyphicon glyphicon-user"></span>'. $_SESSION['user_first_name'] . '</a></li>
              <li> <form action="includes/logout.inc.php" method="POST">
              <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span>log out</button>
            </form>
            
              </li>
              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            
            </ul>
          </div>
        </div>
      </nav>';
     
    }else {
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
              <form class="navbar-form navbar-left" role="Search">
              <div class="form-group">
                <input type="text" class="form-control">
                <a href="mens.php"<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button></a>
              </div>
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

<!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Puma
                    <small>Womens T-Pink Shirt</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">
  
            <div class="col-md-8">
                <img class="img-responsive" src="PumaShirtWoman1.JPEG" alt="">
            </div>

            <div class="col-md-4">
				<h3> $25.00 
						<small> + Shipping $5.00 </small>
					</h3>
				<h3>Select Size:</h3>
				<p>
				<select class="selectpicker">
					<option>Small</option>
					<option>Medium</option>
					<option>Large</option>
					<option>XLarge</option>
					<option>XXLarge</option>
				</select>
				</p>
				<p>
					<button type="button" class="btn btn-default btn-lg">
						<span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
						</button>
				</p>	
                <h3>Product Information</h3>
                <ul>
                    <li>Brand: Puma</li>
                    <li>100 % Cotton</li>
                    <li>Color: Pink </li>
                    <li>Womens Shirt</li>
					<li>Round Neck</li>
					<li>Imported</li>
					<li>Short Sleeves</li>
                </ul>	
	
				<!-- <h3>Select Size:</h3> -->
					<!-- <form> -->
						<!-- <div class="form-group"> -->
							<!-- <select class="form-control" id="sel1"> -->
								<!-- <option>Small</option> -->
								<!-- <option>Medium</option> -->
								<!-- <option>Large</option> -->
								<!-- <option>XLarge</option> -->
								<!-- </select> -->
								<!-- <br> -->
								
				
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Photos</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="PumaShirtWoman1.JPEG" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="PumaShirtWoman1.JPEG" alt="">
                </a>
            </div>
			
            <!-- <div class="col-sm-3 col-xs-6"> -->
                <!-- <a href="#"> -->
                    <!-- <img class="img-responsive portfolio-item" src="PumaShirtWoman1.JPEG"alt=""> -->
                <!-- </a> -->
            <!-- </div> -->

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Tee Corner 2018</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

