<?php
include("adminhome.php");
?>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}
$sql = "SELECT * FROM user WHERE usertype='student'";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            padding-top: 80px; /* Make space for fixed header */
        }

        .karthi {
            position: fixed; /* Fix the position */
            top: 80px; /* Adjust this value according to the height of your header */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Center alignment */
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Ensure it is above other elements */
            margin-top:200px;
            margin-left:100px;
        }

        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #dee2e6;
            margin-top: 20px;
            text-align: left;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #343a40;
            color: #fff;
            font-size: 18px;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
        }

        a.delete-link, a.update-link {
            display: inline-block;
            padding: 8px 16px;
            margin-right: 5px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        a.delete-link {
            background-color: #dc3545;
            color: white;
            border: 1px solid #dc3545;
        }

        a.update-link {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
            margin-left: 50px; 
        }

        a.abc {
            margin-left: 10px;
        }

        a.delete-link:hover, a.update-link:hover {
            text-decoration: none;
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="karthi">
        <h1>Students Data</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Roll No</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <th scope="row"><?php echo $row["id"]; ?></th>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td class="action-buttons">
                        <a class="delete-link" onclick="return confirm('Are you sure you want to delete this?');" href='delete.php?student_id=<?php echo $row["id"]; ?>'>Delete</a>
                        <a class="update-link abc" onclick="return confirm('Are you sure you want to update this?');" href='update.php?student_id=<?php echo $row["id"]; ?>'>Update</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
