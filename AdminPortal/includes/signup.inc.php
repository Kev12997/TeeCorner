<?php
 // session start not necessary since no user is logged in to create an account
if (isset($_POST['submit']) ){
   
    include_once 'dbh.inc.php'; // conect to database

    //get user info
    $email = $_POST['email'];
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $password = $_POST['password'];
    $birthday = $_POST['birthday'];
    $street = $_POST['street'];
    $state = $_POST['state'];
    $apartmentNo = $_POST['apartmentNo'];
    $city = $_POST['city'];
    $zip_code = $_POST['zip_code'];
    $permission = $_POST['permission'];
    $address = $street . "\n". $state . "\n". $apartmentNo . "\n". $city . "\n". $zip_code;

    // Get user age
    $birthdayTime = strtotime($birthday);
    $age = date('Y') - date('Y', $birthdayTime);
    if (date('md') < date('md', $birthdayTime)) {
        // we haven't reached their birthday this year so subtract one
        $age--;
       }

    //Error handlers
    //Check for empty fields
    if (empty($email) || empty($first) || empty($last) || empty($password) || empty($birthday)){
        header("Location: ../admin_create.php?signup=empty");
        exit();
    } else {
        //Check if input are valid
        if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) ){
            header("Location: ../admin_create.php?signup=invalid");
            exit();
        } else {
            //check if email is valid with php function
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../admin_create.php?signup=email");
                exit(); 
            } else {
                $sql = "SELECT * FROM users WHERE email = '$email'"; // check if email already exists in database
                $result = mysqli_query($conn,$sql); // send query to database
                $resultCheck = mysqli_num_rows($result);// see if the email was already in database

                if($resultCheck > 0){ // email was already in database
                    header("Location: ../admin_create.php?signup=emailExists");
                    exit();

                } else { //if email was not in database
                    // hashing password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    //insert the user into the database
                    $sql = "INSERT INTO users(first_name, last_name, email, pwd, permission, date_of_birth, age) VALUES ('$first', '$last', '$email', '$hashedPassword', '$permission','$birthday',$age);";
                    mysqli_query($conn,$sql);//send query to database
                    $sql2 = "SELECT usr_id FROM users ORDER BY usr_id DESC LIMIT 1"; // check last user id to put into user adress table
                    $result = mysqli_query($conn,$sql2); // send to database but we want to use in variable
                    $row = mysqli_fetch_row($result); //row will have the query result of 'result' in a usable format so row[0] has the usr id of the new user
                    if(empty($street)|| empty($state) || empty($apartmentNo) || empty($city) || empty($zip_code))
                    {
                        header("Location: ../admin_create.php?signup=success");//if email field where empty, user can still finish account creation
                        exit();
                    }else //if fields where not empty add the adress info to database
                    {
                        $sql3 = "INSERT INTO user_address(usr_id, addresses) VALUES ($row[0],'$address');"; // input usr id and adress into table
                        mysqli_query($conn,$sql3);//send to database
                        header("Location: ../admin_create.php?signup=success");
                        exit();
                    }

                   
                }
            }
        }
    }

} else {
    header("Location: ../admin_create.php");
    exit();
}