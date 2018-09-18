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
    .radio{
      top: 50px;
    }

    .btn1{
      margin:50px 4px;
    }

    .container1{
      margin: -300px 400px;
    }
    .thumbnail{
    height:550px;
    width:100%;
}
img{
    height:400px;
    width:400px;
}
.pagination{
    height:550px;
    width:100%;
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
   $option = "normal";

?>
<?php
$option = "normal";
echo '<form action ="includes/sortByWoman.inc.php" method="GET">
<div class= "col-md-offset-1"> 
   <div class="radio">
    <label><input type="radio" name="option" value="lowest">lowest prices first</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="option" value="highest">highest prices first</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="option" value="noSleeves">no sleeves</label>
  </div> 
  <div class="radio">
    <label><input type="radio" name="option" value="vNeck">V-neck</label>
  </div> 
  <div class="radio">
    <label><input type="radio" name="option" value="normalNeck">normal neck</label>
  </div> 
  <div class="radio">
    <label><input type="radio" name="option" value="long">long sleeves</label>
  </div> 
  <div class="radio">
    <label><input type="radio" name="option" value="normalSleeves">short sleeves</label>
  </div>
  <button type="submit" name="submit" class="btn btn1 btn-info">Go!</button>
  </form>
</div>'
?>
<div class="container container1">
<h2>Woman's Shirts</h2>



<?php
@$page = $_GET["page"];
if($page == "" || $page == "1"){
  $page1=0;
}
else{
  $page1 = ($page*6)-6;
}

  include 'includes/sortWoman.inc.php';

  $result3 = mysqli_query($conn,$sql);
  //echo("/SELECT * FROM shirt WHERE gender ='female'");
  //echo nl2br("\n/SELECT imgfront FROM shirt_image WHERE shirt_id = '$/shirtID'");

  while($row3 = mysqli_fetch_array( $result3)) //get query in a usable format
{ //fetch query result as array
  $id[] = $row3['shirt_id']; // get alll shirts id from query in the previous script
}
  $count = 0;
  while($row = mysqli_fetch_array($result))
  {
    if($count == 0)
    {
    echo '<div class="row">
    <div class="col-md-4">
      <div class="thumbnail">';
      $shirtID = $id[$count];
      $sqlTest = "SELECT imgfront FROM shirt_image WHERE shirt_id = '$shirtID'";
      $resultTest =  mysqli_query($conn,$sqlTest);
      $rowTest = mysqli_fetch_array($resultTest);
         echo'<a href="Mshirt_preview.php?id='.$id[$count].'"><img src="shirts/'.$rowTest['imgfront'].'" alt="Shirt" style="width:100%"></a>
          <div class="caption">
            <p class= "text-center">'.$row['name_shirt'].'</p><p class="text-center">$'.$row['price'].'</p>
          </div>
      </div>
    </div>';
    $count++;
    }
     else {
      echo '<div class="col-md-4">
      <div class="thumbnail">';
      $shirtID = $id[$count];
      $sqlTest = "SELECT imgfront FROM shirt_image WHERE shirt_id = '$shirtID'";
      $resultTest =  mysqli_query($conn,$sqlTest);
      $rowTest = mysqli_fetch_array($resultTest);
        echo'<a href="Mshirt_preview.php?id='.$id[$count].'"><img src="shirts/'.$rowTest['imgfront'].'" alt="Shirt1" style="width:100%"></a>
          <div class="caption">
            <p class= "text-center">'.$row['name_shirt']  .'</p><p class="text-center">$'.$row['price'].'</p>
          </div>
      </div>
    </div>';
    $count++;
    }
    
  }
  $sqlPage = "SELECT * FROM shirt WHERE gender ='female' and shirt_status = 'ACTIVE'"; //select male shirts
  $count = mysqli_num_rows($result);
  $a = $count/3;
  $a = ceil($a);
echo "<br>";
echo '<ul class="pagination pagination-lg">';
  for($b=1;$b<=$a;$b++)
  {
    ?><li><a href="womans.php?page=<?php echo($b); ?>" style = "text-decoration:none"><?php echo $b." ";?></a><li> <?php
  }
  echo'</ul>';

?>






</body>
</html>