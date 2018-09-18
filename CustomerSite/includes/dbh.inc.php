<?php

 // Connects to the database, this script will run on every other php script that needs the database

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "teecorner";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);