<?php

session_start(); // A session NEEDS to start on every user-related script

if (isset($_POST['submit']) ){ // check if user pressed the update info button

    include 'dbh.inc.php'; // connect to database
    // get user info on the edit account page
    $email = $_POST['email']; 
    $name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date = $_POST['date'];
    $permission = $_POST['permission'];
    //check if inputs are empty
    if (empty($email) || empty($name) || empty($last_name)) {
        header("Location: ../manage_accounts.php?fields=empty"); //changes url to tell the user the error
        exit();
    }
    else{
        //if no field is empty
        $sql = "UPDATE users set email = '$email', first_name = '$name', last_name = '$last_name', date_of_birth = '$date', permission = '$permission'";
        mysqli_query($conn,$sql);
        header("Location: ../manage_accounts.php?user_info=Updated"); // change the url to show the user the succes in the change
        exit();
    }
}



