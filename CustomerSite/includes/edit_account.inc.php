<?php
session_start(); // A session NEEDS to start on every user-related script

if (isset($_POST['submit']) ){ // check if user pressed the update info button

    include 'dbh.inc.php'; // connect to database
    // get user info on the edit account page
    $email = $_POST['email']; 
    $name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    //check if inputs are empty
    if (empty($email) || empty($name) || empty($last_name)) {
        header("Location: ../edit_account.php?fields=empty"); //changes url to tell the user the error
        exit();
    }
    else{
        //if no field is empty
        $sql1 = "UPDATE users set email = '$email', first_name = '$name', last_name = '$last_name'"; // sql to update user info
        mysqli_query($conn,$sql1);// send the sql to the database
        //log out user
        session_start();    
        session_unset();
        session_destroy();
        session_start(); // start another session since user was logged out
        //log user back in, this is done so the user can see the navbar change to the new name he/she updated in the database.
        $sql = "SELECT * FROM users WHERE email ='$email'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['usr_id'];
        $_SESSION['user_first_name'] = $row['first_name'];
        $_SESSION['user_last_name'] = $row['last_name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_birthday'] = $row['date_of_birth'];

        // all the _sessions log in the user
        
        header("Location: ../edit_account.php?user_info=Updated"); // change the url to show the user the succes in the change
        exit();
    }
} else if (isset($_POST['submit2'])) { //check if user pressed the add adress button
    
    include_once 'dbh.inc.php'; // connect to database
    // get user info
    $street = $_POST['street'];
    $state = $_POST['state'];
    $apartmentNo = $_POST['apartmentNo'];
    $city = $_POST['city'];
    $zip_code = $_POST['zip_code'];
    $address = $street . "\n". $state . "\n". $apartmentNo . "\n". $city . "\n". $zip_code; // concadenate address in one variable 

    if(empty($street)|| empty($state) || empty($apartmentNo) || empty($city) || empty($zip_code))
    {
        header("Location: ../edit_account.php?fields=empty"); // if a field is empty...
        exit();
    }else {
        $id = $_SESSION['user_id']; // logged in user id(_Session is global)
        $sql2 = "INSERT INTO user_address(usr_id, addresses) VALUES ('$id','$address');"; // input usr id and adress into table
        mysqli_query($conn,$sql2);//send query to database
        header("Location: ../edit_account.php?address=added");//succes url
        exit();
    }
}


