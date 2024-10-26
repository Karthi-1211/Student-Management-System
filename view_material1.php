<?php
session_start();
$host = "localhost";
error_reporting(0);
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Materials</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .vm {
            margin: 2% 10%; /* Reduced margins for better centering */
            padding: 20px;
            background-color: #ffffff;
            border: 2px solid #B2BABB; /* Border color matching header */
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            background-color: #B2BABB;
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin: -20px -20px 20px -20px; /* Extend background color */
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 20px; /* Added margin for spacing */
        }

        li {
            margin: 10px 0;
        }

        a {
            display: block; /* Makes the link fill the entire li */
            color: #333;
            background-color: #CCD1D1;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s; /* Smooth hover effect */
        }

        a:hover {
            background-color: #AAB8B8; /* Darker shade on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .vm {
                margin: 2% 5%; /* Adjust margins for smaller screens */
            }
        }
    </style>
</head>

<body>
    <?php include("teacherhome.php"); ?>

    <div class="container">
        <div class="vm">
            <h1>View Materials</h1>
            <ul>
                <?php
                $materialsFolder = "materials";
                $files = scandir($materialsFolder);
                foreach ($files as $file) {
                    if ($file != "." && $file != "..") {
                        echo "<li><a href='$materialsFolder/$file'>$file</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>
