<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
    $conn = new mysqli('localhost', 'root', '', 'Loginsystem');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);

    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        $sql = "UPDATE users SET profile_picture='$target_file' WHERE username='$username'";
        if ($conn->query($sql) === TRUE) {
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }

    $conn->close();
}
?>
