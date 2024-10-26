<?php
session_start();
// if (isset($_SESSION['username'])) {
//     echo "User is logged in: " . $_SESSION['username'];

// } else {
//     echo "User is not logged in.";
//     header("location:login.php");
// }
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
    $data_response=$_POST['response'];
    
    $sql="INSERT INTO admission(response) VALUES('$data_response')";

    $res=mysqli_query($data,$sql);

    // if($res)
    // {
    //     $_SESSION['message']="your application sent successful";
    //     header("location:index.php");
    // }
    // else
    // {
    //     echo "Apply failed";
    // }
}

?>