<!DOCTYPE html>
<?php
	//We need to have a session started on ALL pages
	session_start();
?>
<html lang="en">
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
    .carousel-inner {
    overflow:hidden;
    width:540px;
    height:600px;
    position:relative;
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
    include_once 'includes/dbh.inc.php';
    $sql = "SELECT * FROM shirt Where gender = 'male' and shirt_status = 'ACTIVE' ORDER BY shirt_id DESC LIMIT 3";
    $result = mysqli_query($conn,$sql);
    

    
    
   

    while($row = mysqli_fetch_assoc( $result)) //get query in a usable format
    { //fetch query result as array
      $idMale[] = $row['shirt_id']; // get alll shirts id 
      $shirt_id = $row['shirt_id'];
      $sql2 = "SELECT imgfront FROM shirt_image WHERE shirt_id = '$shirt_id'";
      $result2 = mysqli_query($conn,$sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $idMaleImage[] = $row2['imgfront']; 
    }


    
    $sql = "SELECT * FROM shirt Where gender = 'female' and shirt_status = 'ACTIVE' ORDER BY shirt_id DESC LIMIT 3";
    $result = mysqli_query($conn,$sql);
    

    
    
   

    while($row = mysqli_fetch_assoc($result)) //get query in a usable format
    { //fetch query result as array
      $idFemale[] = $row['shirt_id']; // get alll shirts id 
      $shirt_id = $row['shirt_id'];
      $sql2 = "SELECT imgfront FROM shirt_image WHERE shirt_id = '$shirt_id'";
      $result2 = mysqli_query($conn,$sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $idFemaleImage[] = $row2['imgfront']; 
    }

    




echo'<div class="container">    
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Check out these Mens Shirts! </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
				<div class="item active">
				  <a href="Mshirt_preview.php?id='.$idMale[0].'"><img src="shirts/'.$idMaleImage[0].'" alt="Shirt1">
				</div>

				<div class="item">
				  <a href="Mshirt_preview.php?id='.$idMale[1].'"><img src="shirts/'.$idMaleImage[1].'" alt="Shirt2">
				</div>

				<div class="item">
				  <a href="Mshirt_preview.php?id='.$idMale[2].'"><img src="shirts/'.$idMaleImage[2].'" alt="Shirt3">
				</div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div> 
		
        <div class="panel-footer">Click the image to view the shirt page!</div>
      </div>
    </div>
    <div class="col-sm-6"> 
      <div class="panel panel-danger">
        <div class="panel-heading">Check out these Womens Shirts!</div>
        <div id="myCarouse2" class="carousel slide" data-ride="carouse2">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#myCarouse2" data-slide-to="0" class="active"></li>
				<li data-target="#myCarouse2" data-slide-to="1"></li>
				<li data-target="#myCarouse2" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
				<div class="item active">
				  <a href="Mshirt_preview.php?id='.$idFemale[0].'"><img src="shirts/'.$idFemaleImage[0].'" alt="Shirt1">
				</div>

				<div class="item">
				  <a href="Mshirt_preview.php?id='.$idFemale[1].'"><img src="shirts/'.$idFemaleImage[1].'" alt="Shirt2">
				</div>

				<div class="item">
				  <a href="Mshirt_preview.php?id='.$idFemale[2].'"><img src="shirts/'.$idFemaleImage[2].'" alt="Shirt3">
				</div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarouse2" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarouse2" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div> 
        <div class="panel-footer">Click the image to view the shirt page!</div>
      </div>
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">  
  
    
    
  </form>
</footer>



</body>
</html>';
?>