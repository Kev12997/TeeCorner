<?php

session_start(); // A session NEEDS to start on every user-related script


if(isset($_POST['submit'])){

    include 'dbh.inc.php'; // connect to database

    // get user info
    $email = $_POST['email_log_in']; 
    $password = $_POST['password_log_in'];

    //check if inputs are empty
    if (empty($email) || empty($password)) {
        header("Location: ../log_in.php?login=empty");
        exit();

    } else {
        $sql = "SELECT * FROM users WHERE email ='$email' and usr_status = 'ACTIVE'"; // select email in the database
        $result = mysqli_query($conn,$sql);// send query
        $resultCheck = mysqli_num_rows($result);// see if query returned a result (if email was indeed in database)
        if ($resultCheck < 1  ) {
            header("Location: ../log_in.php?login=error"); // show result in url if email was not in database
            exit();
        } else {
            if($row = mysqli_fetch_assoc($result)) { // if email was in database (row will have result of query)
               
               $hashedpwdCheck = password_verify($password, $row['pwd']);//de-hashing the password 
               if($hashedpwdCheck == false){ // if password was incorrect
                header("Location: ../log_in.php?login=error");
                exit();
               } elseif($hashedpwdCheck == true) { //if password was true
                // log in the user here
                $_SESSION['user_id'] = $row['usr_id'];
                $_SESSION['user_first_name'] = $row['first_name'];
                $_SESSION['user_last_name'] = $row['last_name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_birthday'] = $row['date_of_birth'];
                $_SESSION['priviledge'] = $row['permission'];
                header("Location: ../log_in.php?login=succes"); // url succes
                header("Location: ../main_menu.php?login=Succes");
                exit();
               }
            }
        }

    }


} else {
    header("Location: ../log_in.php?login=error"); // some other error just in case
    exit();
}