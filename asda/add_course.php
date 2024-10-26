
<?php

session_start();
$host = "localhost";
error_reporting(0);
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);
if (isset($_POST["apply"])) {
    $user=$_SESSION['username'];
    $course_name=$_POST['course_name'];
    $Description=$_POST['Description'];
    $last_updated=$_POST['last_updated'];
    $file = $_FILES['image']['name'];
    mkdir("$course_name");
    $targetDirectory = "$course_name/"; 
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]); 

   
    // $result = mysqli_query($data, $sql);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";

        $sql = "INSERT into course(course_name,Instructor,description,materials,last_updated) values ('$course_name','$user','$Description'
        ,'$targetFile','$last_updated')";
         $result = mysqli_query($data, $query);

        if ($result) {
            echo "Teacher added successfully!";
        } else {
            echo "Error adding teacher: " . mysqli_error($data);
        }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title> 
    <link rel="stylesheet" href="admin.css">
    <style>
        .main {
            display: flex;
        }

        .main1 {
            width: 25%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="content">
        <center>
            <h1>Add Course</h1>
            <div>
                <form action="#" method="POST" enctype="multipart/form-data"> 
                    <table>
                        <tr>
                            <th><label for="name">Course Name:</label></th>
                            <th><input type="text" name="course_name" id="name" required></th>
                        </tr>
                        <tr>
                            <th><label for="phone">Description:</label></th>
                            <th><input type="textarea" name="Description" id="phone" required></th>
                        </tr>
                        <tr>
                            <th><label for="phone">Last Updated:</label></th>
                            <th><input type="date" name="last_updated" id="phone" required></th>
                        </tr>
                        <tr>
                            <th><label for="image">Materials File:</label></th>
                            <th><input type="file" name="image" id="image" required></th>
                        </tr>
                    </table>
                    <button type="submit" name="apply" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </center>
    </div>
</body>
</html>