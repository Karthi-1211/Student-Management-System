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
    $user = $_SESSION['username'];
    $avail = $_POST['avail'];
    $file_name = $_POST['name1'];
    $year = $_POST['year'];
    $file_with_username = pathinfo($file, PATHINFO_FILENAME) . '-' . $user . '.' . pathinfo($file, PATHINFO_EXTENSION);
    $dst = "./materials/" . $file;
    $dst_db = "materials/" . $file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    $sql = "INSERT into material(name,file,owner,avail,year) values ('$file_name','$dst_db','$user','$avail','$year')";
    $result = mysqli_query($data, $sql);

    if ($result) {
        header("location: add_material1.php");
        echo "Uploaded successfully";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Materials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox to center the content */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
        }
        .am {
            margin: 2% 5%; /* Reduced side margins for wider box */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%; /* Make it responsive */
            max-width: 800px; /* Increased maximum width */
        }

        form {
            text-align: left;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="number"],
        select,
        input[type="file"] {
            width: calc(100% - 22px); /* Adjust for padding and border */
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
          margin-left: 150px; /* Center the button */
        }

        button:hover {
            background-color: #45a049;
        }

        h1 {
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
include("teacherhome.php");
?>
    <div class="am">
        <form action="#" method="POST" enctype="multipart/form-data">
            <h1>Add Your Materials</h1>
            <table>
                <tr>
                    <th>File Name</th>
                    <th><input type="text" name="name1"></th>
                </tr>
                <tr>
                    <th>Can Everyone Access This:</th>
                    <th>
                        <select id="cars" name="avail">
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>Which Year Does the Material Belong To:</th>
                    <th><input type="number" name="year" class="form-control" min="1" max="4"></th>
                </tr>
                <tr>
                    <th>Upload the PDF of the Respective Subject:</th>
                    <th><input type="file" name="image" accept="application/pdf,application/vnd.ms-excel"></th>
                </tr>
                <tr>
                    <th colspan="2"> <!-- Make the submit button span across both columns -->
                        <button type="submit" name="apply" class="btn btn-primary">Submit</button>
                    </th>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
