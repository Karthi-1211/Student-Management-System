<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Materials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .vm {
            width: 60%;
            max-width: 600px;
            padding: 20px;
            border: 2px solid #333;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .vm h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .table th a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
<?php
include("studenthome.php");
?>
    <div class="vm">
        <h1>View Materials</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th><a href="first_year.php" target="_blank">First Year</a></th>
                </tr>
                <tr>
                    <th><a href="second_year.php" target="_blank">Second Year</a></th>
                </tr>
                <tr>
                    <th><a href="third_year.php" target="_blank">Third Year</a></th>
                </tr>
                <tr>
                    <th><a href="final_year.php" target="_blank">Final Year</a></th>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
