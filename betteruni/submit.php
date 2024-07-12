<?php
    $coursecode =$_POST['coursecode'];
    $coursename =$_POST['coursename'];
    $institution =$_POST['institution'];
    $cutoffpoints =$_POST['cutoffpoints'];

    //Database connection//
    $conn = new mysqli('localhost','root','','betteruni');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO courses( coursecode, coursename, institution, cutoffpoints)
        values(?, ?, ?, ?)");
        $stmt->bind_param("issi",$coursecode, $coursename, $institution, $cutoffpoints);
        $stmt->execute();
        echo "Submit successful";
        $stmt->close();
        $conn->close();
        header("location: dashboardin.php");
    }
?>