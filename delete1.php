
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

if(isset($_GET['student_id'])) {
    $user_id = $_GET['student_id'];
    $sql = "DELETE FROM teacher WHERE id='$user_id'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        header("location:admin_view_teacher.php");
        exit(); 
    } else {
        echo "Error deleting record: " . mysqli_error($data);
    }
}

mysqli_close($data);
?>
