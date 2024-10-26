<?php
include("adminhome.php");
$current_page = basename($_SERVER['PHP_SELF']);

if (isset($_SESSION['username'])) {
    echo "User is logged in: " . $_SESSION['username'];
} else {
    echo "User is not logged in.";
    header("location:login.php");
}

$host = "localhost";
error_reporting(0);
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("connection error");
}

if (isset($_POST['apply'])) {
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_rollno = $_POST['rollno'];
    $data_year = $_POST['year'];
    $data_password = $_POST['password'];

    $sql = "INSERT INTO user(username, Phone, email, usertype, password, Year) VALUES('$data_rollno','$data_phone','$data_email','student','$data_password','$data_year')";
    $result = mysqli_query($data, $sql);

    if ($result) {
        $_SESSION['message'] = "Your application sent successfully";
        if ($_SESSION['message']) {
            $message = $_SESSION['message'];
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        header("location:add_student.php");
    } else {
        echo "Apply failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add Student Page</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        html, body {
            height: 100%; /* Ensure the body takes full height */
            margin: 0; /* Remove default margin */
            display: flex; /* Use flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: flex-start; /* Align at the top */
            width:100%;
        }

        .bk {
            width: 600%; /* Set the form width to 80% of the viewport width */
            max-width: 600px; /* Optional: Set a maximum width for larger screens */
            margin-top: 110px; /* Add space from the top */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-right:150px;
        }

        .one {
            margin-bottom: 15px;
        }

        .one label {
            display: block;
            margin-bottom: 5px;
        }

        .one input[type="text"],
        .one input[type="number"],
        .one input[type="email"],
        .one input[type="tel"],
        .one input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[name="apply"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[name="apply"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="bk">
        <center><h1>Add Student</h1></center>
        <div>
            <form action="add_student.php" method="POST">
                <div class="one"><label for="">Roll no.</label>
                <input type="text" name="rollno" placeholder="Enter rollno" autocomplete="off" required></div>
                <div class="one"><label for="">Year</label>
                <input type="number" name="year" min="1" max="4" placeholder="Enter year" autocomplete="off" required></div>
                <div class="one"><label for="">E-mail</label>
                <input type="email" name="email" placeholder="Enter e-mail" autocomplete="off" required></div>
                <div class="one"><label for="">Phone</label>
                <input type="tel" name="phone" placeholder="Enter phone" autocomplete="off" required max="10"></div>
                <div class="one"><label for="">Password</label>
                <input type="password" name="password" placeholder="Enter password" autocomplete="off" required></div>
                <center><button type="submit" name="apply">SUBMIT</button></center>
            </form>
        </div>
    </div>
</body>
</html>
