<?php
require 'dbConn.php'; // Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $index_number = trim($_POST["index_number"]);
    $password = trim($_POST["password"]);
    $hashed_password = md5($password); // Hash password using MD5
    $created_at = date("Y-m-d H:i:s"); // Current timestamp

    // Check if email already exists
    $checkQuery = $db->prepare("SELECT id FROM student WHERE email = ?");
    $checkQuery->bind_param("s", $email);
    $checkQuery->execute();
    $checkResult = $checkQuery->get_result();

    if ($checkResult->num_rows > 0) {
        echo "<script>alert('Email already exists! Try logging in.'); window.location.href='signup.html';</script>";
        exit();
    }

    // Insert new student record
    $insertQuery = $db->prepare("INSERT INTO student (name, email, index_number, password, created_at) VALUES (?, ?, ?, ?, ?)");
    $insertQuery->bind_param("sssss", $name, $email, $index_number, $hashed_password, $created_at);

    if ($insertQuery->execute()) {
        echo "<script>alert('Registration successful! You can now log in.'); window.location.href='login.html   ';</script>";
    } else {
        echo "<script>alert('Registration failed. Please try again.'); window.location.href='signup.html';</script>";
    }
}
?>
