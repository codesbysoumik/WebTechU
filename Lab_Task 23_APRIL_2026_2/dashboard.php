<?php
session_start();

// Protect page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['user'];
$last_login = isset($_COOKIE['last_login']) ? $_COOKIE['last_login'] : "First time login";
?>

<h2>Dashboard</h2>

<h3>Welcome, <?php echo $name; ?> </h3>

<p>Last login time: <?php echo $last_login; ?></p>

<a href="logout.php">Logout</a>