
<?php

session_start();
$host = "localhost";
error_reporting(0);
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);
if (isset($_POST["apply"])) {
    $file = $_FILES['image']['name'];
    $user=$_SESSION['username'];
    $file_with_username = pathinfo($file, PATHINFO_FILENAME) . '-' . $user . '.' . pathinfo($file, PATHINFO_EXTENSION);
   if($_POST['year']=='1')
   {
    $dst = "./first/" . $file_with_username; 
    $dst_db = "first/" . $file_with_username;
   }
   else  if($_POST['year']=='2')
   {
    $dst = "./second/" . $file; 
    $dst_db = "second/" . $file;
   }
   else  if($_POST['year']=='3')
   {
    $dst = "./third/" . $file; 
    $dst_db = "third/" . $file;
   }
   else  if($_POST['year']=='4')
   {
    $dst = "./fourth/" . $file; 
    $dst_db = "fourth/" . $file;
   }
   
    move_uploaded_file($_FILES['image']['tmp_name'], $dst); 

    $sql = "INSERT into material(file,owner) values ('$dst_db','$user')";
    $result = mysqli_query($data, $sql);

    if ($result) {
        header("location: add_material.php");
        // $_SESSION['message']="Uploaded succesfull";
        echo "uploaded succesfully";
        exit();  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content
        {
            margin-left: 25%;
        }
    </style>
</head>
<body>
<?php
include("studenthome.php");
?>
    <div class="content">
    <center>
    <form action="#" method="POST"  enctype="multipart/form-data">
    <h1>add your materials</h1>
   <table>
    <tr>
        <th>Which year does the material belongs to:</th>
        <th><input type="number" name="year" class="form-control" min="1" max="4"></th>
    </tr>
    <tr>
        <th>Upload the pdf of the respective subject:</th>
        <th><input type="file" name="image" accept="application/pdf,application/vnd.ms-excel" ></th>
    </tr>
    <tr>
        <th> <button type="submit" name="apply" class="btn btn-primary">Submit</button></th>
    </tr>
    </form>
    </center>
   </table>
    </div>
</body>
</html>