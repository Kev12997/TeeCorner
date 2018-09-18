<?php

include 'includes/dbh.inc.php';
$sql = "SELECT * FROM shirt WHERE gender ='male' and shirt_status = 'ACTIVE' limit $page1,6"; //select male shirts
$result = mysqli_query($conn,$sql);

