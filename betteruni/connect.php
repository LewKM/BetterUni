<?php
  require_once "dbConn.php";

    if (isset($_POST['signup'])) {
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $indexnumber = mysqli_real_escape_string($db, $_POST['indexnumber']);
        $password = mysqli_real_escape_string($db, $_POST['password']); 
        if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $name_error = "Name must contain only alphabets and space";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }       
        if(strlen($indexnumber) < 11) {
            $indexnumber = "Mobile number must be minimum of 11 characters";
        }
        if (!$error) {
            if(mysqli_query($db, "INSERT INTO student(name, email, indexnumber ,password) VALUES('" . $name . "', '" . $email . "', '" . $indexnumber . "', '" . md5($password) . "')")) {
             header("location: signup.html");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($db);
            }
        }
        mysqli_close($db);
    }
?>