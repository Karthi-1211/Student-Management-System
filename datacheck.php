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


$host="localhost";

$user="root";

$password="";

$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection error");
}

if(isset($_POST['apply']))
{
    $data_name=$_POST['name'];
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
    $data_message=$_POST['message'];
    $data_rollno=$_POST['rollno'];
    $data_course=$_POST['course'];
    
    $sql="INSERT INTO admission(Roll,Name,Course,Email,Phone,message) VALUES('$data_rollno','$data_name',' $data_course','$data_email','$data_phone','$data_message')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']="your application sent successful";
        header("location:index.php");
    }
    else
    {
        echo "Apply failed";
    }
}

?>