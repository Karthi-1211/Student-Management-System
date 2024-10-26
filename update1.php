<?php
include("studenthome.php");
// session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}
$name = $_SESSION['username'];
$fetch_sql = "SELECT * FROM user WHERE username='$name'";
$fetch_result = mysqli_query($data, $fetch_sql);
$row = mysqli_fetch_assoc($fetch_result);

if (isset($_POST['apply'])) {
    $s_email = $_POST['email'];
    $s_password = $_POST['password'];
    $s_phone = $_POST['phone'];

    $sql = "UPDATE user SET email='$s_email', phone='$s_phone', password='$s_password' WHERE username='$name'";
    $result2 = mysqli_query($data, $sql);
    if ($result2) {
        echo "Update successful";
    }
}
mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .up {
            width: 50%;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .up h1 {
            margin-bottom: 20px;
        }

        .one {
            margin-bottom: 15px;
            text-align: left;
        }

        .one label {
            display: block;
            margin-bottom: 5px;
        }

        .one input[type="text"],
        .one input[type="tel"],
        .one input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="up">
        <h1>Update Student Information</h1>
        <form action="#" method="POST">
            <div class="one">
                <label for="email">Email</label>
                <input type="text" name="email" value="<?php echo "{$row['email']}" ?>" required>
            </div>
            <div class="one">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" value="<?php echo "{$row['phone']}" ?>" required>
            </div>
            <div class="one">
                <label for="password">Password</label>
                <input type="password" name="password" value="<?php echo "{$row['password']}" ?>" required>
            </div>
            <button type="submit" name="apply">Update</button>
        </form>
    </div>
</body>
</html>
