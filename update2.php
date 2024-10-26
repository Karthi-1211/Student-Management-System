<?php
include("teacherhome.php");

// Database connection
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
    <title>Teacher Update</title>
    <style>
        /* General styling and page centering */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden; /* Prevents page from scrolling */
        }

        .tup {
            width: 100%;
            margin: 70px auto;
            max-width: 800px; /* Increased max width for the box */
            padding: 20px; /* Added more padding */
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .one {
            display: flex; /* Use flexbox */
            align-items: center; /* Center align items vertically */
            margin-bottom: 5px; /* Reduced space between input fields */
        }

        label {
            width: 30%; /* Adjust width as needed for labels */
            margin-bottom: 0; /* Remove bottom margin */
            margin-right: 5px; /* Slight right margin for spacing */
        }

        input[type="text"],
        input[type="tel"],
        button {
            width: 70%; /* Input fields take the remaining space */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 0; /* Remove bottom margin to eliminate extra space */
          
          }


        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
           
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="tup">
        <h1>Update Information</h1>
        <form action="#" method="POST">
            <div class="one">
                <label for="email">Email</label>
                <input type="text" name="email" value="<?php echo "{$row['email']}" ?>" required>
            </div>
            <div class="one">
                <label for="phone">Phone:</label>
                <input type="tel" name="phone" value="<?php echo "{$row['phone']}" ?>" required>
            </div>
            <div class="one">
                <label for="rollno">Password:</label>
                <input type="text" name="password" value="<?php echo "{$row['password']}" ?>" required>
            </div>

            <button type="submit" name="apply">Update</button>
        </form>
    </div>

</body>
</html>
