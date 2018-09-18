<?php
	//We need to have a session started on ALL pages
	session_start();
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
        <li class="active"><a href="admin_portal.php">Home</a></li>
		</div>
      </ul>
	  
      
      
    </div>
  </div>
</nav>
<div class="container">    
  <div class="row">
    <div class="col-sm-7 col-sm-offset-2">
      <div class="panel panel-success">
        <div class="panel-heading">Log in</div>
        <div class="panel-body">
		 
				<form action = "includes/login.inc.php" method = "POST">
					<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="email_log_in" type="email" class="form-control" name="email_log_in" placeholder="Email">
				  </div>
				  
				  <div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="password_log_in" type="password" class="form-control" name="password_log_in" placeholder="Password">
				  </div>
          <div class="col-md-4 col-sm-offset-5"> 
            <button type = "submit" name="submit" class="btn btn-success">Log In</button> 
          </div>
				</form> 
			
		
		</div> 
		
      </div>
    </div>
    
  </div>
</div>


  
    
    
  </form>
</footer>



 







</body>








</html>