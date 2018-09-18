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
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Tee Corner</h1>      
    <p>Offering styles you'll love</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
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
</nav>
<h3>
    <div class="col-sm-offset-5">
        Create Account
    </div>
    
  </h3>
<div class="container">    
  <div class="row">
    <div class="col-sm-7 col-sm-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">User Info</div>
        <div class="panel-body">
				<form class = "signup-form" action="includes/signup.inc.php" method="POST">
					<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="email" type="text" class="form-control" name="email" placeholder="Email">
				  </div>
				  <div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="first_name" type="text" class="form-control" name="first_name" placeholder="First Name">
				  </div>
				  <div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="last_name" type="text" class="form-control" name="last_name" placeholder="Last Name">
				  </div>
				  <div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="password" type="password" class="form-control" name="password" placeholder="Password">
				  </div>
				  <div class="input-group">
					<span class="input-group-addon">Birthday</span>
					<input id="birthday" type="date" class="form-control" name="birthday" placeholder="birthday">
          </div>
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
				  </div>
          <button type="submit" name="submit" class="btn btn-info">Sign up</button>
          <?php   //echo nl2br("\nINSERT INTO users(first_name, last_name, email, pwd, permission, date_of_birth, age) VALUES ($/first, $/last, $/email, $/hashedPassword, 'CUSTOMER',$/birthday',$/age"); 
          
          
          //echo nl2br("\n\n\nINSERT INTO user_address(usr_id, addreses) VALUES ($/row[0],'$/address')");  
          ?>
				</form> 
				









</html>
