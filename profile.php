<?php
include("studenthome.php");
?>
<?php
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}

$username = $_SESSION['username'];
$query = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($data, $query);

if (!$result) {
    die("Error fetching user details: " . mysqli_error($data));
}

$userData = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .user-details {
            margin-top: 20px;
        }
        .user-details p {
            margin: 10px 0;
            font-size: 16px;
        }
        .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .logout-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <div class="user-details">
            <p><strong>ID:</strong> <?php echo $userData['id']; ?></p>
            <p><strong>Username:</strong> <?php echo $userData['username']; ?></p>
            <p><strong>Phone:</strong> <?php echo $userData['phone']; ?></p>
            <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
            <p><strong>Year:</strong> <?php echo $userData['Year']; ?></p>
            <p><strong>Name:</strong> <?php echo $userData['NAME']; ?></p>
            <p><strong>CGPA:</strong> <?php echo $userData['CGPA']; ?></p>
            <p><strong>Backlogs:</strong> <?php echo $userData['Backlogs']; ?></p>
            <p><strong>Skills:</strong> <?php echo $userData['Skills']; ?></p>
            <p><strong>Leetcode Profile:</strong> <?php echo $userData['Leetcode_profile']; ?></p>
            <p><strong>Codechef Profile:</strong> <?php echo $userData['Codechef_profile']; ?></p>
        </div>
        <div class="logout-link">
            <a href="logout.php">Logout</a> 
        </div>
    </div>
</body>
</html>

<?php mysqli_close($data); ?>
