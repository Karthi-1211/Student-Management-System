<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Database connection
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($data, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $name, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        // Check user type and redirect accordingly
        if ($row) {
            if ($row["usertype"] == "student") {
                $_SESSION['username'] = $name;
                header("Location: studenthome.php");
                exit();
            } else if ($row["usertype"] == "balu") {
                $_SESSION['username'] = $name;
                header("Location: adminhome.php");
                exit();
            } else if ($row["usertype"] == "teacher") {
                $_SESSION['username'] = $name;
                header("Location: teacherhome.php");
                exit();
            }
        } else {
            // Invalid credentials, show error message
            $_SESSION['warning'] = "Invalid username or password";
            header("Location: login.php");
            exit();
        }
    }
}
?>
