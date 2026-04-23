<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($username == "admin" && $password == "1234") {

        $_SESSION['user'] = $username;
        $_SESSION['start_time'] = time(); 

        header("Location: dashboard.php");
        exit();

    } else {
        echo "Invalid login!";
    }
}
?>