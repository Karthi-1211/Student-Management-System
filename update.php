<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "User is logged in: " . $_SESSION['username'];

} else {
    echo "User is not logged in.";
    header("location:login.php");
}
?>
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

if (isset($_GET['student_id'])) {
    $user_id = $_GET['student_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_email = mysqli_real_escape_string($data, $_POST['email']);
        $new_phone = mysqli_real_escape_string($data, $_POST['phone']);
        $new_rollno = mysqli_real_escape_string($data, $_POST['rollno']);
        $new_password = mysqli_real_escape_string($data, $_POST['password']);

        $update_sql = "UPDATE user SET email='$new_email', Phone='$new_phone', username='$new_rollno', password='$new_password' WHERE id='$user_id'";
        $update_result = mysqli_query($data, $update_sql);

        if ($update_result) {
            header("location:view_student.php");
            exit(); 
        } else {
            echo "Error updating record: " . mysqli_error($data);
        }
    }

  
    $fetch_sql = "SELECT * FROM user WHERE id='$user_id'";
    $fetch_result = mysqli_query($data, $fetch_sql);

    if ($fetch_result && mysqli_num_rows($fetch_result) > 0) {
        $row = mysqli_fetch_assoc($fetch_result);
        $existing_email = $row['email'];
        $existing_phone = $row['Phone'];
        $existing_rollno = $row['username'];
    } else {
        echo "Error fetching record: " . mysqli_error($data);
    
    }
}

mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        .main
        {
            display: flex;
        }
        .main1
        {
            width: 25%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header class="header">
        <a href="" class="btn btn-primary">Admin Dashboard</a>
        <div class="logout">
            <a href="" class="btn btn-primary">Logout</a>
        </div>
    </header>
  <div class="main"> 
   <div class="main1">  
        <ul>
            <li>
                <a class="lin" href="">Admission</a>
            </li>
            <li>
                <a class="lin" href="add_student.php">Add Student</a>
            </li>
            <li>
                <a class="lin" href="view_student.php">View Student</a>
            </li>
            <li>
                <a class="lin" href="">Add Teacher</a>
            </li>
            <li>
                <a class="lin" href="">View Teacher</a>
            </li>
            <li>
                <a class="lin" href="">Add Courses</a>
            </li>
            <li>
                <a class="lin" href="">View courses</a>
            </li>
        </ul>
   </div>
    <div class="content">
        <h1>Update Student Information</h1>
        <div>
            <form action="update.php?student_id=<?php echo $user_id; ?>" method="POST">
                <div class="one">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $existing_email; ?>" required>
                </div>
                <div class="one">
                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" value="<?php echo $existing_phone; ?>" required>
                </div>
                <div class="one">
                    <label for="rollno">Roll NO:</label>
                    <input type="text" name="rollno" value="<?php echo $existing_rollno; ?>" required>
                </div>
                <div class="one">
                    <label for="password">Password:</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" name="apply">Update</button>
            </form>
        </div>
    </div>
  </div>
</body>
</html>
