<?php

include 'includes/dbh.inc.php';
$sql = "SELECT * FROM shirt WHERE gender ='female' and shirt_status = 'ACTIVE' limit $page1,6"; //select female shirts
$result = mysqli_query($conn,$sql);