<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Database Connection//
    $conn = new mysqli('localhost','root','','betteruni');
    if($conn->connect_error) { 
        die('Connection Failed : '.$conn->connect_error);
    }else {
        $stmt = $conn->prepare("SELECT * FROM student where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0 ) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === md5($password)) {
                echo "<h2>Login Successfully</h2>";
                header("location: dashboard.html");
            }else {
                echo "<h2>Invalid Email or Password</h2>";
            }
        }else {
            echo "<h2>Invalid Email or Password</h2>";
        }
        $stmt->store_result();
    }
?>