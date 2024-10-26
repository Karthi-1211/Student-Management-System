<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM admin WHERE email='" . $name . "' AND pasword='" . $password . "'";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $_SESSION['username'] = $name;
        header("location: adminhome.php");
    } else {
        $message = "Enter a valid username and password";
        $_SESSION['warning'] = $message;
        header("location: login.php");
    }
}
?>
 