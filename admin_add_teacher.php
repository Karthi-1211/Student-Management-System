<?php
include("adminhome.php");
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);
if (isset($_POST['apply'])) {   
    $teacherName = mysqli_real_escape_string($data, $_POST['name']);
    $phoneNumber = mysqli_real_escape_string($data, $_POST['phone']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $education = mysqli_real_escape_string($data, $_POST['education']);
    $experience = mysqli_real_escape_string($data, $_POST['experience']);
    $targetDirectory = "image/"; 
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";

            $query = "INSERT INTO teacher (name, phone, email, image,highest_education,experience) VALUES ('$teacherName', '$phoneNumber', '$email', '$targetFile', '$education', '$experience')";
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
        .bal {
    position: fixed; /* Fix the position */
    top: 80px; /* Adjust this value according to the height of your header */
    left: 50%; /* Center horizontally */
    transform: translateX(-50%); /* Center alignment */
    max-width: 800px;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top:50px;
}


        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            padding: 3px;
        }

        label {
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right: 10px;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="bal">
        <center>
            <h1>Add Teacher</h1>
            <div>
                <form action="#" method="POST" enctype="multipart/form-data"> 
                    <table>
                        <tr>
                            <th><label for="name">Teacher Name:</label></th>
                            <th><input type="text" name="name" id="name" required autocomplete="off"></th>
                        </tr>
                        <tr>
                            <th><label for="phone">Number:</label></th>
                            <th><input type="text" name="phone" id="phone" required autocomplete="off"></th>
                        </tr>
                        <tr>
                            <th><label for="email">Email:</label></th>
                            <th><input type="text" name="email" id="email" required autocomplete="off"></th>
                        </tr>
                        <tr>
                            <th><label for="image">Image:</label></th>
                            <th><input type="file" name="image" id="image" required></th>
                        </tr>
                        <tr>
                            <th><label for="education">Highest Education:</label></th>
                            <th><input type="text" name="education" id="education" required autocomplete="off"></th>
                        </tr>
                        <tr>
                            <th><label for="experience">Experience:</label></th>
                            <th><input type="text" name="experience" id="experience" required autocomplete="off"></th>
                        </tr>
                    </table>
                    <button type="submit" name="apply" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </center>
    </div>
</body>
</html>