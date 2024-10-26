<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Materials</title>
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

        .adm {
            width: 60%;
            max-width: 700px;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 5px;
            background-color: #f2f2f2;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top:70px;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        input[type="text"],
        input[type="number"],
        select,
        input[type="file"] {
            width: 98%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php include("studenthome.php"); ?>
    <div class="adm">
        <h1>Add Your Materials</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>File Name</th>
                    <td><input type="text" name="name1" required></td>
                </tr>
                <tr>
                    <th>Can everyone access this:</th>
                    <td>
                        <select id="cars" name="avail">
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Which year does the material belong to:</th>
                    <td><input type="number" name="year" min="1" max="4" required></td>
                </tr>
                <tr>
                    <th>Upload the PDF of the respective subject:</th>
                    <td><input type="file" name="image" accept="application/pdf,application/vnd.ms-excel" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" name="apply">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
