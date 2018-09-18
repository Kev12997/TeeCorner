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
<h1>
        <p class="text-center">Add Item</p>
        <hr>
        
</h1>
<div class="container">    
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-success">
              <div class="panel-heading">Item Info</div>
              <div class="panel-body">
                  
                      <form action ="includes/add_product.inc.php" method = "POST">
                            <h5>
                                            <div class="form-group">
                                                    <label for="shirt">Shirt Name:</label>
                                                    <input type="text" class="form-control" name="shirt_name">
                                                  </div>
											<div class="form-group">
                                                    <label for="shirt">Shirt ID:</label>
                                                    <input type="text" class="form-control" name="shirtID">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="shirt">Brand:</label>
                                                    <input type="text" class="form-control" name="brand">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="color">Color:</label>
                                                    <input type="text" class="form-control" name="color">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="price">Price:</label>
                                                    <input type="price" class="form-control" name="price">
                                                  </div> 
                                                  <div class="form-group">
                                                        <label for="stock">Stock:</label>
                                                        <input type="stock" class="form-control" name="stock">
                                                      </div> 
                                                      <div class="form-group">
                                                        <label for="stock">small:</label>
                                                        <input type="stock" class="form-control" name="small">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="stock">medium:</label>
                                                        <input type="stock" class="form-control" name="medium">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="stock">large:</label>
                                                        <input type="stock" class="form-control" name="large">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="stock">xlarge:</label>
                                                        <input type="stock" class="form-control" name="xlarge">
                                                        <div class="form-group">
                                                        <label for="stock">xxlarge:</label>
                                                        <input type="stock" class="form-control" name="xxlarge">
                                                      </div>
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="cost">Cost:</label>
                                                            <input type="cost" class="form-control" name="cost">
                                                          </div> 
                                                          <div class="form-group">
                                                    <label for="img">Image1:</label>
                                                    <input type="text" class="form-control" name="image"> 
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="img">Image2:</label>
                                                    <input type="text" class="form-control" name="image2"> 
                                                  </div>
                                                  
                                                <div class="form-group">
                                                    <label for="material">Material:</label>
                                                    <input type="material" class="form-control" name="material">
                                                    </div>
                                                <div class="form-group">
                                                    <select class="selectpicker" name = "neck[]">
                                                            <option>vneck</option>
                                                            <option>regular</option>
                                                          </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <select class="selectpicker" name = "sleeve[]">
                                                                    <option>long</option>
                                                                    <option>short</option>
                                                                    <option>no sleeve</option>
                                                                  </select>
                                                            </div>
                                                            <div class="form-group">
                                                                    <select class="selectpicker" name = "gender[]">
                                                                            <option>male</option>
                                                                            <option>female</option>
                                                                          </select>
                                                                    </div>
                                            
                                </h5> 
                                <button id="singlebutton" name="singlebutton" class="btn btn-success">Add Item</button> <?php 
                               // echo nl2br("\n\nINSERT INTO shirt(shirt_id,name_shirt, gender, price, cost, stock,neck_style, sleeve_style, color, brand, shirt_material) VALUES ('$/shirtID','$/shirt_name', '$/gender', '$/price', '$/cost', '$/stock','$/neck', '$/sleeve', '$/color', '$/brand', '$/material');");
                               // echo nl2br("\n\nINSERT INTO shirt_size(shirt_id, small, medium, large, xlarge, xxlarge) VALUES ('$/shirtID','$/small', '$/medium', '$/large', '$/xlarge', '$/xxlarge')");
                              //  echo nl2br("\n\n INSERT INTO shirt_image(shirt_id, imgfront, imgdesc) VALUES ('$/shirtID','$/image', '$/image2')");
                                

?>
                            
                      </form> 
                  
              
              </div> 
              
            </div>
          </div>
          
        </div>
      </div>

    
	
	
	
</div>


    
    
  </form>
</footer>



 







</body>








</html>